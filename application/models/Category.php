<?php


namespace application\models;


use application\lib\Db;

class Category
{

    public static function getCategoriesListAdmin(){
        $db = Db::getConnection();

        $result = $db->query('SELECT * FROM categories ORDER BY id DESC');

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

    public static function createCategory($name)
    {
        $db = Db::getConnection();

        $sql = 'INSERT INTO categories (name, create_date, update_date) VALUES (:name, now(), now())';

        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, \PDO::PARAM_STR);

        return $result->execute();
    }

    public static function deleteCategoryById($id)
    {
        $db = Db::getConnection();

        $sql = 'DELETE FROM categories WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, \PDO::PARAM_INT);
        return $result->execute();
    }

}