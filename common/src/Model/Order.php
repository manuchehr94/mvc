<?php

include_once __DIR__ . "/../Service/DBConnector.php";

class Order
{
    /**
     * @var int|null
     */
    private $id;

    /**
     * @var int|null
     */
    private $userId;

    /**
     * @var int
     */
    private $deliveryId;

    /**
     * @var int
     */
    private $paymentId;

    /**
     * @var int
     */
    private $total;

    /**
     * @var int
     */
    private $status;

    /**
     * @var datetime
     */
    private $created;

    /**
     * @var datetime
     */
    private $updated;

    /**
     * @var string|null
     */
    private $comment;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $phone;

    /**
     * @var string
     */
    private $email;

    /**
     * @var false|mysqli
     */
    private $conn;

    /**
     * Order constructor.
     * @param int|null $id
     * @param int|null $userId
     * @param int $deliveryId
     * @param int $total
     * @param int|null $paymentId
     * @param string|null $comment
     * @param string $name
     * @param string $phone
     * @param string $email
     * @param int $status
     * @param datetime $updated
     */
    public function __construct(
                                $id = null,
                                $userId = null,
                                $paymentId = null,
                                $deliveryId = null,
                                $total = null,
                                $comment = null,
                                $name = null,
                                $phone= null,
                                $email= null,
                                $status = null,
                                $updated = null
    )
    {
        $this->conn = DBConnector::getInstance()->connect();
        $this->id = $id;
        $this->userId = $userId;
        $this->paymentId = $paymentId;
        $this->deliveryId = $deliveryId;
        $this->total = $total;
        $this->comment = $comment;
        $this->name = $name;
        $this->phone = $phone;
        $this->email = $email;
        $this->status = $status;
        if($this->id == null) {
            $this->created = date('Y-m-d H:i:s', time());
        }
        $this->updated = $updated ?? date('Y-m-d H:i:s', time());
    }

    /**
     * @return int|null
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return int|null
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param int|null $userId
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return int
     */
    public function getDeliveryId(): int
    {
        return $this->deliveryId;
    }

    /**
     * @param int $deliveryId
     */
    public function setDeliveryId(int $deliveryId)
    {
        $this->deliveryId = $deliveryId;
    }

    /**
     * @return int
     */
    public function getPaymentId(): int
    {
        return $this->paymentId;
    }

    /**
     * @param int $paymentId
     */
    public function setPaymentId(int $paymentId)
    {
        $this->paymentId = $paymentId;
    }

    /**
     * @return int
     */
    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * @param int $total
     */
    public function setTotal(int $total)
    {
        $this->total = $total;
    }

    /**
     * @return string|null
     */
    public function getComment(): string
    {
        return $this->comment;
    }

    /**
     * @param string|null $comment
     */
    public function setComment(string $comment)
    {
        $this->comment = $comment;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    /**
     * @return datetime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * @param datetime $created
     */
    public function setCreated($created)
    {
        $this->created = $created;
    }

    /**
     * @return datetime
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * @param datetime $updated
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    /**
     * @return int|null
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * @throws Exception
     */
    public function save()
    {
        $query = "INSERT INTO orders (
                                        id, 
                                        user_id, 
                                        status, 
                                        created, 
                                        updated, 
                                        delivery_id, 
                                        payment_id, 
                                        total, 
                                        comment,
                                        name, 
                                        phone,
                                        email
                                        ) 
                                    VALUES ( 
                                        null, 
                                        '" . $this->userId . "',
                                        '" . $this->status . "',
                                        '" . $this->created . "',
                                        '" . $this->updated . "',
                                        '" . $this->deliveryId . "',
                                        '" . $this->paymentId . "',
                                        '" . $this->total . "', 
                                        '" . $this->comment . "',
                                        '" . $this->name . "',
                                        '" . $this->phone . "',
                                        '" . $this->email . "'
                                    )";
        $result = mysqli_query($this->conn, $query);

        if(!$result) {
            throw new Exception(mysqli_error($this->conn));
        }

        $result = mysqli_query($this->conn, "SELECT LAST_INSERT_ID() as last_id");

        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return reset($result)['last_id'] ?? null;
    }

    /**
     * @return array<Order>
     */
    public function getFromId()
    {
        $result = mysqli_query($this->conn, "Select * from orders where user_id = 
                                                            " . $this->userId . " limit 1");
        $oneProduct = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return reset($oneProduct);
    }
}