<?php


class ExceptionService
{
    public static function error(Exception $e, $side)
    {
        //error_log
        $code = $e->getCode();
        $message = $e->getMessage();

        include_once __DIR__ . "/../../../$side/Views/Exception/400.php";
    }


}