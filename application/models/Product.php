<?php


namespace application\models;


use application\components\Db;
use application\components\Validator;

class Product
{

    public $name;
    public $categories_id;
    public $description;
    public $price;

    public function __construct($post)
    {

        if (!empty($post['product_name'])){
            $this->name = $post['product_name'];
        }
        if (!empty($post['category'])){
            $this->categories_id = $post['category'];
        }
        if (!empty($post['product_description'])){
            $this->description = $post['product_description'];
        }
        if (!empty($post['product_price'])){
            $this->price = $post['product_price'];
        }
    }

    public function rules()
    {
        return [
            'required' => [
                'product_name' => $this->name,
                'categories_id' => $this->categories_id,
                'product_description' => $this->description,
                'product_price' => $this->price,
            ]
        ];
    }

    public function validate(){
        $validator = new Validator($this->rules());
        if (!empty($validator->validate())){
            return $validator->validate();
        }
        return [];
    }

    public static function getProductsListAdmin(){
        $db = Db::getConnection();

        $result = $db->query('SELECT products.*, categories.name AS cat_name FROM products 
        LEFT JOIN categories ON products.categories_id = categories.id ORDER BY id DESC');

        $i = 0;
        $productList = array();
        while ($row = $result->fetch()) {
            $productList[$i]['id'] = $row['id'];
            $productList[$i]['name'] = $row['name'];
            $productList[$i]['cat_name'] = $row['cat_name'];
            $productList[$i]['description'] = $row['description'];
            $productList[$i]['price'] = $row['price'];
            $productList[$i]['create_date'] = $row['create_date'];
            $productList[$i]['update_date'] = $row['update_date'];
            $i++;
        }
        return $productList;
    }

    public function createProduct()
    {
        if ($this->validate() == []){
            $create = Db::getConnection()->prepare("INSERT INTO products (name,categories_id,description,price, create_date, update_date) VALUES
                       ('$this->name','$this->categories_id','$this->description','$this->price', now(), now())");
            $create->execute();
            return true;
        }
        return false;

//        echo $name.'<br>';
//        echo $categories_id.'<br>';
//        echo $description.'<br>';
//        echo $price.'<br>';
//
//        $db = Db::getConnection();
//
//        $sql = 'INSERT INTO `products` (`name`, `categories_id`, `description`, `price`, `create_date`, `update_date`) VALUES
//            (:name, :categories_id, :description, :price, now(), now())';
//
//        $result = $db->prepare($sql);
//        $result->bindParam(':name', $name, \PDO::PARAM_STR);
//        $result->bindParam(':categories_id', $categories_id, \PDO::PARAM_INT);
//        $result->bindParam(':description', $description, \PDO::PARAM_STR);
//        $result->bindParam(':price', $price, \PDO::PARAM_INT);
//
//        return $result->execute();
    }

    public  function updateProductId($id){
        if ($this->validate() == []){
            $update = Db::getConnection()->prepare("UPDATE `products` SET `name` = '$this->name',`categories_id` = '$this->categories_id', `description` = '$this->description', `price` = '$this->price' WHERE `products`.`id` = '$id';");
            $update->execute();
            return true;
        }
        return false;
//        $db = Db::getConnection();
//
//        $sql = 'UPDATE products SET name = :name, categories_id = :categories_id, description = :description, price = :price WHERE id = :id';
//
//        $result = $db->prepare($sql);
//        $result->bindParam(':id', $id, \PDO::PARAM_INT);
//        $result->bindParam(':name', $name, \PDO::PARAM_STR);
//        $result->bindParam(':categories_id', $categories_id, \PDO::PARAM_INT);
//        $result->bindParam(':description', $description, \PDO::PARAM_STR);
//        $result->bindParam(':price', $price, \PDO::PARAM_INT);
//
//        return $result->execute();
    }

    public static function deleteProductId($id)
    {
        $db = Db::getConnection();

        $sql = 'DELETE FROM products WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, \PDO::PARAM_INT);
        return $result->execute();
    }

    public static function getProductById($id){
        $db = Db::getConnection();

        $sql = 'SELECT * FROM products WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, \PDO::PARAM_INT);

        $result->setFetchMode(\PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }

    public static function getCategoriesNameAndId(){
        $db = Db::getConnection();

        $result = $db->query('SELECT * FROM categories ORDER BY id DESC');

        $i = 0;
        $categoryList = array();
        while ($row = $result->fetch()) {
            $categoryList[$i]['id'] = $row['id'];
            $categoryList[$i]['name'] = $row['name'];
            $i++;
        }
        return $categoryList;
    }

}