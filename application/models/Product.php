<?php


namespace application\models;


use application\lib\Db;

class Product
{
    public static function getProductsListAdmin(){
        $db = Db::getConnection();

        $result = $db->query('SELECT * FROM products ORDER BY id DESC');

        $i = 0;
        $productList = array();
        while ($row = $result->fetch()) {
            $productList[$i]['id'] = $row['id'];
            $productList[$i]['name'] = $row['name'];
            $productList[$i]['categories_id'] = $row['categories_id'];
            $productList[$i]['description'] = $row['description'];
            $productList[$i]['price'] = $row['price'];
            $productList[$i]['create_date'] = $row['create_date'];
            $productList[$i]['update_date'] = $row['update_date'];
            $i++;
        }
        return $productList;
    }

    public static function createProduct($name,$description,$price)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO products (name, description, price, create_date, update_date) VALUES (:name, :description, :price, now(), now())';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, \PDO::PARAM_STR);
        $result->bindParam(':description', $description, \PDO::PARAM_STR);
        $result->bindParam(':price', $price, \PDO::PARAM_STR);

        return $result->execute();
    }

    public static function updateProductId($id,$name,$description,$price){
        $db = Db::getConnection();

        $sql = 'UPDATE products SET name = :name, description = :description, price = :price WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, \PDO::PARAM_INT);
        $result->bindParam(':name', $name, \PDO::PARAM_STR);
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

}