<?php


namespace application\controllers;


use application\core\AdminBaseController;
use application\core\AdminBase;


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