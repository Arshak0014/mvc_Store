<?php


namespace application\models;


use application\components\Db;
use application\components\Pagination;
use application\components\Router;
use application\components\Validator;
use application\components\View;

class Product
{

    public $name;
    public $categories_id;
    public $description;
    public $price;
    public $image;
    public $is_new;

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
        if (!empty($post['is_new'])){
            $this->is_new = $post['is_new'];
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

    public static function recommendedProducts(){
        $db = Db::getConnection();

        $result = $db->query("SELECT products.*, categories.name AS cat_name FROM products 
        LEFT JOIN categories ON products.categories_id = categories.id ORDER BY id DESC");

        $i = 0;
        $productList = array();
        while ($row = $result->fetch()) {
            $productList[$i]['id'] = $row['id'];
            $productList[$i]['name'] = $row['name'];
            $productList[$i]['cat_name'] = $row['cat_name'];
            $productList[$i]['description'] = $row['description'];
            $productList[$i]['price'] = $row['price'];
            $productList[$i]['image'] = $row['image'];
            $productList[$i]['is_new'] = $row['is_new'];
            $productList[$i]['create_date'] = $row['create_date'];
            $productList[$i]['update_date'] = $row['update_date'];
            $i++;
        }
        $recommended = array();

        foreach ($productList as $products){
            if ($products['is_new'] == '1'){
                array_push($recommended,$products);
                if (count($recommended) >= 9){
                    break;
                }
            }
        }

        return $recommended;
    }

    public static function getProducts(){

        $page = Router::getPage();


        $db = Db::getConnection();

        $result = $db->query("SELECT products.*, categories.name AS cat_name FROM products 
        LEFT JOIN categories ON products.categories_id = categories.id ORDER BY id DESC");

        $i = 0;
        $productList = array();
        while ($row = $result->fetch()) {
            $productList[$i]['id'] = $row['id'];
            $productList[$i]['name'] = $row['name'];
            $productList[$i]['categories_id'] = $row['categories_id'];
            $productList[$i]['description'] = $row['description'];
            $productList[$i]['price'] = $row['price'];
            $productList[$i]['image'] = $row['image'];
            $productList[$i]['is_new'] = $row['is_new'];
            $productList[$i]['create_date'] = $row['create_date'];
            $productList[$i]['update_date'] = $row['update_date'];
            $i++;
        }
        return $productList;


    }

    public static function ProductsListForCarousel(){
        $db = Db::getConnection();

        $result = $db->query("SELECT products.*, categories.name AS cat_name FROM products 
        LEFT JOIN categories ON products.categories_id = categories.id ORDER BY id DESC LiMIT 7");

        $i = 0;
        $productList = array();
        while ($row = $result->fetch()) {
            $productList[$i]['id'] = $row['id'];
            $productList[$i]['name'] = $row['name'];
            $productList[$i]['cat_name'] = $row['cat_name'];
            $productList[$i]['description'] = $row['description'];
            $productList[$i]['price'] = $row['price'];
            $productList[$i]['image'] = $row['image'];
            $productList[$i]['is_new'] = $row['is_new'];
            $productList[$i]['create_date'] = $row['create_date'];
            $productList[$i]['update_date'] = $row['update_date'];
            $i++;
        }
        return $productList;
    }

    public static function getProductsForCardById($arrayId)
    {
        $db = Db::getConnection();
        $productId = implode(',', $arrayId);
        $sql = "SELECT * FROM products WHERE id IN ($productId)";
        $result = $db->query($sql);
        $result->setFetchMode(\PDO::FETCH_ASSOC);

        $i = 0;
        $products = array();
        while ($row = $result->fetch()) {
            $products[$i]['id'] = $row['id'];
            $products[$i]['name'] = $row['name'];
            $products[$i]['price'] = $row['price'];
            $products[$i]['description'] = $row['description'];
            $products[$i]['image'] = $row['image'];
            $products[$i]['is_new'] = $row['is_new'];
            $i++;
        }
        return $products;
    }

    public static function addProductToCart(){
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

    public static function deleteFromCart($id){

        $cardProducts = Product::getProductFromSess();


        foreach ($cardProducts as $key => $value){
            if ($value['product_id'] == $id){
                unset($_SESSION['shopping_cart'][$key]);
            }
        }

    }

    public static function getProductsListByCategory(){
        $url = trim($_SERVER['REQUEST_URI'],'/');

        $arrUrl = explode('/', $url);

        $page = Router::getPage();

        $pagination = new Pagination('/category/'.$arrUrl[1].'/','products','9','9');

        $limit = $pagination->limit;
        $res_per_page = $pagination->result_per_page;
        $this_page_first_result = ($page - 1) * $res_per_page;

        $db = Db::getConnection();

        $result = $db->query("SELECT * FROM products WHERE categories_id = $arrUrl[1] ORDER BY id DESC LIMIT $this_page_first_result,$limit");

        $i = 0;
        $productList = array();
        while ($row = $result->fetch()) {
            $productList[$i]['id'] = $row['id'];
            $productList[$i]['name'] = $row['name'];
            $productList[$i]['categories_id'] = $row['categories_id'];
            $productList[$i]['description'] = $row['description'];
            $productList[$i]['price'] = $row['price'];
            $productList[$i]['image'] = $row['image'];
            $productList[$i]['is_new'] = $row['is_new'];
            $productList[$i]['create_date'] = $row['create_date'];
            $productList[$i]['update_date'] = $row['update_date'];
            $i++;
        }
        return $productList;
    }


    public static function ProductsList(){
        $page = Router::getPage();
        $thisUri = $_SERVER['REQUEST_URI'];


        if ($thisUri ==  "/product"){
            View::redirect("/product/1");
        }


        $pagination = new Pagination('/product','products','12','12');

        $limit = $pagination->limit;
        $res_per_page = $pagination->result_per_page;
        $this_page_first_result = ($page - 1) * $res_per_page;

        $db = Db::getConnection();

        $result = $db->query("SELECT products.*, categories.name AS cat_name FROM products 
        LEFT JOIN categories ON products.categories_id = categories.id ORDER BY id DESC LIMIT $this_page_first_result,$limit");

        $i = 0;
        $productList = array();
        while ($row = $result->fetch()) {
            $productList[$i]['id'] = $row['id'];
            $productList[$i]['name'] = $row['name'];
            $productList[$i]['cat_name'] = $row['cat_name'];
            $productList[$i]['description'] = $row['description'];
            $productList[$i]['price'] = $row['price'];
            $productList[$i]['image'] = $row['image'];
            $productList[$i]['is_new'] = $row['is_new'];
            $productList[$i]['create_date'] = $row['create_date'];
            $productList[$i]['update_date'] = $row['update_date'];
            $i++;
        }
        return $productList;
    }


    public static function getProductsListAdmin(){

        $db = Db::getConnection();

        $result = $db->query("SELECT products.*, categories.name AS cat_name FROM products 
        LEFT JOIN categories ON products.categories_id = categories.id ORDER BY id DESC");

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
        if(isset($_FILES)){

            $this->image = $_FILES['image']['name'];
            $fileTmpName = $_FILES['image']['tmp_name'];

            $dest = 'images/'.$this->image;
            move_uploaded_file($fileTmpName,$dest);
        }


        if ($this->validate() == []){
            $create = Db::getConnection()->prepare("INSERT INTO products (name,categories_id,description,price,image,is_new,create_date, update_date) VALUES
                       ('$this->name','$this->categories_id','$this->description','$this->price','$this->image','$this->is_new', now(), now())");
            $create->execute();
            return true;
        }
        return false;
    }

    public  function updateProductById($id){

        if(isset($_FILES)){

            $this->image = $_FILES['image']['name'];
            $fileTmpName = $_FILES['image']['tmp_name'];

            $dest = 'images/'.$this->image;
            move_uploaded_file($fileTmpName,$dest);

        }

        if ($this->validate() == []){
            $update = Db::getConnection()->prepare("UPDATE `products` SET `name` = '$this->name', `categories_id` = '$this->categories_id', `description` = '$this->description',`image` = '$this->image', `price` = '$this->price', `is_new` = '$this->is_new', `create_date` = now(), `update_date` = now() WHERE `products`.`id` = '$id';");
            $update->execute();
            return true;
        }
        return false;
    }

    public static function deleteProductById($id)
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

    public static function getProductFromSess(){
        if (isset($_SESSION['shopping_cart'])){
            return $_SESSION['shopping_cart'];
        }
        return false;
    }

//    public static function cartProductCount()
//    {
//        if (isset($_SESSION['products'])) {
//            $count = 0;
//            foreach ($_SESSION['products'] as $id => $quantity) {
//                $count = $count + $quantity;
//            }
//            return $count;
//        } else {
//            return 0;
//        }
//    }


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

//    public static function addProductToCard($id)
//    {
//        $id = intval($id);
//        $productsInCart = array();
//        if (isset($_SESSION['products'])) {
//            $productsInCart = $_SESSION['products'];
//            echo '<script>alert("Added in cart.")
//                window.location.reload();
//            </script>';
//        }
//        if (array_key_exists($id, $productsInCart)) {
//        } else {
//            $productsInCart[$id] = 1;
//        }
//        $_SESSION['products'] = $productsInCart;
//        return Product::cartProductCount();
//    }



    public static function orderProduct($user_id,$product_id,$count,$name,$image,$price){

        $create = Db::getConnection()->prepare("INSERT INTO `orders` (`user_id`,`product_id`,`name`,`image`,`price`,`count`,`order_date`,`status`) VALUES
                       ('$user_id','$product_id','$name','$image','$price','$count',now(),'1')");
        $create->execute();
        return true;

    }

    public static function ordersByUserId(){
        $userId = User::checkLogged();

        $db = Db::getConnection();

        $result = $db->query("SELECT * FROM orders WHERE user_id = '$userId' ORDER BY id DESC");

        $i = 0;
        $ordersList = array();
        while ($row = $result->fetch()) {
            $ordersList[$i]['id'] = $row['id'];
            $ordersList[$i]['user_id'] = $row['user_id'];
            $ordersList[$i]['product_id'] = $row['product_id'];
            $ordersList[$i]['name'] = $row['name'];
            $ordersList[$i]['image'] = $row['image'];
            $ordersList[$i]['price'] = $row['price'];
            $ordersList[$i]['count'] = $row['count'];
            $ordersList[$i]['order_date'] = $row['order_date'];
            $ordersList[$i]['status'] = $row['status'];
            $i++;
        }
        return $ordersList;
    }


}