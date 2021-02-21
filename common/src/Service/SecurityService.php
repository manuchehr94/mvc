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

    public static function redirectToLoginPage()
    {
        header("Location: /?model=site&action=login");
        die();
    }
}