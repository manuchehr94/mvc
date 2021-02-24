<?php

include_once __DIR__ . "/AbstractController.php";
include_once __DIR__ . "/../../../common/src/Model/Role.php";
include_once __DIR__ . "/../../../common/src/Model/Permission.php";

class AccessController extends AbstractController
{
    public function create()
    {
    }

    public function read()
    {
    }

    public function save()
    {
        if(!empty($_POST)) {
            print_r($_POST);
            die();
        }

        return $this->read();
    }

    public function delete()
    {

    }

    public function update()
    {
        $roles = (new Role())->all();
        $permissions = (new Permission())->all();

        include_once __DIR__ . "/../../Views/access/form.php";
    }

}