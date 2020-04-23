<?php


namespace application\controllers;


use application\base\AdminBaseController;
use application\base\AdminBase;


class AdminController extends AdminBaseController
{
    public function indexAction()
    {
        

        AdminBase::checkAdmin();

        $this->view->setTitle('Admin Main');
        $this->view->render('admin/dashboard/index');

        return true;
    }

}