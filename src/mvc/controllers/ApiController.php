<?php
header("Access-Control-Allow-Origin: *");
class ApiController extends Controller
{
    function user()
    {
        require_once('./mvc/views/admin/handle-api.php');
    }
}
