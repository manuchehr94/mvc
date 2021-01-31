<?php

include_once __DIR__ . "/../Service/DBConnector.php";

class Category

{
    public $id;
    public $title;
    public $groupId;
    public $parentId;

    private $conn;

    public function __construct($id = null, $title = null, $groupId = null, $parentId = null)
    {
        $this->conn = DBConnector::getInstance()->connect();

        $this->id = $id;
        $this->title = $title;
        $this->groupId = $groupId;
        $this->parentId = $parentId;
    }

    public function save()
    {
        if($this->id > 0) {

            $query = "Update categories set 
                                        title='" . $this->title . "', 
                                        group_id='" . $this->groupId . "', 
                                         parent_id='" . $this->parentId . "'
                                         where id=" . $this->id . " limit 1";

        } else {
            $query = "INSERT INTO categories VALUES (
                                            null, 
                                            '" . $this->title . "', 
                                            '" . $this->groupId . "', 
                                            '" . $this->parentId . "'
            )";
        }

        mysqli_query($this->conn, $query);
    }

    public function all()
    {
        $result = mysqli_query($this->conn, "Select * from categories order by id DESC");
        return mysqli_fetch_all($result, MYSQLI_ASSOC);

    }

    public function getById($id)
    {
        $result = mysqli_query($this->conn, "Select * from categories where id = $id limit 1");
        $oneCategory = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return reset($oneCategory);
    }

    public function deleteById($id)
    {
        return mysqli_query($this->conn, "delete from categories where id = $id limit 1");
    }


}