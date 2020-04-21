<?php

namespace application\controllers;


use application\core\Controller;
use application\core\View;
use application\lib\Db;
use application\models\User;



class AccountController extends Controller
{
    public $errors;

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

    public function registerAction()
    {
        $login = '';
        $email = '';
        $password = '';

        $result = false;

        if (isset($_POST['submit'])){
            $login = $_POST['login'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $this->errors = false;

            if (!User::checkName($login)){
                $this->errors[] = 'login not correct chars';
            }

            if (!User::checkEmail($email)){
                $this->errors[] = 'Email is not required';
            }

            if (!User::checkPassword($password)){
                $this->errors[] = 'Password mast be min 4 chars';
            }

            if (User::checkEmailExists($email)){
                $this->errors[] = 'this email already exists';
            }

            if (User::checkPasswordExists($password)){
                $this->errors[] = 'this password already exists';
            }

            if ($this->errors == false){
                $result = User::register($login, $email, $password);
            }

        }
        $this->view->setTitle('Sign up Page');
        $this->view->render('account/register',[$this->errors,[$login,$email,$password],$result]);

        return true;
    }

    public function cabinetAction()
    {
        $this->view->render('account/register');
    }

    public function logoutAction(){

        session_start();

        unset($_SESSION["user"]);

        header("location: /account/login");


        if(isset($_COOKIE['email']) and isset($_COOKIE['cookie_key'])):
            setcookie('email', '', time()-7000000);
            setcookie('cookie_key', '', time()-7000000);
        endif;

        header('location: /account/login');
    }

}

