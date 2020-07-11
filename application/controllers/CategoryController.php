<?php


namespace application\controllers;


use application\base\Controller;
use application\models\Product;

class CategoryController extends Controller
{
    public function indexAction(){

        $products = Product::getProductsListByCategory();
        
        $this->view->render('category/index',$products);
    }
}