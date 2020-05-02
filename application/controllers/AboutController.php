<?php


namespace application\controllers;


use application\base\Controller;

class AboutController extends Controller
{
    public function indexAction(){

        $this->view->setTitle('About Us');
        $this->view->render('about/index');
    }

}