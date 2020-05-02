<?php


namespace application\controllers;


use application\base\Controller;

class ContactController extends Controller
{
    public function indexAction(){

        $this->view->setTitle('Contact Us');
        $this->view->render('contact/index');
    }

}