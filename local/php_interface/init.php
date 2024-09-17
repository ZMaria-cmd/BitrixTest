<?php
require_once __DIR__ . '/vendor/autoload.php';
$_SERVER["DOCUMENT_ROOT"] = realpath(dirname(__FILE__) . "/../..");
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    require_once($_SERVER["DOCUMENT_ROOT"] . "/bitrix/modules/main/include/prolog_before.php");
}
require_once $_SERVER["DOCUMENT_ROOT"] . "/local/php_interface/vendor/autoload.php";

use Bitrix\Main\Loader;

use Bitrix\Main\IO\File;
use Bitrix\Main\Application;
use Bitrix\Iblock\IblockTable;
use Bitrix\Main\Type\DateTime;
use PHPHtmlParser\Dom;


CModule::IncludeModule("iblock");

function getUniqueCode($title, $iblockId) {
    $code = CUtil::translit($title, "ru", [
        "replace_space" => "-",
        "replace_other" => "-",
        "lower" => "Y",
    ]);

    $filter = [
        "IBLOCK_ID" => $iblockId,
        "CODE" => $code,
    ];

    $i = 1;
    while (CIBlockElement::GetList([], $filter, false, false, ["ID"])->SelectedRowsCount() > 0) {
        $code = CUtil::translit($title, "ru", [
            "replace_space" => "-",
            "replace_other" => "-",
            "lower" => "Y",
        ]) . '-' . $i;
        $filter['CODE'] = $code;
        $i++;
    }

    return $code;
}

function downloadImage($url) {
    $imageContent = file_get_contents($url);
    $imagePath = $_SERVER['DOCUMENT_ROOT'] . '/local/upload/tmp/' . basename($url);

    if (file_put_contents($imagePath, $imageContent)) {
        return $imagePath;
    }

    return false;
}

function parseLentaNews($keyword='McDonalds')
{
    $url=$keyword;
    
    $command = '"C:\Program Files\nodejs\node" C:\OSPanel\home\bitrix.test\local\php_interface\puppeteer-script.js ' . escapeshellarg($url);

    $output = shell_exec($command . ' 2>&1');
    
    $dom = new Dom;
    $dom->loadStr($output); 
    
    
    $articles = $dom->find('.search-results__item'); 
    
    foreach ($articles as $article) {
        $title = $article->find('.card-full-other__title', 0)->text ?? $article->find('.card-full-news__title', 0)->text;
        $previewText = $article->find('.card-full-other__announce', 0)->text ?? $article->find('.card-full-news__announce', 0)->text;
        $sourceLink = $article->find('a', 0)->href ?? '';

        $outputArticle = file_get_contents('https://lenta.ru/'.$sourceLink);

        $dom1 = new Dom;
        $dom1->loadStr($outputArticle); 
        
        $detailText = strip_tags($dom1->find('.topic-body__content', 0)->innerHtml ?? '');
        $detailPicture = $dom1->find('img', 0)->src ?? '';
        $iblockId = 1; 

        $element = new CIBlockElement();

        $code = getUniqueCode($title, $iblockId);
        
        $downloadedImagePath = downloadImage($detailPicture);

        $fields = [
            'IBLOCK_ID' => $iblockId,
            'NAME' => $title,
            'PREVIEW_TEXT' => $previewText,
            'DETAIL_PICTURE' => CFile::MakeFileArray($downloadedImagePath),
            'DETAIL_TEXT' => $detailText,
            'CODE' => $code,
            'PROPERTY_VALUES' => [
                'SOURCE_LINK' => $sourceLink,
            ],
        ];

        $elementId = $element->Add($fields);
        if ($elementId) {
            echo "Элемент добавлен с ID $elementId\n";
        } else {
            echo "Ошибка добавления элемента: " . $element->LAST_ERROR . "\n";
        }

    }
    return 'parseLentaNews();';
} /*
try {
    echo parseLentaNews('McDonalds');
} catch (Exception $e) {
    echo 'Ошибка: ', $e->getMessage(), "\n";
}
    */
?>