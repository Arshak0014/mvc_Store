<?php


namespace application\models;

use application\components\Validator;

class SignUpForm
{
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $confirm_password;

    public function __construct($post)
    {
        $this->first_name = $post['first_name'];
        $this->last_name = $post['last_name'];
        $this->email = $post['email'];
        $this->password = $post['password'];
        $this->confirm_password = $post['confirm_password'];
    }

    public function rules()
    {
        return [
            'required' => [
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
                'email' => $this->email,
                'password' => $this->password,
                'confirm_password' => $this->confirm_password,
            ],
            'name' => [
                'first_name' => $this->first_name,
                'last_name' => $this->last_name,
            ],
            'email' => [
                'email' => $this->email,
            ],
            'password' => [
                'password' => $this->password,

            ]
        ];
    }

    public function validate()
    {
        $validator = new Validator($this->rules());
        if (!empty($validator->validate())) {
            return $validator->validate();
        }
        if ($this->password != $this->confirm_password) {
            return ['password' => 'Password is incorrect'];
        }
        if (User::checkEmailExists($this->email)){
            return ['email' => 'Email already exist'];
        }
        return [];
    }

    public function register()
    {

        if ($this->validate() == []){

//            $password = User::hashPassword($this->password);
            User::register($this->first_name,$this->last_name,$this->email,$this->password);

            return true;
        }
        return false;
    }

}