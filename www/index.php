<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Курсы валют");
?><?$APPLICATION->IncludeComponent(
	"currencyrates.filter",
	"",
	Array(
		"CODE_FIELD_NAME" => "code",
		"COURSE_FROM_FIELD_NAME" => "course_from",
		"COURSE_TO_FIELD_NAME" => "course_to",
		"DATE_FROM_FIELD_NAME" => "date_from",
		"DATE_TO_FIELD_NAME" => "date_to"
	)
);?><?$APPLICATION->IncludeComponent(
	"currencyrates.list",
	"",
	Array(
		"CODE_PARAM" => "code",
		"COLUMNS" => array("CODE","DATE","COURSE"),
		"COURSE_FROM_PARAM" => "course_from",
		"COURSE_TO_PARAM" => "course_to",
		"DATE_FROM_PARAM" => "date_from",
		"DATE_TO_PARAM" => "date_to",
		"PAGE_SIZE" => "20",
		"SORT_BY_PARAM" => "sort_by",
		"SORT_ORDER_PARAM" => "sort_order"
	)
);?><br>