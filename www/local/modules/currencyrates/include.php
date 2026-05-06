<?php
use Bitrix\Main\Loader;

Loader::registerAutoLoadClasses('currencyrates', [
    'Bitrix\\CurrencyRates\\CurrencyRateTable' => 'lib/CurrencyRateTable.php',
]);