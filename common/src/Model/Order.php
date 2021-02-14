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
     * @var false|mysqli
     */
    private $conn;

    /**
     * Order constructor.
     * @param int|null $id
     * @param int|null $userId
     * @param int $status
     * @param datetime $updated
     */
    public function __construct($id = null, $userId = null, $status = null, $updated = null)
    {
        $this->conn = DBConnector::getInstance()->connect();
        $this->id = $id;
        $this->userId = $userId;
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
        $query = "INSERT INTO basket (id, user_id, status, created, updated) VALUES ( 
                                        null, 
                                        '" . $this->userId . "',
                                        '" . $this->status . "',
                                        '" . $this->created . "',
                                        '" . $this->updated . "'
                                        )";
        $result = mysqli_query($this->conn, $query);

        if(!$result) {
            throw new Exception(mysqli_error($this->conn));
        }
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