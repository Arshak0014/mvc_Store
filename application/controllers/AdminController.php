<?php


namespace application\controllers;


use application\base\AdminBaseController;
use application\base\AdminBase;
use application\components\Db;
use application\components\View;
use application\models\Category;
use application\models\Order;


class AdminController extends AdminBaseController
{
    public function indexAction()
    {
        AdminBase::checkAdmin();


        $this->view->setTitle('Dashboard');
        $this->view->render('admin/dashboard/index');

        return true;
    }

    public function searchAction(){
        AdminBase::checkAdmin();

        $this->view->render('admin/dashboard/search');
    }

//    public function deleteAction($id){
//        AdminBase::checkAdmin();
//
//        $ordersData = Order::getOrderById($id);
//
//        if (isset($_POST['submit'])) {
//
//            Order::deleteOrderById($id);
//
//            View::redirect('/admin');
//        }
//
//        $this->view->setTitle('Admin Order Delete');
//        $this->view->render('admin/dashboard/delete',$ordersData);
//
//        return true;
//    }

}