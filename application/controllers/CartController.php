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

    public function addAction(){
        Product::addProductToCart();
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
