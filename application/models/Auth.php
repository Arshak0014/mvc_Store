<?php


namespace application\models;


use application\lib\Db;

class Auth
{

    public static function setCookie($user_id,$email){

            $generatePassword = User::randomPassword();
            $db = Db::getConnection();

            $sql = "UPDATE `users` SET cookie_key = '$generatePassword' WHERE id='$user_id'";
            $result = $db->prepare($sql);
            $result->execute();

            setcookie('email',$email,time()+60*60*7);
            setcookie('cookie_key',$generatePassword,time()+60*60*7);
    }

    public static function logout()
    {
        session_unset();
        session_destroy();
        header("Location: /"); // redirect to home page
    }

}