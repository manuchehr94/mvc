<?php


class SecurityService
{
    public function checkPassword($login, $password)
    {
        return true;
    }

    public static function redirectToStarterPage()
    {
        header("Location: /");
        die();
    }
}