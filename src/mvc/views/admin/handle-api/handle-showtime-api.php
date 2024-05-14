<?php
header("Access-Control-Allow-Origin: *");
require_once('./mvc/models/ShowtimeModel.php');
$showtimeModel = new ShowtimeModel();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ($id == -1) {
        echo $showtimeModel->getAllShowtime();
        return;
    } else if ($id > 0) {
        echo $showtimeModel->getShowtimeById($id);
        return;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $filmId = -1;
    $startTime = -1;
    $endTime = -1;
    $price = -1;
    $formatId = -1;
    $roomId = -1;

    if (isset($_POST['price'])) {
        $price = $_POST['price'];
    }
    if (isset($_POST['startTime'])) {
        $startTime = $_POST['startTime'];
    }
    if (isset($_POST['endTime'])) {
        $endTime = $_POST['endTime'];
    }
    if (isset($_POST['filmId'])) {
        $filmId = $_POST['filmId'];
    }
    if (isset($_POST['roomId'])) {
        $roomId = $_POST['roomId'];
    }
    if (isset($_POST['formatId'])) {
        $formatId = $_POST['formatId'];
    }

    echo $filmId;
    echo $startTime;
    echo   $endTime;
    echo     $price;
    echo  $formatId;
    echo    $roomId;
    // echo $showtimeModel->addShowtime(
    //     $filmId,
    //     $startTime,
    //     $endTime,
    //     $price,
    //     $formatId,
    //     $roomId
    // );
}
