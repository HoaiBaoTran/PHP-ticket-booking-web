<?php
class HomeController extends Controller
{
    function index()
    {
        $filmModel = $this->model("FilmModel");
        $filmModel->getAllFilms();
    }

    function login()
    {
        $this->view("../views/Login.php");
    }

    function Show($a, $b)
    {
        // GỌi model
        $teo = $this->model("FilmModel");
        $tong = $teo->addFilm($a, $b);

        // GỌI View
        $this->view("aodep", [
            "Page" => "news",
            "Number" => $tong,
            "Mau" => "red",
            "SoThich" => ["A", "B", "C"],
            "SV" => $teo->SinhVien()
        ]);
    }
}
