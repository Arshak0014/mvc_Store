<?php


namespace application\models;


use application\components\Db;
use application\components\Pagination;
use application\components\Router;
use application\components\View;

class Order
{

    public static function OrdersList(){


        $db = Db::getConnection();
        $sql = "SELECT * FROM orders";
        $result = $db->query($sql);
        $result->setFetchMode(\PDO::FETCH_ASSOC);

        $i = 0;
        $orders = array();
        while ($row = $result->fetch()) {
            $orders[$i]['id'] = $row['id'];
            $orders[$i]['user_id'] = $row['user_id'];
            $orders[$i]['product_id'] = $row['product_id'];
            $orders[$i]['name'] = $row['name'];
            $orders[$i]['image'] = $row['image'];
            $orders[$i]['price'] = $row['price'];
            $orders[$i]['count'] = $row['count'];
            $orders[$i]['order_date'] = $row['order_date'];
            $i++;
        }
        return $orders;
    }

    public static function deleteOrderById($id)
    {
        $db = Db::getConnection();

        $sql = 'DELETE FROM orders WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, \PDO::PARAM_INT);
        return $result->execute();
    }

    public static function getOrderById($id){
        $db = Db::getConnection();

        $sql = 'SELECT * FROM orders WHERE id = :id';

        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, \PDO::PARAM_INT);

        $result->setFetchMode(\PDO::FETCH_ASSOC);
        $result->execute();

        return $result->fetch();
    }
}