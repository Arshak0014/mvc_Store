<?php


namespace application\components;


use application\models\User;

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
        setcookie('email','',time()-3600);
        setcookie('cookie_key','',time()-3600);
        session_unset();
        session_destroy();
        View::redirect('/account/login');
    }
}