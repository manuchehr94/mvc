<?php

include __DIR__ . "/../../../common/src/Model/Order.php";
include __DIR__ . "/../../../common/src/Model/OrderItem.php";
include __DIR__ . "/../../../common/src/Service/OrderService.php";
include __DIR__ . "/../../../common/src/Service/UserService.php";
include __DIR__ . "/../../../common/src/Service/BasketCookieService.php";
include __DIR__ . "/../../../common/src/Service/BasketDBService.php";

class OrderController
{
    private $basketService;

    public function __construct()
    {
        $this->basketService = (new BasketDBService());
        //$this->basketService = (new BasketCookieService());
    }

    public function index()
    {
        include_once __DIR__ . "/../../Views/order/form.php";
    }

    public function create()
    {
        $name = htmlspecialchars($_POST['name']);
        //TODO create validation phone
        $phone = htmlspecialchars($_POST['phone']);
        //TODO create validation phone
        $email = htmlspecialchars($_POST['email']);

        $delivery = (int)$_POST['delivery'];
        $payment = (int)$_POST['payment'];
        $comment = (int)$_POST['comment'];
        $userId = UserService::getCurrentUser()['id'] ?? 0;
        $total = 0;
        $status = OrderService::STATUS_NEW;
        $updated = date("Y:m:d H:i:s", time());

        $order = new Order(
                        null,
                        $userId,
                        $payment,
                        $delivery,
                        $total,
                        $comment,
                        $name,
                        $phone,
                        $email,
                        $status,
                        $updated
        );

        $orderId = $order->save();

        if(empty($orderId)) {
            throw new Exception("Order id is null", 400);
        }

        $basketId = $this->basketService->getBasketIdByUserId($userId);
        $items = $this->basketService->getBasketProducts($basketId);

        if(empty($items)) {
            throw new Exception("Basket is empty", 400);
        }

        foreach ($items as $item) {
            $orderItem = new OrderItem($orderId, (int)$item['product_id'], (int)$item['quantity']);
            $orderItem->save();
        }

        $this->basketService->clearBasket($basketId);

        header("Location: /?model=order&action=success&order_id=" . $orderId);
    }

    public function success()
    {
        $orderId = (int)$_GET['order_id'];

        include_once __DIR__ . "/../../Views/order/success.php";
    }

}