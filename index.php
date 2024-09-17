<?php 
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
} 
?>

<?
require($_SERVER['DOCUMENT_ROOT'].'/local/templates/agency_template/header.php');
$APPLICATION->SetTitle('Главная');
?> 


<? 
include($_SERVER["DOCUMENT_ROOT"]."/local/templates/agency_template/index.php");

?> 

<?
require($_SERVER['DOCUMENT_ROOT'].'/local/templates/agency_template/footer.php');
?>