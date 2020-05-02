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
        echo Product::addProductToCard($id);
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

        $productId = array_keys($product);

        $url = trim($_SERVER['REQUEST_URI'],'/');

        $arrUrl = explode('/', $url);

        foreach ($productId as $i){
            if ($i == $arrUrl[2]){
                $result .= $i;
            }
        }
        $productData = Product::getProductById($result);

        if ($userId){
            if (isset($_POST['submitShipConfirm'])){
                Product::orderProduct($user['id'],$result,$product[$id]);
                Message::set_message('Your order is confirmed :)');
                View::redirect('/cart');
            }

        }else{
            View::redirect('/account/login');
        }

        $this->view->render('cart/order',$productData);
    }
}
