
<div style="display: flex">
    <div style="padding-top: 46px;">
        <?php include 'application/views/layouts/leftSideBar.php'?>
    </div>
    <div style="padding-top: 96px; margin-right: 20px; display: flex; justify-content: space-between; flex-wrap: wrap">
        <?php foreach ($data as $product):?>

            <?php
                $result = \application\models\Product::concidenceProductsSess($product['id']);
            ?>
            <div id="counted" style="margin-bottom: 20px;margin-right: 5px" class="card">
                <a href="/product/details/<?=$product['id']?>">
                    <img style="width:248px;height: 248px" src="../../../images/<?=$product['image'] ?>" alt="">
                </a>
                <h1 style="font-size: 21px;" class="mt-2 mb-0"><?=$product['name'] ?></h1>
                <p class="price"><span style="color: darkred">Price</span> <?=$product['price'] ?> $</p>

                <span style="color: green" class="mb-2"><b><?php if (!empty($result[0])){
                            echo '+ QTY '.'<span id="toly" style="color: darkred">'.$result[0].'</span>';
                        }  else {echo '+ QTY '.'1';} ?></b></span>

                <a id="yly" class="btn btn-success add-to-cart adding_card" data-id="<?=$product['id'] ?>" href="#">
                    <span style="margin-right:20px" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                    Add to Cart
                </a>
            </div>

        <?php endforeach;?>

    </div>
</div>
<div align="right" style="margin: 13px 17px 33px 0px;">
    <?php
    $pagination = new \application\components\Pagination('/product/','products','12','12');

    $pagination->html();

    ?>
</div>
<?php include 'application/views/main/carousel.php'?>
<script>


</script>

