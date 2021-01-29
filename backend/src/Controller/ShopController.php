<?php

include_once __DIR__ . "/Interface/ControllerInterface.php";
include_once __DIR__ . "/../Model/Shop.php";

class ShopController implements ControllerInterface
{
    public function create()
    {
        include_once __DIR__ . "/../../Views/shop/form.php";
    }

    public function read()
    {
        $allShops = (new Shop())->all();
        include_once __DIR__ . "/../../Views/shop/List.php";
    }

    public function save()
    {
        if(!empty($_POST)) {

            $shop = new Shop(
                intval($_POST['id']),
                htmlspecialchars($_POST['title']),
                htmlspecialchars($_POST['address'])
            );

            $shop->save();
        }

        return $this->read();
    }

    public function delete()
    {
        $id = (int)$_GET['id'];
        (new Shop())->deleteById($id);
        return $this->read();
    }

    public function update()
    {
        $id = (int)$_GET['id'];

        if(empty($id)) die("Undefined id");

        $oneShop = (new Shop())->getById($id);

        if(empty($oneShop)) die("Shop is not found");

        include_once __DIR__ . "/../../Views/shop/form.php";
    }

}