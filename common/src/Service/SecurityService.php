<?php

    include_once __DIR__ . "/../../../common/src/Model/User.php";

class SecurityService
{
    public function checkPassword($user, $password)
    {
        if(empty($user)) {
            throw new Exception("User wasn't found", 404);
        }

        if(UserService::encodePassword($password) !== $user['password']) {
            //TODO SECURITY
            throw new Exception("Incorrect password", 400);
        }
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