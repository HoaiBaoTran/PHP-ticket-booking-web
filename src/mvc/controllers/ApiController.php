<?php
class ApiController extends Controller
{
    function user($id)
    {
        require_once('./mvc/views/admin/handle-api.php');
    }

    function manager()
    {
        require_once('./mvc/views/admin/handle-api.php');
    }
}
