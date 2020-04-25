<?php


namespace application\components;


class Validator
{
    public $rules = [];

    public function __construct($rules)
    {
        $this->rules = $rules;
    }

    public function validate()
    {
        $rules = $this->rules;
        if (!empty($rules)) {
            $data = [];

            if (isset($rules['required'])) {
                $required = $rules['required'];
                foreach ($required as $key=>$value){
                    if ($value == '') {
                        $data[$key] = ucfirst(str_replace('_', ' ', $key).' is required');
                    }
                }
                if (!empty($data)) {
                    return $data;
                }
            }

            if (isset($rules['name'])) {
                $name = $rules['name'];

                foreach ($name as $key=>$value) {
                    if ($value == '') {
                        $data[$key] = ucfirst(str_replace('_', ' ', $key).' must be not empty');
                    }
                }

                if (!empty($data)) {
                    return $data;
                }

                foreach ($name as $key=>$value) {
                    if (strlen($value) < 2 || strlen($value) > 100) {
                        $data[$key] = ucfirst(str_replace('_', ' ', $key).' must be at least 2 chars');
                    }
                }
                if (!empty($data)) {
                    return $data;
                }
            }

            if (isset($rules['email'])) {
                $email = $rules['email'];
                foreach ($email as $key=>$value) {
                    if (!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i', $value)) {
                        $data[$key] = ucfirst($key.' invalid');
                    }
                }
                if (!empty($data)) {
                    return $data;
                }
            }

            if (isset($rules['password'])) {
                $password = $rules['password'];
                foreach ($password as $key=>$value) {
                    if (strlen($value) < 4 || strlen($value) > 20) {
                        $data[$key] = ucfirst(str_replace('_', ' ', $key).' must be at least 6 chars');
                    }
                }
                if (!empty($data)) {
                    return $data;
                }
            }
        }
        return [];
    }
}