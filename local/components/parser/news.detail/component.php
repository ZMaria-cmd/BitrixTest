<?php
if (empty($arParams["CODE"])) {
    $arResult["DETAIL_ITEM"] = array(); 
} else {
    $arSelect = array("ID", "NAME", "DETAIL_TEXT", "DETAIL_PICTURE", "CODE");
    $arFilter = array("IBLOCK_ID" => $arParams["IBLOCK_ID"], "ACTIVE" => "Y", "CODE" => $arParams["CODE"]);
    
    $res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
    
    if ($ob = $res->GetNextElement()) {
        $arFields = $ob->GetFields();
        
        if ($arFields["DETAIL_PICTURE"]) {
            $arFields["DETAIL_PICTURE_SRC"] = CFile::GetPath($arFields["DETAIL_PICTURE"]);
        } else {
            $arFields["DETAIL_PICTURE_SRC"] = "https://bitrix.test/local/upload/tmp/img.jpg";
        }

        // Ограничение длины DETAIL_TEXT до 130 символов
        if (!empty($arFields["DETAIL_TEXT"])) {
            $arFields["DETAIL_TEXT"] = mb_substr($arFields["DETAIL_TEXT"], 0, 130);
        }
        
        $arResult["DETAIL_ITEM"] = $arFields;
    } else {
        $arResult["DETAIL_ITEM"] = array();
    }
}

$this->IncludeComponentTemplate();
?>

