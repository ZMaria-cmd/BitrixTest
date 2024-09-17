<?php
    $arSelect = array("ID", "NAME", "PREVIEW_TEXT", "DETAIL_TEXT", "PREVIEW_PICTURE");
    $arFilter = array("IBLOCK_ID" => $arParams["IBLOCK_ID"], "ACTIVE" => "Y");

    $res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);

    $arResult["ITEMS"] = array();
    while ($ob = $res->GetNextElement()) {
        $arFields = $ob->GetFields();

        if ($arFields["PREVIEW_PICTURE"]) {
            $arFields["PREVIEW_PICTURE_SRC"] = CFile::GetPath($arFields["PREVIEW_PICTURE"]);
        }

        $arResult["ITEMS"][] = $arFields;
    }

$this->includeComponentTemplate();
?>
