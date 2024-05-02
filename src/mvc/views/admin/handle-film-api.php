<?php
header("Access-Control-Allow-Origin: *");
require_once('./mvc/models/FilmModel.php');
$filmModel = new FilmModel();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ($id == 0) {
        echo $filmModel->getHotFilms();
        return;
    } else if ($id == -1) {
        echo $filmModel->getPremiereFilms();
        return;
    } else if ($id == -2) {
        echo $filmModel->getUpComingFilms();
        return;
    } else if ($id > 0) {
        echo $filmModel->getFilmById($id);
        return;
    } else {
        echo $filmModel->getAllFilms();
        return;
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($id == -3) {
        $genre = -1;
        $studio = -1;
        $language = -1;
        $id = -1;
        if (isset($_POST['genre'])) {
            $genre = $_POST['genre'];
        }
        if (isset($_POST['studio'])) {
            $studio = $_POST['studio'];
        }
        if (isset($_POST['language'])) {
            $language = $_POST['language'];
        }
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
        }
        echo $filmModel->getFilmsByCondition($genre, $studio, $language, $id);
        return;
    }
}
//     if (isset($_POST['action'])) {
//         $action = $_POST['action'];
//         switch ($action) {
//             case 'addUser':
//                 if (
//                     isset($_POST['email']) &&
//                     isset($_POST['username']) &&
//                     isset($_POST['password']) &&
//                     isset($_POST['firstName']) &&
//                     isset($_POST['lastName']) &&
//                     isset($_POST['address']) &&
//                     isset($_POST['phone']) &&
//                     isset($_POST['userType'])
//                 ) {
//                     $email = $_POST['email'];
//                     $username = $_POST['username'];
//                     $password = $_POST['password'];
//                     $firstName = $_POST['firstName'];
//                     $lastName = $_POST['lastName'];
//                     $address = $_POST['address'];
//                     $phone = $_POST['phone'];
//                     $userType = $_POST['userType'];
//                     echo $filmModel->addUser(
//                         $username,
//                         $password,
//                         $firstName,
//                         $lastName,
//                         $email,
//                         $phone,
//                         $address,
//                         $userType
//                     );
//                     break;
//                 }
//             default:
//                 echo json_encode(array('error' => 'Unknown action'));
//                 break;
//         }
//     }
// }

// if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
//     // Read the raw input
//     $data = file_get_contents('php://input');
//     // Parse the raw input into an associative array
//     parse_str($data, $putData);
//     foreach ($putData as $key => $value) {
//         if ($key == 'firstName') {
//             $firstName = $value;
//         }
//         if ($key == 'lastName') {
//             $lastName = $value;
//         }
//         if ($key == 'password') {
//             $password = $value;
//         }
//         if ($key == 'phone') {
//             $phone = $value;
//         }
//         if ($key == 'address') {
//             $address = $value;
//         }
//         if ($key == 'userType') {
//             $userType = $value;
//         }
//     }
//     echo $filmModel->updateUser(
//         $id,
//         $password,
//         $firstName,
//         $lastName,
//         $phone,
//         $address,
//         $userType
//     );
// }

// if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
//     echo $filmModel->deleteUserById($id);
// }
