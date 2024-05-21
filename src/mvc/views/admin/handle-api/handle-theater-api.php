<?php
header("Access-Control-Allow-Origin: *");
require_once('./mvc/models/TheaterModel.php');
$theaterModel = new TheaterModel();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    echo $theaterModel->getAllTheaters();
}
