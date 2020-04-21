<?php

namespace application\core;

use application\models\User;


abstract class AdminBase
{

    public static function checkAdmin()
    {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        if ($user['role'] == 'admin') {
            return true;
        }


        die('Are you admin? Don`t joke');
    }

}
