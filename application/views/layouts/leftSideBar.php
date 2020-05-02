<?php $categories_list_left_side = \application\models\Category::getCategories();

?>

<div style="
    display: flex;
    padding-top: 55px;
">
    <div style="" class="left_side_bar">
        <ul>
            <?php foreach ($categories_list_left_side as $x):?>
                <li class="m-2"><a href="" class="w3-bar-item w3-button"><?=$x['name']?></a></li>
            <?php endforeach;?>
        </ul>
    </div>
</div>