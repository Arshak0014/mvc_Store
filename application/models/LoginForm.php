<?php


namespace application\models;

use application\components\Auth;
use application\components\Db;
use application\components\Validator;

class LoginForm
{

    public $email;
    public $password;
    public $rememberMe;

    public function __construct($post)
    {
        $this->email = $post['email'];
        $this->password = $post['password'];
        $this->rememberMe = $post['rememberMe'];
    }

    public static function loginValidate($email,$password,$err){
        if (!User::checkEmail($email)) {
            $err = 'Email is not correct';
        }
        if (!User::checkPassword($password)) {
            $err = 'Password must be min 6 chars';
        }
    }

    public static function checkRole(){
        $db = Db::getConnection();

        $sql = 'SELECT * FROM users';

        $result = $db->prepare($sql);
//        $result->bindParam(':role', $role, \PDO::PARAM_INT);

        $result->setFetchMode(\PDO::FETCH_ASSOC);
        $result->execute();

        $user = $result->fetch();


        return $user;
    }


    public function rules()
    {
        return [
            'required' => [
                'email' => $this->email,
                'password' => $this->password,

            ],
            'email' => [
                'email' => $this->email,
            ],
            'password' => [
                'password' => $this->password,

            ]
        ];
    }

//    public function validate()
//    {
//        $data = [];
//        $data['error'] = 'invalid email';
//        // if success validate make hash password
//        return $data;
//    }

    public function validate()
    {
        $validator = new Validator($this->rules());
        if (!empty($validator->validate())) {
            return $validator->validate();
        }

        return [];
    }

    public function login()
    {
        if ($this->validate() == []){
            User::checkUserData($this->email,$this->password);

            return true;
        }
        return false;
    }

//    public function getUser()
//    {
//        $user = User::findByEmail($this->email);
//        // before check passwords make hash password
//        $password = User::hashPassword($this->password);
//        if ($user['password'] == $password) {
//            return $user;
//        }
//        return false;
//    }

}