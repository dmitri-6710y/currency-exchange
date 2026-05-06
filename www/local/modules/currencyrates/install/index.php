<?php
use Bitrix\Main\Application;
use Bitrix\Main\Loader;
use Bitrix\Main\ModuleManager;
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

class currencyrates extends CModule
{
    var $MODULE_ID = "currencyrates";
    var $MODULE_VERSION;
    var $MODULE_VERSION_DATE;
    var $MODULE_NAME;
    var $MODULE_DESCRIPTION;
    var $PARTNER_NAME;
    var $PARTNER_URI;

    public function __construct()
    {
        $arModuleVersion = [];
        include(__DIR__.'/version.php');
        $this->MODULE_VERSION = $arModuleVersion["VERSION"];
        $this->MODULE_VERSION_DATE = $arModuleVersion["VERSION_DATE"];
        $this->MODULE_NAME = Loc::getMessage("CURRENCYRATES_MODULE_NAME");
        $this->MODULE_DESCRIPTION = Loc::getMessage("CURRENCYRATES_MODULE_DESC");
        $this->PARTNER_NAME = Loc::getMessage("CURRENCYRATES_PARTNER_NAME");
        $this->PARTNER_URI = Loc::getMessage("CURRENCYRATES_PARTNER_URI");
    }

    public function DoInstall()
    {
        global $APPLICATION;
        if (!Loader::includeModule('main')) {
            $APPLICATION->ThrowException("Не подключен главный модуль");
            return false;
        }
        $this->InstallDB();
        $this->InstallFiles();
        ModuleManager::registerModule($this->MODULE_ID);
        return true;
    }

    public function DoUninstall()
    {
        $this->UninstallDB();
        $this->UninstallFiles();
        ModuleManager::unRegisterModule($this->MODULE_ID);
        return true;
    }

    public function InstallDB()
    {
        $classFile = __DIR__ . '/../lib/CurrencyRateTable.php';
        if (file_exists($classFile)) {
            require_once $classFile;
        }

        if (class_exists('Bitrix\CurrencyRates\CurrencyRateTable')) {
            \Bitrix\CurrencyRates\CurrencyRateTable::getEntity()->createDbTable();
        } else {
            $connection = Application::getConnection();
            if (!$connection->isTableExists('b_currency_rates')) {
                $connection->createTable('b_currency_rates', [
                    'ID'     => new \Bitrix\Main\Entity\IntegerField('ID', [
                        'primary'      => true,
                        'autocomplete' => true,
                    ]),
                    'CODE'   => new \Bitrix\Main\Entity\StringField('CODE', [
                        'required' => true,
                        'size'     => 3,
                    ]),
                    'DATE'   => new \Bitrix\Main\Entity\DatetimeField('DATE', [
                        'required' => true,
                    ]),
                    'COURSE' => new \Bitrix\Main\Entity\FloatField('COURSE', [
                        'required' => true,
                    ]),
                ]);
            }
        }

        return true;
    }

    public function UninstallDB()
    {
        $connection = Application::getConnection();
        if ($connection->isTableExists('b_currency_rates')) {
            $connection->dropTable('b_currency_rates');
        }
        return true;
    }

    public function InstallFiles()
    {
        $sourcePath = __DIR__.'/components/';
        $targetPath = $_SERVER["DOCUMENT_ROOT"] . '/local/components/';
        if (!is_dir($targetPath)) {
            mkdir($targetPath, 0755, true);
        }
        CopyDirFiles($sourcePath, $targetPath, true, true);
        return true;
    }

    public function UninstallFiles()
    {
        DeleteDirFilesEx('/local/components/currencyrates.filter');
        DeleteDirFilesEx('/local/components/currencyrates.list');
        return true;
    }
}