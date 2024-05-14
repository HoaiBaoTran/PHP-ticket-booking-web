<?php
header("Access-Control-Allow-Origin: *");
require_once('./mvc/models/FormatModel.php');
$formatModel = new FormatModel();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ($id == -1) {
        echo $formatModel->getAllFormats();
        return;
    } else if ($id > 0) {
        echo $formatModel->getFormatById($id);
        return;
    }
}
