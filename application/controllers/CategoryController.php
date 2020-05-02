<?php


namespace application\controllers;


use application\base\Controller;

class CategoryController extends Controller
{
    public function indexAction(){
        
        $this->view->render('product/index');
    }
}