<?php


namespace application\controllers;


use application\core\AdminBase;
use application\core\AdminBaseController;
use application\models\Product;
use application\core\View;

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


        if (isset($_POST['submit'])) {

            $name = $_POST['productName'];
            $description = $_POST['productDescription'];
            $price = $_POST['productPrice'];

            if (!isset($name) || empty($name)) {
                $this->errors[] = 'Create name';
            }
            if (!isset($description) || empty($description)) {
                $this->errors[] = 'Create description';
            }
            if (!isset($price) || empty($price)) {
                $this->errors[] = 'Create price';
            }

            if ($this->errors == false) {
                Product::createProduct($name,$description,$price);

                View::redirect('/admin/product');
            }
        }
        $this->view->setTitle('Admin Product Create');
        $this->view->render('admin/product/create',$this->errors);

        return true;
    }

    public function updateAction($id){

        AdminBase::checkAdmin();

        $productsData = Product::getProductById($id);

        if (isset($_POST['submit'])){
            $name = $_POST['productName'];
            $description = $_POST['productDescription'];
            $price = $_POST['productPrice'];

            if (!isset($name) || empty($name)) {
                $this->errors[] = 'Name input is empty';
            }
            if (!isset($description) || empty($description)) {
                $this->errors[] = 'Description input is empty';
            }
            if (!isset($price) || empty($price)) {
                $this->errors[] = 'Price input is empty';
            }
            if ($this->errors == false) {
                Product::updateProductId($id,$name,$description,$price);
                View::redirect('/admin/product');
            }
        }

        $this->view->setTitle('Admin Product Update');
        $this->view->render('admin/product/update',[$this->errors,$productsData]);

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