<?php
$arSelect = array("ID", "NAME", "PREVIEW_TEXT", "PREVIEW_PICTURE");
$arFilter = array("IBLOCK_ID" => $arParams["IBLOCK_ID"], "ACTIVE" => "Y");

$res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);

while ($ob = $res->GetNextElement()) {
    $arFields = $ob->GetFields();

    $db_props = CIBlockElement::GetProperty($arParams["IBLOCK_ID"], $arFields["ID"], array("sort" => "asc"), array("ACTIVE" => "Y"));
    $arProps = array();
    while ($arProp = $db_props->Fetch()) {
        $arProps[$arProp["CODE"]] = $arProp["VALUE"];
    }

    if ($arFields["PREVIEW_PICTURE"]) {
        $arFields["PREVIEW_PICTURE_SRC"] = CFile::GetPath($arFields["PREVIEW_PICTURE"]);
    }

    $arFields["TWITTER_URL"] = isset($arProps["TWITTER_URL"]) ? $arProps["TWITTER_URL"] : "";
    $arFields["FACEBOOK_URL"] = isset($arProps["FACEBOOK_URL"]) ? $arProps["FACEBOOK_URL"] : "";
    $arFields["INSTAGRAM_URL"] = isset($arProps["INSTAGRAM_URL"]) ? $arProps["INSTAGRAM_URL"] : "";

    $arResult["ITEMS"][] = $arFields;
}

// Передаем данные в шаблон
$this->IncludeComponentTemplate();
?>



