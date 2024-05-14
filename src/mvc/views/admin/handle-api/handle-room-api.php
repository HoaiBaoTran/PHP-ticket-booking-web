<?php
header("Access-Control-Allow-Origin: *");
require_once('./mvc/models/RoomModel.php');
$roomModel = new RoomModel();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ($id == -1) {
        echo $roomModel->getAllRooms();
        return;
    } else if ($id > 0) {
        echo $roomModel->getRoomById($id);
        return;
    }
}
