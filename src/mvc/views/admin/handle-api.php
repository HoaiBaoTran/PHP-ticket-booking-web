<?php
require_once('./mvc/models/UserModel.php');
$userModel = new UserModel();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        echo $action;
        switch ($action) {
            case 'getAllUsers':
                echo $userModel->getAllUsers();
                break;
            case 'getAllManagers':
                echo $userModel->getAllManagers();
                break;
            default:
                echo json_encode(array('error' => 'Unknown action'));
                break;
        }
    } else {
    }
}
