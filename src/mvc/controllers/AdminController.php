<?php
class AdminController extends Controller
{
    function index()
    {
        $userModel = $this->model("UserModel");

        $this->view("admin/user-control", [
            'Users' => $userModel->getAllUsers()
        ]);
    }

    function film()
    {
        $filmModel = $this->model("FilmModel");

        $this->view("admin/film-control");

        $filmModel->getAllFilms();
    }

    function history()
    {
        $filmModel = $this->model("FilmModel");

        $this->view("admin/history-page");

        $filmModel->getAllFilms();
    }

    function time()
    {
        $filmModel = $this->model("FilmModel");

        $this->view("admin/time-control");

        $filmModel->getAllFilms();
    }

    function combo()
    {
        $filmModel = $this->model("FilmModel");

        $this->view("admin/combo-control");

        $filmModel->getAllFilms();
    }

    function statistics()
    {
        $filmModel = $this->model("FilmModel");

        $this->view("admin/statistics");

        $filmModel->getAllFilms();
    }

    function show($a, $b)
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
