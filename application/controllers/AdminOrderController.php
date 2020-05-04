<?php


namespace application\controllers;


use application\base\AdminBase;
use application\base\AdminBaseController;
use application\components\View;
use application\models\Order;

class AdminOrderController extends AdminBaseController
{

    public function indexAction(){
        AdminBase::checkAdmin();

        $orders = Order::OrdersList();

        $this->view->setTitle('Orders');
        $this->view->render('admin/order/index',$orders);

        return true;
    }

    public function deleteAction($id){
        AdminBase::checkAdmin();

        $ordersData = Order::getOrderById($id);

        if (isset($_POST['submit'])) {

            Order::deleteOrderById($id);

            View::redirect('/admin/order');
        }

        $this->view->setTitle('Order Delete');
        $this->view->render('admin/order/delete',$ordersData);

        return true;
    }

}