<?php

include_once __DIR__ . "/../Service/DBConnector.php";

class BasketItem
{
    public $id;
    public $basketId;
    public $productId;
    public $quantity;

    private $conn;

    public function __construct(
        $basketId = null,
        $productId = null,
        $quantity = null
    )
    {
        $this->conn = DBConnector::getInstance()->connect();
        $this->basketId = $basketId;
        $this->productId = $productId;
        $this->quantity = $quantity;
    }

    public function save()
    {
        if($this->id) {
            $query = "UPDATE basket_item set quantity=" .
                $this->quantity ." WHERE id = " . $this->id . " LIMIT 1";
        } else {
            $query = "INSERT INTO basket_item (id, basket_id, product_id, quantity) VALUES ( 
                null, '" . $this->basketId . "', '" . $this->productId . "', '" . $this->quantity . "'
                        
            )";
        }

        $result = mysqli_query($this->conn, $query);

        if(!$result) {
            throw new Exception(mysqli_error($this->conn));
        }
    }

    public function getByBasketId($basketId)
    {
        $result = mysqli_query($this->conn, "Select * from basket_item where basket_id = $basketId");
        $all = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $all;
    }

    public function deleteProductByBasketId($productId, $basketId)
    {
        return mysqli_query($this->conn, "delete from basket_item where product_id = $productId and basket_id = $basketId limit 1");
    }

    public function clearByBasketId($basketId)
    {
        return mysqli_query($this->conn, "delete from basket_item where basket_id = $basketId");
    }

}