<?php


namespace application\controllers;


use application\base\AdminBaseController;
use application\base\AdminBase;


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


}