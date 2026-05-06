<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Context;
use Bitrix\Main\Type\DateTime;
use Bitrix\CurrencyRates\CurrencyRateTable;
use Bitrix\Main\UI\PageNavigation;

class CurrencyRatesList extends CBitrixComponent
{
    public function executeComponent()
    {
        if (!\Bitrix\Main\Loader::includeModule('currencyrates')) {
            ShowError('Модуль currencyrates не установлен');
            return;
        }

        $request = Context::getCurrent()->getRequest();

        $filter = [];
        $code = $request->get($this->arParams['CODE_PARAM']);
        if (!empty($code)) {
            $filter['CODE'] = $code;
        }

        $dateFrom = $request->get($this->arParams['DATE_FROM_PARAM']);
        if ($dateFrom) {
            try {
                $filter['>=DATE'] = new DateTime($dateFrom);
            } catch (Exception $e) {}
        }

        $dateTo = $request->get($this->arParams['DATE_TO_PARAM']);
        if ($dateTo) {
            try {
                $filter['<=DATE'] = new DateTime($dateTo . ' 23:59:59');
            } catch (Exception $e) {}
        }

        $courseFrom = $request->get($this->arParams['COURSE_FROM_PARAM']);
        if ($courseFrom !== null && is_numeric($courseFrom)) {
            $filter['>=COURSE'] = (float)$courseFrom;
        }

        $courseTo = $request->get($this->arParams['COURSE_TO_PARAM']);
        if ($courseTo !== null && is_numeric($courseTo)) {
            $filter['<=COURSE'] = (float)$courseTo;
        }

        $sortBy = $request->get($this->arParams['SORT_BY_PARAM']);
        $sortOrder = $request->get($this->arParams['SORT_ORDER_PARAM']);
        if (!in_array($sortBy, ['ID', 'CODE', 'DATE', 'COURSE'])) {
            $sortBy = 'ID';
        }
        if ($sortOrder != 'ASC') $sortOrder = 'DESC';

        $nav = new PageNavigation('nav-currency-rates');
        $nav->allowAllRecords(true)
            ->setPageSize((int)$this->arParams['PAGE_SIZE'])
            ->initFromUri();

        $query = CurrencyRateTable::query()
            ->setSelect(['ID', 'CODE', 'DATE', 'COURSE'])
            ->setFilter($filter)
            ->setOrder([$sortBy => $sortOrder])
            ->setLimit($nav->getLimit())
            ->setOffset($nav->getOffset());

        $result = $query->exec();

        $countQuery = CurrencyRateTable::query()->setSelect(['ID'])->setFilter($filter);
        $nav->setRecordCount($countQuery->exec()->getSelectedRowsCount());

        $items = [];
        while ($row = $result->fetch()) {
            $items[] = $row;
        }

        $this->arResult['ITEMS'] = $items;
        $this->arResult['NAV_OBJECT'] = $nav;
        $this->arResult['COLUMNS'] = $this->arParams['COLUMNS'];
        $this->arResult['SORT_BY'] = $sortBy;
        $this->arResult['SORT_ORDER'] = $sortOrder;
        $this->arResult['PARAMS'] = $this->arParams;

        $this->includeComponentTemplate();
    }
}