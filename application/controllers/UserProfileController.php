<?php


namespace application\controllers;

use application\base\Controller;
use application\components\Db;
use application\components\View;
use application\models\Product;
use application\models\User;

class UserProfileController extends Controller
{
    public function indexAction()
    {
        $userId = User::checkLogged();

        $user = User::getUserById($userId);



        if (!empty($_POST) && isset($_POST['submit'])){


            $model = new User($_POST);

            $validate = $model->validate();

            if (!empty($validate)){
                $this->view->render('userProfile/index',[$validate,$user]);
            }

            $model->editUserData($user['id']);

        }

        $this->view->setTitle('User Profile');
        $this->view->render('userProfile/index',['',$user]);

        return true;
    }

    public function shippedOrdersAction(){

        $orders = Product::ordersByUserId();



        $this->view->render('userProfile/shippedOrders',$orders);
    }

}