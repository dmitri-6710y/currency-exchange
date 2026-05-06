<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

if (!isset($arResult['COLUMNS']) || !is_array($arResult['COLUMNS'])) {
    $arResult['COLUMNS'] = ['CODE', 'DATE', 'COURSE'];
}

$request = \Bitrix\Main\Context::getCurrent()->getRequest();
$queryParams = $request->getQueryList()->toArray();

$sortByParam = $arParams['SORT_BY_PARAM'] ?? 'sort_by';
$sortOrderParam = $arParams['SORT_ORDER_PARAM'] ?? 'sort_order';

unset($queryParams[$sortByParam], $queryParams[$sortOrderParam]);

function buildSortUrl($field, $currentSortBy, $currentSortOrder, $baseParams, $sortByParam, $sortOrderParam) {
    $params = $baseParams;
    if ($currentSortBy === $field) {
        $newOrder = ($currentSortOrder === 'ASC') ? 'DESC' : 'ASC';
    } else {
        $newOrder = 'ASC';
    }
    $params[$sortByParam] = $field;
    $params[$sortOrderParam] = $newOrder;
    return '?' . http_build_query($params);
}

$baseParams = $queryParams;

if (!empty($arResult['ITEMS'])): ?>
    <table class="currency-rates-table" border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <? if (in_array('ID', $arResult['COLUMNS'])): ?>
                    <th>
                        <a href="<?= buildSortUrl('ID', $arResult['SORT_BY'] ?? 'ID', $arResult['SORT_ORDER'] ?? 'DESC', $baseParams, $sortByParam, $sortOrderParam) ?>">
                            ID <?= (($arResult['SORT_BY'] ?? '') == 'ID' ? (($arResult['SORT_ORDER'] ?? '') == 'ASC' ? '▲' : '▼') : '') ?>
                        </a>
                    </th>
                <? endif ?>
                <? if (in_array('CODE', $arResult['COLUMNS'])): ?>
                    <th>
                        <a href="<?= buildSortUrl('CODE', $arResult['SORT_BY'] ?? 'ID', $arResult['SORT_ORDER'] ?? 'DESC', $baseParams, $sortByParam, $sortOrderParam) ?>">
                            Код <?= (($arResult['SORT_BY'] ?? '') == 'CODE' ? (($arResult['SORT_ORDER'] ?? '') == 'ASC' ? '▲' : '▼') : '') ?>
                        </a>
                    </th>
                <? endif ?>
                <? if (in_array('DATE', $arResult['COLUMNS'])): ?>
                    <th>
                        <a href="<?= buildSortUrl('DATE', $arResult['SORT_BY'] ?? 'ID', $arResult['SORT_ORDER'] ?? 'DESC', $baseParams, $sortByParam, $sortOrderParam) ?>">
                            Дата <?= (($arResult['SORT_BY'] ?? '') == 'DATE' ? (($arResult['SORT_ORDER'] ?? '') == 'ASC' ? '▲' : '▼') : '') ?>
                        </a>
                    </th>
                <? endif ?>
                <? if (in_array('COURSE', $arResult['COLUMNS'])): ?>
                    <th>
                        <a href="<?= buildSortUrl('COURSE', $arResult['SORT_BY'] ?? 'ID', $arResult['SORT_ORDER'] ?? 'DESC', $baseParams, $sortByParam, $sortOrderParam) ?>">
                            Курс <?= (($arResult['SORT_BY'] ?? '') == 'COURSE' ? (($arResult['SORT_ORDER'] ?? '') == 'ASC' ? '▲' : '▼') : '') ?>
                        </a>
                    </th>
                <? endif ?>
            </tr>
        </thead>
        <tbody>
        <? foreach ($arResult['ITEMS'] as $item): ?>
            <tr>
                <? if (in_array('ID', $arResult['COLUMNS'])): ?>
                    <td><?= htmlspecialchars($item['ID']) ?></td>
                <? endif ?>
                <? if (in_array('CODE', $arResult['COLUMNS'])): ?>
                    <td><?= htmlspecialchars($item['CODE']) ?></td>
                <? endif ?>
                <? if (in_array('DATE', $arResult['COLUMNS'])): ?>
                    <td><?= $item['DATE'] ? $item['DATE']->toString() : '' ?></td>
                <? endif ?>
                <? if (in_array('COURSE', $arResult['COLUMNS'])): ?>
                    <td><?= htmlspecialchars($item['COURSE']) ?></td>
                <? endif ?>
            </tr>
        <? endforeach ?>
        </tbody>
    </table>

    <? 
    $navParams = $baseParams;
    $APPLICATION->IncludeComponent(
        "bitrix:main.pagenavigation",
        "modern",
        array(
            "NAV_OBJECT" => $arResult['NAV_OBJECT'],
            "SEF_MODE" => "N",
            "ADDITIONAL_PARAMS" => http_build_query($navParams)
        ),
        false
    );
    ?>
<? else: ?>
    <p>Нет данных</p>
<? endif ?>