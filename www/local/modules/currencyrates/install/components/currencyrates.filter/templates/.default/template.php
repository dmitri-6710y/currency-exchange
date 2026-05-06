<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>

<form method="get" action="<?= POST_FORM_ACTION_URI ?>">
    <div>
        <label>Код валюты: <input type="text" name="<?= $arParams['CODE_FIELD_NAME'] ?>" value="<?= htmlspecialchars($arResult['VALUES']['code']) ?>"></label>
    </div>
    <div>
        <label>Дата от: <input type="date" name="<?= $arParams['DATE_FROM_FIELD_NAME'] ?>" value="<?= htmlspecialchars($arResult['VALUES']['date_from']) ?>"></label>
        <label>Дата до: <input type="date" name="<?= $arParams['DATE_TO_FIELD_NAME'] ?>" value="<?= htmlspecialchars($arResult['VALUES']['date_to']) ?>"></label>
    </div>
    <div>
        <label>Курс от: <input type="number" step="any" name="<?= $arParams['COURSE_FROM_FIELD_NAME'] ?>" value="<?= htmlspecialchars($arResult['VALUES']['course_from']) ?>"></label>
        <label>Курс до: <input type="number" step="any" name="<?= $arParams['COURSE_TO_FIELD_NAME'] ?>" value="<?= htmlspecialchars($arResult['VALUES']['course_to']) ?>"></label>
    </div>
    <div><input type="submit" value="Фильтровать"></div>
</form>