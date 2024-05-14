<?php
class HomeController extends Controller
{
    function index()
    {
        $userModel = $this->model("UserModel");

        $this->view("home/main");
    }

    function movieList()
    {
        $this->view("home/movie-list");
    }

    function order()
    {
        $this->view("home/order");
    }

    function detail()
    {
        $this->view("home/detail");
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
