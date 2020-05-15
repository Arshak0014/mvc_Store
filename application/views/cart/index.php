<div style="display: flex">
    <div style="margin-right: 40px; padding-top: 55px">
        <?php include 'application/views/layouts/leftSideBar.php'?>
    </div>
    <div style="width: 100%;padding-top: 100px;">


        <div class=" padding-right">
            <div class="features_items">
                <h2 style="padding-bottom: 30px" class="title">Shopping Cart</h2>

                <?php
                $total = 0;
                if (!empty($_SESSION['shopping_cart'])): ?>
                    <table style="background: white;" class="table-bordered table-striped table">
                        <tr>
                            <th class="text-center">Image</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Count</th>
                            <th class="text-center">Price</th>
                            <th class="text-center"></th>
                            <th class="text-center"></th>
                        </tr>
                        <?php

                        $products = $_SESSION['shopping_cart'];
                        $reversed_array = array_reverse($products);

                        foreach ($reversed_array as $key => $value): ?>
                            <tr align="center" style="font-size: 16px; font-weight: bold">
                                <td>
                                    <a href="/product/details/<?php echo $value['product_id'];?>">
                                        <img style="width: 100px"  src="../../../images/<?=$value['product_image'] ?>" alt="">
                                    </a>
                                </td>
                                <td>
                                    <a href="/product/details/<?php echo $value['product_id'];?>">
                                        <?php echo $value['product_name'];?>
                                    </a>
                                </td>
                                <td>
                                    <input type="text" disabled name="quantity" id="quantity<?=$value['id'];?>" class="quantity_input" value="<?=$value['product_quantity'];?>">

                                </td>
                                <td>
                                    <?php echo $value['product_price'].'$' .' x '. $value['product_quantity'] .'<br>
                                    <b style="color: darkred">
                                        '. $value['product_price']*$value['product_quantity'];?>$
                                    <b>
                                </td>
                                <td>
                                    <a style="color: darkred" href="/cart/delete/<?= $value['product_id'];?>">
                                        ✘
                                    </a>
                                </td>
                                <td>
                                    <a style="background: green;color: white; padding: 5px" href="/cart/order/<?= $value['product_id'];?>">
                                        BUY
                                    </a>
                                </td>
                            </tr>
                            <?php $total = $total + ($value['product_quantity'] * $value['product_price']);
                            ?>
                        <?php endforeach; ?>

                    </table>
                    <div style="font-size: 16px" class="my-3">
                        <b>Total price -- <span style="color: #428bca; "><?= $total; ?> $</span></b>
                    </div>
                <?php else: ?>
                    <p style="#428bca; font-size: 18px">Shopping cart is empty.</p>

                    <a class="btn btn-primary checkout" href="/product"><i class="fa fa-shopping-cart"></i>Products</a>
                <?php endif; ?>

            </div>
        </div>
    </div>


</div>

<?php include 'application/views/main/carousel.php'?>
