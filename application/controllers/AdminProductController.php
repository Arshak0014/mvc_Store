<?php


namespace application\controllers;


use application\base\AdminBase;
use application\base\AdminBaseController;
use application\models\Product;
use application\components\View;

class AdminProductController extends AdminBaseController
{
    public $errors;

    public function indexAction(){
        AdminBase::checkAdmin();

        $productsList = Product::getProductsListAdmin();



        $this->view->setTitle('Admin Products');
        $this->view->render('admin/product/index',$productsList);

        return true;
    }

    public function createAction(){
        AdminBase::checkAdmin();

        $dataCategories = Product::getCategoriesNameAndId();


        if (isset($_POST['submit'])) {

            $name = $_POST['productName'];
            $categories_id = $_POST['category'];
            $description = $_POST['productDescription'];
            $price = $_POST['productPrice'];


            if (!isset($name) || empty($name)) {
                $this->errors[] = 'Create name';
            }
            if (!isset($categories_id) || empty($categories_id)) {
                $this->errors[] = 'Select a category';
            }
            if (!isset($description) || empty($description)) {
                $this->errors[] = 'Create description';
            }
            if (!isset($price) || empty($price)) {
                $this->errors[] = 'Create price';
            }

            if ($this->errors == false) {
                Product::createProduct($name, $categories_id, $description,$price);

                View::redirect('/admin/product');
            }
        }
        $this->view->setTitle('Admin Product Create');
        $this->view->render('admin/product/create',[$this->errors,$dataCategories]);

        return true;
    }

    public function updateAction($id){

        AdminBase::checkAdmin();

        $dataCategories = Product::getCategoriesNameAndId();

        $productsData = Product::getProductById($id);

        if (isset($_POST['submit'])){
            $name = $_POST['productName'];
            $categories_id = $_POST['category'];
            $description = $_POST['productDescription'];
            $price = $_POST['productPrice'];

            if (!isset($name) || empty($name)) {
                $this->errors[] = 'Name input is empty';
            }
            if (!isset($categories_id) || empty($categories_id)) {
                $this->errors[] = 'Category input is empty';
            }
            if (!isset($description) || empty($description)) {
                $this->errors[] = 'Description input is empty';
            }
            if (!isset($price) || empty($price)) {
                $this->errors[] = 'Price input is empty';
            }
            if ($this->errors == false) {
                Product::updateProductId($id,$name, $categories_id,$description,$price);
                View::redirect('/admin/product');
            }
        }

        $this->view->setTitle('Admin Product Update');
        $this->view->render('admin/product/update',[$this->errors,$productsData,$dataCategories]);

        return true;
    }

    public function deleteAction($id){
        AdminBase::checkAdmin();

        $productsData = Product::getProductById($id);

        if (isset($_POST['submit'])) {

            Product::deleteProductId($id);

            header("Location: /admin/product");
        }


        $this->view->setTitle('Admin Product Delete');
        $this->view->render('admin/product/delete',$productsData);

        return true;


    }

}