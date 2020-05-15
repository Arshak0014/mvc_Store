
<div style="display: flex">
    <div style="padding-top: 46px;">
        <?php include 'application/views/layouts/leftSideBar.php'?>
    </div>
    <div class="product_cards">
        <?php foreach ($data as $product):?>

            <div id="counted" style="margin-bottom: 20px;margin-right: 5px" class="card">
                <a href="/product/details/<?=$product['id']; ?>">
                    <img style="width:248px;height: 248px" src="../../../images/<?=$product['image'] ?>" alt="">
                </a>
                <h1 style="font-size: 21px;" class="mt-2 mb-0"><?=$product['name'] ?></h1>
                <p class="price"><span style="color: darkred">Price</span> <?=$product['price'] ?> $</p>
                <div style="display: flex;justify-content: center;">
                    <b class="mr-2">QTY</b>
                    <input type="text" name="quantity" id="quantity<?=$product['id'];?>" class="quantity_input" value="1">
                </div>
                <input type="hidden" name="hidden_image" id="image<?=$product['id'];?>" value="<?=$product['image'] ?>">
                <input type="hidden" name="hidden_name" id="name<?=$product['id'];?>" value="<?=$product['name'] ?>">
                <input type="hidden" name="hidden_price" id="price<?=$product['id'];?>" value="<?=$product['price'] ?>">
                <input type="button" name="add_to_cart" id="<?=$product['id'];?>" class="btn btn-success mt-2 add_to_cart " value="Add To Cart">

            </div>


        <?php endforeach;?>

    </div>
</div>
<div align="right" style="margin: 13px 25px 33px 0px;">
    <?php
    $pagination = new \application\components\Pagination('/product/','products','12','12');

    $pagination->html();

    ?>
</div>
<?php include 'application/views/main/carousel.php'?>



