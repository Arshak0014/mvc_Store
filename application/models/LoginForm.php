<?php


namespace application\models;

use application\components\Auth;
use application\components\Validator;

class LoginForm
{

    public $email;
    public $password;
//    public $rememberMe;

    public function __construct($post)
    {
        $this->email = $post['email'];
        $this->password = $post['password'];
//        $this->rememberMe = $post['rememberMe'];
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