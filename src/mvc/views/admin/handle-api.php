<?php
header("Access-Control-Allow-Origin: *");
require_once('./mvc/models/UserModel.php');
$userModel = new UserModel();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        switch ($action) {
            case 'getAllUsers':
                echo $userModel->getAllUsers();
                break;
            case 'getAllManagers':
                echo $userModel->getAllManagers();
                break;
            case 'getUserById':
                if ($id > 0) {
                    echo $userModel->getUserById($id);
                }
                break;
            case 'addUser':
                echo $userModel->addUser();
                break;
            default:
                echo json_encode(array('error' => 'Unknown action'));
                break;
        }
    } else {
    }
}
