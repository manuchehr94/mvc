<?php

    include_once __DIR__ . "/../Service/DBConnector.php";

class Access
{
    private $conn;

    public function __construct()
    {
        $this->conn = DBConnector::getInstance()->connect();
    }

    public function all()
    {
        $result = mysqli_query($this->conn, "Select * from rbac_access");
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

}