<?php
header("Access-Control-Allow-Origin: *");
require_once('./mvc/models/ComboModel.php');
$comboModel = new ComboModel();
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ($id == -1) {
        echo $comboModel->getAllCombos();
        return;
    } else if ($id > 0) {
        echo $comboModel->getComboById($id);
        return;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = -1;
    $price = -1;
    $status = -1;

    if (isset($_POST['name'])) {
        $name = $_POST['name'];
    }
    if (isset($_POST['price'])) {
        $price = $_POST['price'];
    }
    if (isset($_POST['status'])) {
        $status = $_POST['status'];
    }

    if ($id == -1) {
        $image = $_FILES['image']['name'];
        $imageFile = $_FILES['image']['tmp_name'];
        $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/public/images/';
        $imageFileName = $uploadDir . basename($_FILES['image']['name']);

        if (move_uploaded_file($imageFile, $imageFileName)) {
            echo $comboModel->addCombo($name, $price, $status, $image);
        }
    } else if ($id == -2) {
        echo $comboModel->updateComboById($id, $name, $price, $status);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    $data = file_get_contents('php://input');
    parse_str($data, $putData);

    foreach ($putData as $key => $value) {
        if ($key == 'name') {
            $name = $value;;
        }
        if ($key == 'price') {
            $price = $value;
        }
        if ($key == 'status') {
            $status = $value;
        }
    }

    echo $comboModel->updateComboById($id, $name, $price, $status);
}

if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    echo $comboModel->deleteComboById($id);
}
