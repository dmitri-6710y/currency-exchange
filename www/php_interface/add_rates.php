<?php
require $_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/prolog_before.php';
\Bitrix\Main\Loader::includeModule('currencyrates');

use Bitrix\CurrencyRates\CurrencyRateTable;
use Bitrix\Main\Type\DateTime;

CurrencyRateTable::add([
    'CODE' => 'USD',
    'DATE' => new DateTime('03.05.2026'),
    'COURSE' => 90
]);
CurrencyRateTable::add([
    'CODE' => 'USD',
    'DATE' => new DateTime('04.05.2026'),
    'COURSE' => 120
]);
CurrencyRateTable::add([
    'CODE' => 'USD',
    'DATE' => new DateTime('05.05.2026'),
    'COURSE' => 110
]);
CurrencyRateTable::add([
    'CODE' => 'USD',
    'DATE' => new DateTime('06.05.2026'),
    'COURSE' => 130
]);
CurrencyRateTable::add([
    'CODE' => 'EUR',
    'DATE' => new DateTime('03.05.2026'),
    'COURSE' => 12.20
]);
CurrencyRateTable::add([
    'CODE' => 'EUR',
    'DATE' => new DateTime('04.05.2026'),
    'COURSE' => 13.20
]);
CurrencyRateTable::add([
    'CODE' => 'EUR',
    'DATE' => new DateTime('05.05.2026'),
    'COURSE' => 11.20
]);
CurrencyRateTable::add([
    'CODE' => 'EUR',
    'DATE' => new DateTime('06.05.2026'),
    'COURSE' => 13.10
]);
echo 'Добавлено.';