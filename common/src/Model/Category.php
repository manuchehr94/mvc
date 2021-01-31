<?php

include_once __DIR__ . "/../Service/DBConnector.php";

class Category

{
    public $id;
    public $title;
    public $group_id;
    public $parent_id;

    private $conn;

    public function __construct($id = null, $title = null, $group_id = null, $parent_id = null)
    {
        $this->conn = DBConnector::getInstance()->connect();

        $this->id = $id;
        $this->title = $title;
        $this->group_id = $group_id;
        $this->parent_id = $parent_id;
    }

    public function save()
    {
        if($this->id > 0) {

            $query = "Update categories set 
                                        title='" . $this->title . "', 
                                        group_id='" . $this->group_id . "', 
                                         parent_id='" . $this->parent_id . "'
                                         where id=" . $this->id . " limit 1";

        } else {
            $query = "INSERT INTO categories VALUES (
                                            null, 
                                            '" . $this->title . "', 
                                            '" . $this->group_id . "', 
                                            '" . $this->parent_id . "'
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