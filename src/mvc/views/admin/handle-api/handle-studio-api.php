<?php
header("Access-Control-Allow-Origin: *");
require_once('./mvc/models/StudioModel.php');
$studioModel = new StudioModel();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    echo $studioModel->getAllStudios();
}
