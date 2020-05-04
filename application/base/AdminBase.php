<?php

namespace application\base;

use application\components\View;
use application\models\User;


abstract class AdminBase
{

    public static function checkAdmin()
    {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        if ($user['role'] == 'admin') {
            return true;
        }else{
            View::errorCode('404');
        }
        die();
    }

}
