<?php
class App
{
    protected $controller = "home";
    protected $action = "index";
    protected $params = [];

    function __construct()
    {
        $arr = $this->UrlProcess();

        // Xử lý Controller
        if (!empty($arr)) {
            if (file_exists("./mvc/controllers/" . $arr[0] . "Controller.php")) {
                $this->controller = ucfirst($arr[0]);
                unset($arr[0]);
            }
        }
        require_once("./mvc/controllers/" . $this->controller . "Controller.php");
        $this->controller = $this->controller . "Controller";
        $this->controller = new $this->controller;

        // Xử lý Action
        if (isset($arr[1])) {
            if (method_exists($this->controller, $arr[1])) {
                $this->action = $arr[1];
            }
            unset($arr[1]);
        }

        // Xử lý Params
        $this->params = $arr ? array_values($arr) : [];

        call_user_func_array([$this->controller, $this->action], $this->params);
    }

    // Xử lý URL
    function UrlProcess()
    {
        // Home/SayHi/1/2/3
        if (isset($_GET['url'])) {
            // Làm sạch dữ liệu (Xóa khoảng trắng,..)
            $url = filter_var(trim($_GET["url"], "/"));
            // Cắt chuỗi theo dấu /
            return explode("/", $url);
        }
    }
}
