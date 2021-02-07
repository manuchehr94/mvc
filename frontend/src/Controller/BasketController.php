<?php

include_once __DIR__ . "/../../../common/src/Service/BasketService.php";
include_once __DIR__ . "/../../../common/src/Service/UserService.php";
include_once __DIR__ . "/../../../common/src/Model/BasketItem.php";
include_once __DIR__ . "/../../../common/src/Model/Product.php";

class BasketController
{
    public $user;
    public $basket;

    public function __construct()
    {
        $this->user = UserService::getCurrentUser();
        $this->basket = BasketService::getBasketByUserId($this->user['id']);
    }

    public function addProduct()
    {
        $productId = (int)$_POST['product_id'];
        $quantity = (int)$_POST['quantity'];

        if(empty($productId) || empty($quantity)) {
            throw new Exception('Empty product');
        }

        //TODO Need to change User Id

        $item = new BasketItem();
        $item->basketId = $this->basket['id'];
        $item->productId = $productId;
        $item->quantity = $quantity;
        $item->save();

        header("Location: /?model=basket&action=view");
        exit();
    }

    public function view()
    {
        $items = (new BasketItem())->getByBasketId($this->basket['id']);

        $total = 0;
        foreach ($items as $key => $item) {
            $items[$key]['product'] = (new Product())->getById($item['product_id']);
            $items[$key]['product']['sum'] =  $items[$key]['product']['price'] * $items[$key]['quantity'];
            $total = $total + $items[$key]['product']['sum'];
        }

        include_once __DIR__ . "/../../Views/basket/view.php";
    }

    public function delete()
    {
        $productId = (int)$_POST['product_id'];
        $basketId = $this->basket['id'];

        (new BasketItem())->deleteProductByBasketId($productId, $basketId);

        header("Location: /?model=basket&action=view");
        exit();
    }

}