<?php
header("Access-Control-Allow-Origin: *");
require_once('./mvc/models/LanguageModel.php');
$languageModel = new LanguageModel();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    echo $languageModel->getAllLanguages();
}
