<?php


namespace application\controllers;

use application\core\Controller;
use application\models\User;

class CabinetController extends Controller
{
    public function indexAction()
    {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);

        $this->view->setTitle('User Profile');
        $this->view->render('cabinet/index');

        return true;
    }
}