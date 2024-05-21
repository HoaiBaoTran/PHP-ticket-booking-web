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

if (
    $_SERVER['REQUEST_METHOD'] == 'POST' &&
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
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['email'])) {
    $email = $_POST['email'];
    echo $userModel->getUserByEmail($email);
}

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    $data = file_get_contents('php://input');
    parse_str($data, $putData);
    foreach ($putData as $key => $value) {
        if ($key == 'firstName') {
            $firstName = $value;
        }
        if ($key == 'lastName') {
            $lastName = $value;
        }
        if ($key == 'password') {
            $password = $value;
        }
        if ($key == 'phone') {
            $phone = $value;
        }
        if ($key == 'address') {
            $address = $value;
        }
        if ($key == 'userType') {
            $userType = $value;
        }
    }
    echo $userModel->updateUser(
        $id,
        $password,
        $firstName,
        $lastName,
        $phone,
        $address,
        $userType
    );
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    echo $userModel->deleteUserById($id);
}
