<?php

include_once __DIR__ . "/../../../common/src/Model/Product.php";

class SiteController
{
    public function index()
    {
        $allProducts = (new Product())->all();
        include_once __DIR__ . "/../../Views/site/index.php";
    }
}