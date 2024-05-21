<?php
header("Access-Control-Allow-Origin: *");
require_once('./mvc/models/TicketModel.php');
$ticketModel = new TicketModel();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    echo $ticketModel->getAllTicketsByShowTimeId($id);
}
