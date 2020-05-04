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

    public static function deleteFromCart($id){

        $cardProducts = Product::getProductFromSess();
        unset($cardProducts[$id]);
        $_SESSION['products'] = $cardProducts;

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
//        $page = Router::getPage();
//
//        $thisUri = $_SERVER['REQUEST_URI'];
//
//        if ($thisUri ==  "/admin/product"){
//            View::redirect("/admin/product/1");
//        }

//        $pagination = new Pagination('/admin/product','products','5','5');
//
//        $limit = $pagination->limit;
//        $res_per_page = $pagination->result_per_page;
//
//        $this_page_first_result = ($page - 1) * $res_per_page;

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
        var_dump($id);

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
        if (isset($_SESSION['products'])){
            return $_SESSION['products'];
        }
        return false;
    }

    public static function cartProductCount()
    {
        if (isset($_SESSION['products'])) {
            $count = 0;
            foreach ($_SESSION['products'] as $id => $quantity) {
                $count = $count + $quantity;
            }
            return $count;
        } else {
            return 0;
        }
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

    public static function addProductToCard($id)
    {
        $id = intval($id);
        $productsInCart = array();

        if (isset($_SESSION['products'])) {
            $productsInCart = $_SESSION['products'];
        }
        if (array_key_exists($id, $productsInCart)) {
            $productsInCart[$id]++;
        } else {
            $productsInCart[$id] = 1;
        }
        $_SESSION['products'] = $productsInCart;

        return Product::cartProductCount();
    }


    public static function orderProduct($user_id,$product_id,$count){


        $create = Db::getConnection()->prepare("INSERT INTO `orders` (`user_id`,`product_id`,`count`,`order_date`) VALUES
                       ('$user_id','$product_id','$count',now())");
        $create->execute();
        return true;

    }

}