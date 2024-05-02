<?php
header("Access-Control-Allow-Origin: *");
require_once('./mvc/models/GenreModel.php');
$genreModel = new GenreModel();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    echo $genreModel->getAllGenres();
}
