<?php
header("Access-Control-Allow-Origin: *");
require_once('./mvc/models/UserModel.php');
$userModel = new UserModel();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ($isManager) {
        echo $userModel->getAllManagers();
        return;
    }
    if ($id > 0) {
        echo $userModel->getUserById($id);
        return;
    } else {
        echo $userModel->getAllUsers();
        return;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action'])) {
        $action = $_POST['action'];
        switch ($action) {
            case 'addUser':
                if (
                    isset($_POST['email']) &&
                    isset($_POST['username']) &&
                    isset($_POST['password']) &&
                    isset($_POST['firstName']) &&
                    isset($_POST['lastName']) &&
                    isset($_POST['address']) &&
                    isset($_POST['phone']) &&
                    isset($_POST['userType'])
                ) {
                    $email = $_POST['email'];
                    $username = $_POST['username'];
                    $password = $_POST['password'];
                    $firstName = $_POST['firstName'];
                    $lastName = $_POST['lastName'];
                    $address = $_POST['address'];
                    $phone = $_POST['phone'];
                    $userType = $_POST['userType'];
                    echo $userModel->addUser(
                        $username,
                        $password,
                        $firstName,
                        $lastName,
                        $email,
                        $phone,
                        $address,
                        $userType
                    );
                    break;
                }
            default:
                echo json_encode(array('error' => 'Unknown action'));
                break;
        }
    } else {
    }
}
