<?php

include_once __DIR__ . "/../Service/DBConnector.php";

class Permission
{
    public $permission;

    private $conn;

    public function __construct($permission = null)
    {
        $this->conn = DBConnector::getInstance()->connect();

        $this->permission = $permission;
    }

    public function save()
    {
        $query = "INSERT INTO `rbac_permission` VALUES ('" . $this->permission . "')";

        mysqli_query($this->conn, $query);
    }

    public function all()
    {
        $permissions = [];

        $result = mysqli_query($this->conn, "Select * from `rbac_permission`");

        foreach (mysqli_fetch_all($result, MYSQLI_ASSOC) as $item) {
            $permissions[] = $item['permission'];
        }

        return $permissions;

    }
}