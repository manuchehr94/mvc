<?php

    include_once __DIR__ . "/../Model/Basket.php";

class BasketService
{
    public static function getBasketByUserId($userId)
    {
        $basket = new Basket($userId);


        if($basket->getFromId() == null) {
            $basket->userId = $userId;
            $basket->save();
        }

        return $basket->getFromId();
    }

}