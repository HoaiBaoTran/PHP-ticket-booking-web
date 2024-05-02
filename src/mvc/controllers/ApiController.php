<?php
class ApiController extends Controller
{
    function user($id)
    {
        $isManager = false;
        require_once('./mvc/views/admin/handle-user-api.php');
    }

    function manager()
    {
        $isManager = true;
        require_once('./mvc/views/admin/handle-user-api.php');
    }

    function film($id)
    {
        require_once('./mvc/views/admin/handle-film-api.php');
    }

    function genre()
    {
        require_once('./mvc/views/admin/handle-genre-api.php');
    }

    function studio()
    {
        require_once('./mvc/views/admin/handle-studio-api.php');
    }

    function language()
    {
        require_once('./mvc/views/admin/handle-language-api.php');
    }
}
