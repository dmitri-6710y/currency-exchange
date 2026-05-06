<?php
namespace Bitrix\CurrencyRates;

use Bitrix\Main\ORM\Data\DataManager;
use Bitrix\Main\ORM\Fields\DatetimeField;
use Bitrix\Main\ORM\Fields\FloatField;
use Bitrix\Main\ORM\Fields\IntegerField;
use Bitrix\Main\ORM\Fields\StringField;

class CurrencyRateTable extends DataManager
{
    public static function getTableName()
    {
        return 'b_currency_rates';
    }

    public static function getMap()
    {
        return [
            new IntegerField('ID', [
                'primary' => true,
                'autocomplete' => true
            ]),
            new StringField('CODE', [
                'required' => true,
                'size' => 3
            ]),
            new DatetimeField('DATE', [
                'required' => true
            ]),
            new FloatField('COURSE', [
                'required' => true
            ])
        ];
    }
}