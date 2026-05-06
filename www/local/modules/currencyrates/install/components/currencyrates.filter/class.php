<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Context;

class CurrencyRatesFilter extends CBitrixComponent
{
    public function executeComponent()
    {
        $request = Context::getCurrent()->getRequest();
        $this->arResult['VALUES'] = [
            'code' => $request->get($this->arParams['CODE_FIELD_NAME']),
            'date_from' => $request->get($this->arParams['DATE_FROM_FIELD_NAME']),
            'date_to' => $request->get($this->arParams['DATE_TO_FIELD_NAME']),
            'course_from' => $request->get($this->arParams['COURSE_FROM_FIELD_NAME']),
            'course_to' => $request->get($this->arParams['COURSE_TO_FIELD_NAME']),
        ];
        $this->includeComponentTemplate();
    }
}