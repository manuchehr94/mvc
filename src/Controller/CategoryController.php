<?php

include_once __DIR__ . "/Interface/ControllerInterface.php";

class CategoryController implements ControllerInterface
{
    public function read()
    {
        echo "read category !!!";
    }

    public function create()
    {
        echo "CREATE category!!!";
    }

    public function save()
    {

    }

    public function delete()
    {
        echo "delete category!!!";
    }

    public function update()
    {
        echo "update category!!!";
    }


}