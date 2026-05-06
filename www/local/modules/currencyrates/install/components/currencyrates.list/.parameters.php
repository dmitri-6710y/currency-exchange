<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arComponentParameters = [
    "GROUPS" => [],
    "PARAMETERS" => [
        "COLUMNS" => [
            "NAME" => "Отображаемые колонки",
            "TYPE" => "LIST",
            "MULTIPLE" => "Y",
            "VALUES" => [
                "ID" => "ID",
                "CODE" => "Код",
                "DATE" => "Дата",
                "COURSE" => "Курс",
            ],
            "DEFAULT" => ["CODE", "DATE", "COURSE"],
        ],
        "PAGE_SIZE" => [
            "NAME" => "Количество записей на странице",
            "TYPE" => "STRING",
            "DEFAULT" => "20",
        ],
        "CODE_PARAM" => [
            "NAME" => "GET-параметр для кода валюты",
            "TYPE" => "STRING",
            "DEFAULT" => "code",
        ],
        "DATE_FROM_PARAM" => [
            "NAME" => "GET-параметр для даты от",
            "TYPE" => "STRING",
            "DEFAULT" => "date_from",
        ],
        "DATE_TO_PARAM" => [
            "NAME" => "GET-параметр для даты до",
            "TYPE" => "STRING",
            "DEFAULT" => "date_to",
        ],
        "COURSE_FROM_PARAM" => [
            "NAME" => "GET-параметр для курса от",
            "TYPE" => "STRING",
            "DEFAULT" => "course_from",
        ],
        "COURSE_TO_PARAM" => [
            "NAME" => "GET-параметр для курса до",
            "TYPE" => "STRING",
            "DEFAULT" => "course_to",
        ],
        "SORT_BY_PARAM" => [
            "NAME" => "GET-параметр для поля сортировки",
            "TYPE" => "STRING",
            "DEFAULT" => "sort_by",
        ],
        "SORT_ORDER_PARAM" => [
            "NAME" => "GET-параметр для направления сортировки",
            "TYPE" => "STRING",
            "DEFAULT" => "sort_order",
        ],
    ],
];