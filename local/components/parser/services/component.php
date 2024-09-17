<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Loader;
use Bitrix\Iblock\IblockTable;
use Bitrix\Iblock\ElementTable;

Loader::includeModule('iblock');

$arParams = $this->arParams;
$arResult = array();

$iblockId = $arParams['IBLOCK_ID'];

$res = ElementTable::getList(array(
    'select' => array('ID', 'NAME', 'PREVIEW_TEXT'),
    'filter' => array('IBLOCK_ID' => $iblockId, 'ACTIVE' => 'Y'),
    'order' => array('SORT' => 'ASC'),
));
while ($element = $res->fetch()) {
    $arResult['ITEMS'][] = $element;
}

$this->arResult = $arResult;
$this->includeComponentTemplate();
?>


