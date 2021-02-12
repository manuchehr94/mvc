<?php

    include_once __DIR__ . "/../Model/Basket.php";
    include_once __DIR__ . "/../Model/BasketItem.php";
    include_once __DIR__ . "/interfaces/BasketInterface.php";

class BasketService implements BasketInterface
{
    public static function getBasketByUserId($userId)
    {
        $basket = new Basket($userId);


        if ($basket->getFromId() == null) {
            $basket->userId = $userId;
            $basket->save();
        }

        return $basket->getFromId();
    }

    public function updateBasketItem($basketId, $productId, $quantity)
    {
        (new BasketItem($basketId, $productId, $quantity))->update();
    }

    public function deleteBasketItem($productId, $basketId)
    {
        (new BasketItem())->deleteProductByBasketId($productId, $basketId);
    }

    public function createBasketItem($basketId, $productId, $quantity)
    {
        $item = new BasketItem();
        $item->basketId = $basketId;
        $item->productId = $productId;
        $item->quantity = $quantity;
        $item->save();
    }

    public function getBasketProducts($basketId)
    {
        return (new BasketItem())->getByBasketId($basketId);
    }

}