<?php
$categories_list_left_side = \application\models\Category::getCategories();
//    debug($categories_list_left_side);
$products_list = \application\models\Product::getProducts();
//debug($products_list);
?>

<div style="
    display: flex;
    padding-top: 55px;
">
    <div style="" class="left_side_bar">
        <ul>
            <?php foreach ($categories_list_left_side as $x):?>
                <li class="m-2">
                    <a href="/category/<?=$x['id']?>/1" class="w3-bar-item w3-button"><?=$x['name']?></a>
                </li>
            <?php endforeach;?>
        </ul>
    </div>
</div>