<?php

namespace application\controllers;

use application\base\Controller;
use application\models\Category;
use application\models\Product;


class MainController extends Controller
{

    public function indexAction()
    {

        $categories = Category::getCategories();

        $this->view->setTitle('Main page');
        $this->view->render('main/index',$categories);
    }



}
