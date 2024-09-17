<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
} ?>

<?php
ini_set('log_errors', 1); 
ini_set('error_log', $_SERVER["DOCUMENT_ROOT"] . '/php_errors.log');

require($_SERVER["DOCUMENT_ROOT"]."/local/templates/agency_template/header.php");
$APPLICATION->SetTitle("Детальная новость");


$APPLICATION->IncludeComponent(
    "parser:news.detail", // Ваш компонент для детальной страницы
    ".default",
    array(
        "IBLOCK_ID" => 1, // ID инфоблока
        "CODE" => $_REQUEST["CODE"], // Получаем код из URL
        "CACHE_TYPE" => "N",
        "CACHE_TIME" => "3600",
        "SET_TITLE" => "Y", // Устанавливаем заголовок страницы
    ),
    false
);

error_log($_REQUEST["CODE"], 3, $_SERVER["DOCUMENT_ROOT"] . "/error_log.txt");
require($_SERVER["DOCUMENT_ROOT"]."/local/templates/agency_template/footer.php");
?>
