<?php

include_once __DIR__ . "/../../../common/src/Service/BasketService.php";
include_once __DIR__ . "/../../../common/src/Service/UserService.php";
include_once __DIR__ . "/../../../common/src/Model/BasketItem.php";
include_once __DIR__ . "/../../../common/src/Model/Product.php";

class BasketController
{
    public $user;

    public function __construct()
    {
        $this->user = UserService::getCurrentUser();
    }

    public function addProduct()
    {
        $productId = (int)$_POST['product_id'];
        $quantity = (int)$_POST['quantity'];

        if(empty($productId) || empty($quantity)) {
            throw new Exception('Empty product');
        }

        //TODO Need to change User Id
        $basket = BasketService::getBasketByUserId($this->user['id']);

        $item = new BasketItem();
        $item->basketId = $basket['id'];
        $item->productId = $productId;
        $item->quantity = $quantity;
        $item->save();

        header("Location: /?model=basket&action=view");
        exit();
    }

    public function view()
    {
        $basket = BasketService::getBasketByUserId($this->user['id']);
        $items = (new BasketItem())->getByBasketId($basket['id']);

        foreach ($items as $key => $item) {
            $items[$key]['product'] = (new Product())->getById($item['product_id']);
        }

        include_once __DIR__ . "/../../Views/basket/view.php";
    }

}