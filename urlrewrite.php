<?php
$arUrlRewrite = array ( 
  array (
    'CONDITION' => '#^/rest/#',
    'RULE' => '',
    'ID' => NULL,
    'PATH' => '/bitrix/services/rest/index.php',
    'SORT' => 100,
  ),
  array(
    "CONDITION" => "#^/news/#",
    "RULE" => "",
    "ID" => "parser:news",
    "PATH" => "/news/index.php",
),
array(
    "CONDITION" => "#^/news/(?P<CODE>[a-zA-Z0-9_-]+)/#",
    "RULE" => "ELEMENT_CODE=\$CODE",
    "ID" => "bitrix:news.detail",
    "PATH" => "/news/index.php",
),
);

