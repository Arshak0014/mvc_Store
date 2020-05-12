<?php


?>

<div style="display: flex">
    <div style="padding-top: 46px;">
        <?php include 'application/views/layouts/leftSideBar.php'?>
    </div>
    <div style="padding-top: 96px; margin-right: 20px; display: flex; justify-content: space-between; flex-wrap: wrap">


        <?php foreach ($data as $product):?>

            <?php $result = \application\models\Product::concidenceProductsSess($product['id']); ?>

            <div style="margin-bottom: 20px;margin-right: 5px;" class="card">
                <a href="/product/details/<?=$product['id']?>">
                    <img style="width:248px;height: 248px" src="../../../images/<?=$product['image'] ?>" alt="">
                </a>
                <h1 style="font-size: 23px"><?=$product['name'] ?></h1>
                <p class="price mb-3"><span style="color: darkred">Price</span> <?=$product['price'] ?> $</p>
                <span style="color: green" class="mb-2"><b><?php if (!empty($result[0])){
                            echo '+ QTY '.'<span id="toly" style="color: darkred">'.$result[0].'</span>';
                        }  else {echo '+ QTY '.'1';} ?></b></span>
                <a class="btn btn-success add-to-cart adding_card" data-id="<?=$product['id'] ?>" href="#"><span style="margin-right:20px" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Add to Cart</a>
            </div>
        <?php endforeach;?>

    </div>
</div>
<?php include 'application/views/main/carousel.php'?>