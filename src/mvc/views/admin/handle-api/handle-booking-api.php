<?php
header("Access-Control-Allow-Origin: *");
require_once('./mvc/models/BookingModel.php');
$bookingModel = new BookingModel();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ($id == -1) {
        echo $bookingModel->getAllBookings();
        return;
    } else if ($id > 0) {
        echo $bookingModel->getBookingById($id);
        return;
    }
}
