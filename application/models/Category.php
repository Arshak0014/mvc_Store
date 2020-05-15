<?php


namespace application\models;


use application\components\Db;
use application\components\Pagination;
use application\components\Router;
use application\components\Validator;
use application\components\View;

class Category
{

    public $name;

    public function __construct($post)
    {
        if (!empty($post['category_name'])){
            $this->name = $post['category_name'];

        }
    }

    public function rules()
    {
        return [
            'required' => [
                'category_name' => $this->name,
            ]
        ];
    }

    public static function getCategories(){
        $db = Db::getConnection();
        $result = $db->query("SELECT * FROM categories");

        $i = 0;
        $categories = array();
        while ($row = $result->fetch()) {
            $categories[$i]['id'] = $row['id'];
            $categories[$i]['name'] = $row['name'];
            $categories[$i]['create_date'] = $row['create_date'];
            $categories[$i]['update_date'] = $row['update_date'];
            $i++;
        }

        return $categories;
    }

    public function validate(){
        $validator = new Validator($this->rules());
        if (!empty($validator->validate())){
            return $validator->validate();
        }
        return [];
    }

    public static function getCategoriesListAdmin(){

        $db = Db::getConnection();

        $result = $db->query("SELECT * FROM categories ORDER BY id DESC");

        $i = 0;
        $categoryList = array();
        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $categoryList[$i]['create_date'] = $row['create_date'];
            $categoryList[$i]['update_date'] = $row['update_date'];
            $i++;
        }

        return $categoryList;
    }

    public function createCategory()
    {
        if ($this->validate() == []){
            $create = Db::getConnection()->prepare("INSERT INTO categories (name, create_date, update_date) VALUES
                       ('$this->name', now(), now())");
            $create->execute();
            return true;
        }
        return false;
    }


    public function updateCategoryById($id){

        if ($this->validate() == []){
            $update = Db::getConnection()->prepare("UPDATE `categories` SET `name` = '$this->name' WHERE `categories`.`id` = '$id';");
            $update->execute();
            return true;
        }
        return false;

    }

    public static function deleteCategoryById($id)
    {
        $db = Db::getConnection();

        $sql = 'DELETE FROM categories WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, \PDO::PARAM_INT);
        return $result->execute();
    }



    public static function getCategoryById($id){
        $db = Db::getConnection();

        $sql = 'SELECT * FROM categories WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, \PDO::PARAM_INT);

        $result->setFetchMode(\PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }

}