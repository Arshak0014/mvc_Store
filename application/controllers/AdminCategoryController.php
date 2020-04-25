<?php


namespace application\controllers;


use application\base\AdminBaseController;
use application\base\AdminBase;
use application\components\Message;
use application\components\View;
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

        if (!empty($_POST) && isset($_POST['submit'])){
            $model = new Category($_POST);

            $validate = $model->validate();

            if (!empty($validate)) {
                $this->view->render('admin/category/create',$validate);
            }
            if ($model->createCategory()) {
                View::redirect('/admin/category');
            }
        }

        $this->view->setTitle('Admin Category Create');
        $this->view->render('admin/category/create');

        return true;

//        AdminBase::checkAdmin();
//        if (isset($_POST['submit'])) {
//            $name = $_POST['categoryName'];
//            if (!isset($name) || empty($name)) {
//                $this->errors[] = 'Create input';
//            }
//            if ($this->errors == false) {
//                Category::createCategory($name);
//                View::redirect('/admin/category');
//            }
//        }
//        $this->view->setTitle('Admin Category Create');
//        $this->view->render('admin/category/create',$this->errors);
//        return true;
    }

//        Category::updateCategoryId($id, $name);
//        View::redirect('/admin/category');

    public function updateAction($id){

        AdminBase::checkAdmin();

        $categoriesData = Category::getCategoryById($id);

        if (!empty($_POST) && isset($_POST['submit'])) {
            $model = new Category($_POST);

            $validate = $model->validate();
            if (!empty($validate)) {
                $this->view->render('admin/category/update',[$validate,$categoriesData]);
            }
            if ($model->updateCategoryId($categoriesData['id'])){
                View::redirect('/admin/category');
            }
        }

        $this->view->setTitle('Admin Category Update');
        $this->view->render('admin/category/update',['',$categoriesData]);

        return true;
    }

    public function deleteAction($id){
        AdminBase::checkAdmin();

        $categoriesData = Category::getCategoryById($id);

        if (isset($_POST['submit'])) {

            Category::deleteCategoryId($id);

            header("Location: /admin/category");
        }

        $this->view->setTitle('Admin Category Delete');
        $this->view->render('admin/category/delete',$categoriesData);

        return true;
    }

}