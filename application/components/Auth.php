<?php


namespace application\components;


class Auth
{
    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }

    public static function setSession($id, $role)
    {
        $_SESSION['user']['id'] = $id;
        $_SESSION['user']['role'] = $role;
    }

    public static function setCookie($user_name,$cookie_key)
    {
        // set cookie user_name
        // set cookie cookie_key
    }

    public static function logout()
    {
        session_unset();
        session_destroy();
        header("Location: /"); // redirect to home page
    }

    public static function goHome()
    {
        header("Location: /"); // redirect to home page
    }

    public static function goLoginPage()
    {
        header("Location: /user/login"); // redirect to login page
    }
}