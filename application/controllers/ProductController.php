<?php


namespace application\controllers;


use application\base\Controller;
use application\models\Product;

class ProductController extends Controller
{

    public function indexAction(){

        $products = Product::ProductsList();

//        $result = [];
//        $id = [];
//        foreach ($products as $i){
//            array_push($id,$i['id']);
//        }
//
//        $sessId = [];
//        foreach ($_SESSION['products'] as $key => $val){
//            array_push($sessId,$key);
//        }
//        var_dump($sessId);
//        for ($i = 0; $i <count($id); $i++){
//            for ($j = 0; $j <count($sessId); $j++){
//                if ($sessId[$j] == $id[$i]){
//                    foreach ($_SESSION['products'] as $key => $val){
//                        array_push($result,$val);
//                    }
//                }
//            }
//        }
//        var_dump($result);


        $this->view->setTitle('Product');

        $this->view->render('product/index',$products);
        return true;
    }

    public function detailsAction($id){

        $productsData = Product::getProductById($id);



        $this->view->setTitle('Product Details');
        $this->view->render('product/details',$productsData);
        return true;
    }

}