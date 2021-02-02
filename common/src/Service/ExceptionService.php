<?php


class ExceptionService
{
    public static function error(Exception $e)
    {
        $code = $e->getCode();
        $message = $e->getMessage();

        include_once __DIR__ . '/../../../frontend/Views/Exception/400.php';
    }


}