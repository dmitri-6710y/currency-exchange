<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

$arComponentParameters = [
    "GROUPS" => [],
    "PARAMETERS" => [
        "CODE_FIELD_NAME" => [
            "NAME" => "Имя поля для кода валюты",
            "TYPE" => "STRING",
            "DEFAULT" => "code",
        ],
        "DATE_FROM_FIELD_NAME" => [
            "NAME" => "Имя поля для даты от",
            "TYPE" => "STRING",
            "DEFAULT" => "date_from",
        ],
        "DATE_TO_FIELD_NAME" => [
            "NAME" => "Имя поля для даты до",
            "TYPE" => "STRING",
            "DEFAULT" => "date_to",
        ],
        "COURSE_FROM_FIELD_NAME" => [
            "NAME" => "Имя поля для курса от",
            "TYPE" => "STRING",
            "DEFAULT" => "course_from",
        ],
        "COURSE_TO_FIELD_NAME" => [
            "NAME" => "Имя поля для курса до",
            "TYPE" => "STRING",
            "DEFAULT" => "course_to",
        ],
    ],
];