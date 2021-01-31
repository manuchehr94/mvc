<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";


class Fixture01
{
    private $conn;

    private $data = [
        [
            'id' => 'null',
            'title' =>'klsdnv1111',
            'picture' => '01.png',
            'preview' => 'kldmc',
            'content' => 'content',
            'price' => '322',
            'status' => '1',
            'created' => '2021-01-24 07:47:04',
            'updated' => '2021-01-25 12:54:34'
        ],
        [
            'id' => 'null',
            'title' =>'klsdnv2222',
            'picture' => '02.png',
            'preview' => 'kldmc',
            'content' => 'content',
            'price' => '322',
            'status' => '1',
            'created' => '2021-01-24 07:47:04',
            'updated' => '2021-01-25 12:54:34'
        ],
        [
            'id' => 'null',
            'title' =>'klsdnv3333',
            'picture' => '03.png',
            'preview' => 'kldmc',
            'content' => 'content',
            'price' => '322',
            'status' => '1',
            'created' => '2021-01-24 07:47:04',
            'updated' => '2021-01-25 12:54:34'
        ],
        [
            'id' => 'null',
            'title' =>'klsdnv4444',
            'picture' => '04.png',
            'preview' => 'kldmc',
            'content' => 'content',
            'price' => '322',
            'status' => '1',
            'created' => '2021-01-24 07:47:04',
            'updated' => '2021-01-25 12:54:34'
        ],
        [
            'id' => 'null',
            'title' =>'klsdnv5555',
            'picture' => '05.png',
            'preview' => 'kldmc',
            'content' => 'content',
            'price' => '322',
            'status' => '1',
            'created' => '2021-01-24 07:47:04',
            'updated' => '2021-01-25 12:54:34'
        ],
        [
            'id' => 'null',
            'title' =>'klsdnv6666',
            'picture' => '06.png',
            'preview' => 'kldmc',
            'content' => 'content',
            'price' => '322',
            'status' => '1',
            'created' => '2021-01-24 07:47:04',
            'updated' => '2021-01-25 12:54:34'
        ],
        [
            'id' => 'null',
            'title' =>'klsdnv7777',
            'picture' => '07.png',
            'preview' => 'kldmc',
            'content' => 'content',
            'price' => '322',
            'status' => '1',
            'created' => '2021-01-24 07:47:04',
            'updated' => '2021-01-25 12:54:34'
        ],
        [
            'id' => 'null',
            'title' =>'klsdnv8888',
            'picture' => '08.png',
            'preview' => 'kldmc',
            'content' => 'content',
            'price' => '322',
            'status' => '1',
            'created' => '2021-01-24 07:47:04',
            'updated' => '2021-01-25 12:54:34'
        ],
        [
            'id' => 'null',
            'title' =>'klsdnv9999',
            'picture' => '09.png',
            'preview' => 'kldmc',
            'content' => 'content',
            'price' => '322',
            'status' => '1',
            'created' => '2021-01-24 07:47:04',
            'updated' => '2021-01-25 12:54:34'
        ],
        [
            'id' => 'null',
            'title' =>'klsdnv101010',
            'picture' => '10.png',
            'preview' => 'kldmc',
            'content' => 'content',
            'price' => '322',
            'status' => '1',
            'created' => '2021-01-24 07:47:04',
            'updated' => '2021-01-25 12:54:34'
        ]

    ];

    public function __construct(DBConnector $conn)
    {
        $this->conn = $conn->connect();
    }

    public function run()
    {
        foreach ($this->data as $product) {
            copy(__DIR__ . "/../../fixtures_pics/" . $product['picture'], __DIR__ . "/../../../uploads/products/" . $product['picture']);

            mysqli_query($this->conn,
                "INSERT INTO products VALUES (
                                                '" . $product['id'] . "', 
                                                '" . $product['title'] . "',
                                                '" . $product['picture'] . "', 
                                                '" . $product['preview'] . "', 
                                                '" . $product['content'] . "', 
                                                '" . $product['price'] . "', 
                                                '" . $product['status'] . "', 
                                                '" . $product['created'] . "', 
                                                '" . $product['updated'] . "'
                                                )
             ");
        }
    }
}