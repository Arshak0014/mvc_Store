<?php


namespace application\controllers;

use application\base\Controller;
use application\components\Message;
use application\components\View;

use application\models\Product;
use application\models\User;

class CartController extends Controller
{
    public function indexAction(){



        $cartContent = false;
        $cartContent = Product::getProductFromSess();
        $products = null;
        $totalPrice = 0;

        if ($cartContent){
            $productsId = array_keys($cartContent);
            $products = Product::getProductsForCardById($productsId);
            foreach ($products as $product){
                $totalPrice += $product['price'];
            }
        }
        $this->view->render('cart/index',[$cartContent,$products,$totalPrice]);
    }


    public function addAction($id){

        if (isset($_POST['product_id'])){
            $order_table = '';

            if ($_POST['action'] == 'add'){
                if (isset($_SESSION['shopping_cart'])){
                    $is_available = 0;
                    foreach ($_SESSION['shopping_cart'] as $key => $value){
                        if ($_SESSION['shopping_cart'][$key]['product_id'] == $_POST['product_id']){
                            $is_available++;
                            $_SESSION['shopping_cart'][$key]['product_quantity']
                                = $_SESSION['shopping_cart'][$key]['product_quantity'] + $_POST['product_quantity'];
                        }
                    }
                    if ($is_available < 1){
                        $item_array = array(
                            'product_id' => $_POST['product_id'],
                            'product_image' => $_POST['product_image'],
                            'product_name' => $_POST['product_name'],
                            'product_price' => $_POST['product_price'],
                            'product_quantity' => $_POST['product_quantity']
                        );
                        $_SESSION['shopping_cart'][] = $item_array;
                    }
                }
                else{
                    $item_array = array(
                        'product_id' => $_POST['product_id'],
                        'product_image' => $_POST['product_image'],
                        'product_name' => $_POST['product_name'],
                        'product_price' => $_POST['product_price'],
                        'product_quantity' => $_POST['product_quantity']
                    );
                    $_SESSION['shopping_cart'][] = $item_array;
                }

                $output = array(
                    'order_table' => $order_table,
                    'cart_item' => count($_SESSION['shopping_cart'])

                );
                echo json_encode($output);


            }
        }
        return true;
    }

    public function countAction($id){
//        var_dump($_POST);
        return true;
    }

    public function deleteAction($id){

        Product::deleteFromCart($id);
        View::redirect('/cart');
    }

    public function orderAction($id){
        $result = '';
        $userId = User::checkLogged();
        $user = User::getUserById($userId);

        $product = Product::getProductFromSess();



        $productId = array();

        foreach ($product as $key => $value){
            if ($value['product_id'] == $id){
                array_push($productId,$value);
            }
        }

        $url = trim($_SERVER['REQUEST_URI'],'/');

        $arrUrl = explode('/', $url);

        foreach ($_SESSION['shopping_cart'] as $key => $value){

            if ($arrUrl[2] == $value['product_id']){
                $result .= $value['product_id'];
            }
        }


        if ($userId){
            if (isset($_POST['submitShipConfirm'])){
                Product::orderProduct($user['id'],$productId[0]['product_id'],$productId[0]['product_quantity'],$productId[0]['product_name'],$productId[0]['product_image'],$productId[0]['product_price']);
                foreach ($_SESSION['shopping_cart'] as $key => $value){
                    if ($result == $value['product_id']){
                        unset($_SESSION['shopping_cart'][$key]);
                    }

                }
                Message::set_message('Your order is confirmed :)');
            }

        }else{
            View::redirect('/account/login');
        }

        $this->view->render('cart/order',$productId);
    }
}
