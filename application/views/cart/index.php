<?php
//debug($data);
?>
<div style="display: flex">
    <div style="margin-right: 40px; padding-top: 55px">
        <?php include 'application/views/layouts/leftSideBar.php'?>
    </div>
    <div style="width: 100%;padding-top: 100px;">


        <div class=" padding-right">
            <div class="features_items">
                <h2 style="padding-bottom: 30px" class="title">Shopping Cart</h2>

                <?php if ($data[0]): ?>
                    <table style="background: white;" class="table-bordered table-striped table">
                        <tr>
                            <th class="text-center">Image</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Count</th>
                            <th class="text-center">Price</th>
                            <th class="text-center"></th>
                            <th class="text-center"></th>
                        </tr>
                        <?php foreach ($data[1] as $product): ?>
                            <tr align="center" style="font-size: 16px; font-weight: bold">
                                <td>
                                    <a href="/product/details/<?php echo $product['id'];?>">
                                        <img style="width: 100px"  src="../../../images/<?=$product['image'] ?>" alt="">
                                    </a>
                                </td>
                                <td>
                                    <a href="/product/details/<?php echo $product['id'];?>">
                                        <?php echo $product['name'];?>
                                    </a>
                                </td>
                                <td>

                                    <?=$data[0][$product['id']];?>

                                </td>
                                <td>
                                    <?php echo $product['price'].'$' .' x '. $data[0][$product['id']] .'<br>
                                    <b style="color: darkred">
                                        '. $product['price']*$data[0][$product['id']];?>$
                                    <b>
                                </td>
                                <td>
                                    <a style="color: darkred" href="/cart/delete/<?= $product['id'];?>">
                                        ✘
                                    </a>
                                </td>
                                <td>
                                    <a style="background: green;color: white; padding: 5px" href="/cart/order/<?= $product['id'];?>">
                                        BUY
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </table>
                    <div style="font-size: 16px" class="my-3">
                        <b>Total price -- <span style="color: #428bca; "><?= $data[2] * $data[0][$product['id']]?> $</span></b>
                    </div>
                <?php else: ?>
                    <p style="#428bca; font-size: 18px">Shopping cart is empty.</p>

                    <a class="btn btn-primary checkout" href="/product"><i class="fa fa-shopping-cart"></i>Products</a>
                <?php endif; ?>

            </div>
        </div>
    </div>


</div>
<script>



// document.getElementById('plus').onclick = function () {

// }
</script>
<?php include 'application/views/main/carousel.php'?>
