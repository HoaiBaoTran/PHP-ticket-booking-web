<?php
class ApiController extends Controller
{
    function user($id)
    {
        $isManager = false;
        require_once('./mvc/views/admin/handle-api/handle-user-api.php');
    }

    function manager()
    {
        $isManager = true;
        require_once('./mvc/views/admin/handle-api/handle-user-api.php');
    }

    function film($id)
    {
        require_once('./mvc/views/admin/handle-api/handle-film-api.php');
    }

    function combo($id)
    {
        require_once('./mvc/views/admin/handle-api/handle-combo-api.php');
    }

    function format($id)
    {
        require_once('./mvc/views/admin/handle-api/handle-format-api.php');
    }

    function room($id)
    {
        require_once('./mvc/views/admin/handle-api/handle-room-api.php');
    }

    function showtime($id)
    {
        require_once('./mvc/views/admin/handle-api/handle-showtime-api.php');
    }

    function genre()
    {
        require_once('./mvc/views/admin/handle-api/handle-genre-api.php');
    }

    function studio()
    {
        require_once('./mvc/views/admin/handle-api/handle-studio-api.php');
    }

    function language()
    {
        require_once('./mvc/views/admin/handle-api/handle-language-api.php');
    }
}
