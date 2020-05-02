<?php
$recProducts = \application\models\Product::recommendedProducts();
?>

<div style="padding-top: 50px; display: flex; justify-content: space-between; flex-wrap: wrap">
    <?php foreach ($recProducts as $product):?>

        <div style="margin-bottom: 20px;margin-right: 5px;" class="card">
            <a href="/product/details/<?=$product['id']?>">
                <img style="width:248px;height: 248px" src="../../../images/<?=$product['image'] ?>" alt="">
            </a>
            <h1 style="font-size: 23px"><?=$product['name'] ?></h1>
            <p class="price mb-3"><span style="color: darkred">Price</span> <?=$product['price'] ?> $</p>
            <a class="btn btn-success add-to-cart adding_card" data-id="<?=$product['id'] ?>" href="#"><span style="margin-right:20px" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Add to Cart</a>

        </div>
    <?php endforeach;?>

</div>
