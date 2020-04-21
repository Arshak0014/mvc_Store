<?php


namespace application\controllers;


use application\core\AdminBaseController;
use application\core\AdminBase;
use application\core\View;
use application\models\Category;


class AdminCategoryController extends AdminBaseController
{
    public $errors = false;

    public function indexAction(){
        AdminBase::checkAdmin();

        $categoriesList = Category::getCategoriesListAdmin();


        $this->view->setTitle('Admin Category');
        $this->view->render('admin/category/index',$categoriesList);

        return true;
    }

    public function createAction(){
        AdminBase::checkAdmin();


        if (isset($_POST['submit'])) {

            $name = $_POST['categoryName'];

            if (!isset($name) || empty($name)) {
                $this->errors[] = 'Create input';
            }

            if ($this->errors == false) {
                Category::createCategory($name);

                View::redirect('/admin/category');
            }
        }
        $this->view->setTitle('Admin Category Create');
        $this->view->render('admin/category/create',$this->errors);

        return true;
    }

    public function updateAction($id){
        AdminBase::checkAdmin();

        var_dump($id);
        $this->view->setTitle('Admin Category Update');
        $this->view->render('admin/category/update');

        return true;
    }

    public function deleteAction($id){
        AdminBase::checkAdmin();
        //var_dump($id);


        $this->view->setTitle('Admin Category Delete');
        $this->view->render('admin/category/delete');

        return true;
    }

}