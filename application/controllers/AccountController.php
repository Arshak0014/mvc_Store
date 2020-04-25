<?php

namespace application\controllers;


use application\base\Controller;
use application\components\Auth;
use application\components\Message;
use application\components\View;
use application\components\Db;
use application\models\LoginForm;
use application\models\SignUpForm;
use application\models\User;



class AccountController extends Controller
{

    public $errors = '';

    public function loginAction()
    {


        $email = false;
        $password = false;

        if (isset($_POST['submit'])) {

         $email = $_POST['email'];
            $password = $_POST['password'];

              if (!User::checkEmail($email)) {
                  $this->errors[] = 'Email is not correct';
              }
              if (!User::checkPassword($password)) {
                  $this->errors[] = 'Password must be min 6 chars';
              }

              $userId = User::checkUserData($email, $password);


            if ($userId == false) {

                $this->errors[] = 'Email or password is not correct';
            } else {

                $db = Db::getConnection();

                $sql = 'SELECT * FROM users';

                $result = $db->prepare($sql);
                $result->bindParam(':role', $role, \PDO::PARAM_STR);
                $result->execute();

                $user = $result->fetch();

                $roleId = $user["id"];


                if ($roleId == $userId){
                    User::auth($userId);
                    View::redirect('/admin/');

                }
                    User::auth($userId);
                    View::redirect('/cabinet/');

            }

        }

        $this->view->setTitle('Login Page');
        $this->view->render('account/login',[$this->errors,[$email,$password]]);

        return true;
    }

//    public function loginAction()
//    {
//        if (!empty($_POST) && isset($_POST['submit'])){
//            $model = new LoginForm($_POST);
//
//            var_dump($model);
//
//            $validate = $model->validate();
//
//            $arrayModel = get_object_vars($model);
//
//            if (!empty($validate)) {
//                $this->view->render('account/login',[$validate,$arrayModel]);
//            }
//            if ($model->login()) {
//                Auth::goHome();
//            }
//        }
//        $this->view->render('account/login',[]);
//
//        return true;
//    }


    public function registerAction()
    {
        $confirmRegister = '';

        if (!empty($_POST) && isset($_POST['submit'])){
            $model = new SignUpForm($_POST);

            $validate = $model->validate();

            $arrayModel = get_object_vars($model);

            if (!empty($validate)) {
                $this->view->render('account/register',[$validate,$arrayModel]);
            }
            if ($model->register()) {
                 Message::set_message('You are registered !!! :)');
            }
        }

        $this->view->setTitle('Sign up Page');
        $this->view->render('account/register');

        return true;
    }



    public function cabinetAction()
    {
        $this->view->render('account/register');
    }

    public function logoutAction(){

        session_start();

        unset($_SESSION["user"]);



        header('location: /account/login');
    }

}

