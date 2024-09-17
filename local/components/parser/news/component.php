<?php


if ($arParams["SEF_MODE"] == "Y") {
    $arVariables = array();
    $componentPage = CComponentEngine::ParseComponentPath(
        $arParams["SEF_FOLDER"],
        array(
            "news" => "",
            "detail" => "#CODE#/",
        ),
        $arVariables
    );

    if (!$componentPage) {
        $componentPage = "news"; 
    }

    if ($componentPage == "detail") {
        $arResult["DETAIL_CODE"] = $arVariables["CODE"];
    }
}

    $arSelect = array("ID", "NAME", "PREVIEW_TEXT", "DETAIL_PICTURE", "CODE");
    $arFilter = array("IBLOCK_ID" => $arParams["IBLOCK_ID"], "ACTIVE" => "Y");

    $res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);

    $arResult["ITEMS"] = array();
    while ($ob = $res->GetNextElement()) {
        $arFields = $ob->GetFields();

        if ($arFields["DETAIL_PICTURE"]) {
            $arFields["DETAIL_PICTURE_SRC"] = CFile::GetPath($arFields["DETAIL_PICTURE"]);
        }
        else {
            $arFields["DETAIL_PICTURE_SRC"] = "https://bitrix.test/local/upload/tmp/img.jpg";
        }

        $arFields["DETAIL_PAGE_URL"] = str_replace("#CODE#", $arFields["CODE"], $arParams["DETAIL_PAGE_URL"]);

        $arResult["ITEMS"][] = $arFields;
    }

    $this->IncludeComponentTemplate();

