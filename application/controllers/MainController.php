<?php

namespace application\controllers;

use application\base\Controller;


class MainController extends Controller
{

    public function indexAction()
    {
        $this->view->setTitle('Main page');
        $this->view->render('main/index',[]);
    }


}
