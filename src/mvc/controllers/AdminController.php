<?php
class AdminController extends Controller
{
    function index()
    {
        $filmModel = $this->model("FilmModel");

        $this->view("admin/user-control");

        $filmModel->getAllFilms();
    }

    function film()
    {
        $filmModel = $this->model("FilmModel");

        $this->view("admin/film-control");

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
