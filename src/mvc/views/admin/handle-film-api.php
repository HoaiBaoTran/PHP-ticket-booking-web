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
    } else if ($id == -1) {
        $name = -1;
        $director = -1;
        $year = -1;
        $premiere = -1;
        $urlTrailer = -1;
        $time = -1;
        $studioId = -1;
        $languageId = -1;
        $description = -1;
        $age = -1;
        $rating = -1;
        $genres = -1;
        $urlPosterVertical = -1;
        $urlPosterHorizontal = -1;
        $imageList = -1;

        if (isset($_POST['name'])) {
            $name = $_POST['name'];
        }
        if (isset($_POST['director'])) {
            $director = $_POST['director'];
        }
        if (isset($_POST['year'])) {
            $year = $_POST['year'];
        }
        if (isset($_POST['premiere'])) {
            $premiere = $_POST['premiere'];
        }
        if (isset($_POST['urlTrailer'])) {
            $urlTrailer = $_POST['urlTrailer'];
        }
        if (isset($_POST['time'])) {
            $time = $_POST['time'];
        }
        if (isset($_POST['studioId'])) {
            $studioId = $_POST['studioId'];
        }
        if (isset($_POST['languageId'])) {
            $languageId = $_POST['languageId'];
        }
        if (isset($_POST['description'])) {
            $description = $_POST['description'];
        }
        if (isset($_POST['age'])) {
            $age = $_POST['age'];
        }
        if (isset($_POST['rating'])) {
            $rating = $_POST['rating'];
        }
        if (isset($_POST['genres'])) {
            $genres = $_POST['genres'];
        }
        if (isset($_POST['imageFile'])) {
            $urlPosterVertical = $_POST['imageFile'];
        }
        if (isset($_POST['posterFile'])) {
            $urlPosterHorizontal = $_POST['posterFile'];
        }
        if (isset($_POST['imageList'])) {
            $imageList = $_POST['imageList'];
        }
        echo $filmModel->addFilm(
            $name,
            $director,
            $year,
            $premiere,
            $urlTrailer,
            $time,
            $studioId,
            $languageId,
            $description,
            $age,
            $rating,
            $genres,
            $urlPosterVertical,
            $urlPosterHorizontal,
            $imageList
        );
    }
}

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
