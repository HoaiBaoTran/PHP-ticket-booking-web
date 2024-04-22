<?php
class DB
{
    public $con;
    protected $host = 'db';
    protected $dbName = 'php_ticket_booking_web';
    protected $username = 'root';
    protected $password = 'my-secret-pw';

    function __construct()
    {
        $this->con = new PDO("mysql:host=$this->host;dbname=$this->dbName", $this->username, $this->password);
        $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}
