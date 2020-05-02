<?php


namespace application\controllers;


use application\base\Controller;
use application\models\Product;

class ProductController extends Controller
{

    public function indexAction(){
        $products = Product::ProductsList();


        $this->view->setTitle('Product');

        $this->view->render('product/index',$products);
        return true;
    }

    public function detailsAction($id){

        $productsData = Product::getProductById($id);



        $this->view->setTitle('Product');
        $this->view->render('product/details',$productsData);
        return true;
    }

}