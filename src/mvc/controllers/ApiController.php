<?php
class ApiController extends Controller
{
    function user($id)
    {
        $isManager = false;
        require_once('./mvc/views/admin/handle-api.php');
    }

    function manager()
    {
        $isManager = true;
        require_once('./mvc/views/admin/handle-api.php');
    }
}
