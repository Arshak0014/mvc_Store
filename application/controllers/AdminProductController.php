<?php


namespace application\controllers;


use application\base\AdminBase;
use application\base\AdminBaseController;
use application\models\Product;
use application\components\View;

class AdminProductController extends AdminBaseController
{

    public function indexAction(){
        AdminBase::checkAdmin();

        $productsList = Product::getProductsListAdmin();



        $this->view->setTitle('Products');
        $this->view->render('admin/product/index',$productsList);

        return true;
    }

    public function createAction(){
        AdminBase::checkAdmin();


        $dataCategories = Product::getCategoriesNameAndId();


        if (!empty($_POST) && isset($_POST['submit'])){


            $model = new Product($_POST);

            $validate = $model->validate();

            if (!empty($validate)){
                $this->view->render('admin/product/create',[$validate,$dataCategories]);
            }

            if ($model->createProduct()){
                View::redirect('/admin/product');
            }
        }

        $this->view->setTitle('Product Create');
        $this->view->render('admin/product/create',['',$dataCategories]);

        return true;

    }

    public function updateAction($id){

        AdminBase::checkAdmin();

        $dataCategories = Product::getCategoriesNameAndId();

        $productsData = Product::getProductById($id);


        if (!empty($_POST) && isset($_POST['submit'])) {
            $model = new Product($_POST);

            $validate = $model->validate();
            if (!empty($validate)) {
                $this->view->render('admin/product/update',[$validate,$productsData,$dataCategories]);
            }
            if ($model->updateProductById($productsData['id'])){
                View::redirect('/admin/product');
            }
        }
        $this->view->setTitle('Product Update');
        $this->view->render('admin/product/update',['',$productsData,$dataCategories]);

        return true;
    }


    public function deleteAction($id){
        AdminBase::checkAdmin();

        $productsData = Product::getProductById($id);

        if (isset($_POST['submit'])) {

            Product::deleteProductById($id);

            header("Location: /admin/product");
        }


        $this->view->setTitle('Product Delete');
        $this->view->render('admin/product/delete',$productsData);

        return true;


    }

}