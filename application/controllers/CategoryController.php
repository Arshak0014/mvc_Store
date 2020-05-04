<?php


namespace application\controllers;


use application\base\Controller;

class CategoryController extends Controller
{
    public function indexAction(){

        $products_list = \application\models\Product::getProducts();

        $result = array();
        $url = trim($_SERVER['REQUEST_URI'],'/');

        $arrUrl = explode('/', $url);

        foreach ($products_list as $x){
            if ($arrUrl[1] == $x['categories_id']){
                array_push($result, $x);
            }
        }
        
        $this->view->render('category/index',$result);
    }
}