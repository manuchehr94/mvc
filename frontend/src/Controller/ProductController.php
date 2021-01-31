<?php

include_once __DIR__ . "/../../../common/src/Model/Product.php";

class ProductController
{
    public function all()
    {
        $allProducts = (new Product())->all();
        include_once __DIR__ . "/../../Views/product/List.php";
    }

    public function view()
    {
        $allProducts = (new Product())->all();

        $id = (int)$_GET['id'];

        if(empty($id)) die("Undefined id");

        $oneProduct = (new Product())->getById($id);

        if(empty($oneProduct)) die("Product is not found");

        include_once __DIR__ . "/../../Views/product/view.php";
    }
}