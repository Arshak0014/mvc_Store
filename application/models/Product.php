<?php


namespace application\models;


use application\components\Db;

class Product
{
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

    public static function createProduct($name,$categories_id,$description,$price)
    {
        echo $name.'<br>';
        echo $categories_id.'<br>';
        echo $description.'<br>';
        echo $price.'<br>';

        $db = Db::getConnection();

        $sql = 'INSERT INTO `products` (`name`, `categories_id`, `description`, `price`, `create_date`, `update_date`) VALUES 
            (:name, :categories_id, :description, :price, now(), now())';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, \PDO::PARAM_STR);
        $result->bindParam(':categories_id', $categories_id, \PDO::PARAM_INT);
        $result->bindParam(':description', $description, \PDO::PARAM_STR);
        $result->bindParam(':price', $price, \PDO::PARAM_INT);


        return $result->execute();
    }

    public static function updateProductId($id,$name,$categories_id,$description,$price){
        $db = Db::getConnection();

        $sql = 'UPDATE products SET name = :name, categories_id = :categories_id, description = :description, price = :price WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, \PDO::PARAM_INT);
        $result->bindParam(':name', $name, \PDO::PARAM_STR);
        $result->bindParam(':categories_id', $categories_id, \PDO::PARAM_INT);
        $result->bindParam(':description', $description, \PDO::PARAM_STR);
        $result->bindParam(':price', $price, \PDO::PARAM_INT);

        return $result->execute();
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