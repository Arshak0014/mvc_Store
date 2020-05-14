<?php
\application\components\Message::set_message('') ?>
<div style="display: flex">
    <div style="margin-right: 40px; padding-top: 55px">
        <?php include 'application/views/layouts/leftSideBar.php'?>
    </div>
    <div style="width: 100%;padding-top: 100px;">

        <div class=" padding-right">
            <div class="features_items">
                <h2 style="padding-bottom: 30px" class="title">Paid Orders</h2>

                <?php if (!empty($data)):?>

                    <table style="background: white;" class="table-bordered table-striped table">

                        <tr>
                            <th class="text-center">Image</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Count</th>
                            <th class="text-center">Price</th>
                            <th class="text-center">General</th>
                            <th class="text-center">Status</th>
                        </tr>
                        <?php foreach ($data as $product): ?>
                        <tr align="center" style="font-size: 16px; font-weight: bold;background: darkslategrey; color: white">
                            <td>
                                <a href="/product/details/<?php echo $product['id'];?>">
                                    <img style="width: 100px"  src="../../../images/<?=$product['image'] ?>" alt="">
                                </a>
                            </td>
                            <td>
                                <a style="color: white" href="/product/details/<?php echo $product['id'];?>">
                                    <?php echo $product['name'];?>
                                </a>
                            </td>
                            <td><?php echo $product['count'];?></td>
                            <td><?php echo $product['price'];?> $</td>
                            <td><?php echo $product['price'] * $product['count'];?> $
                                <div style="position: relative">
                                    <img class="paid_ic" src="../../../images/paid-rectangle-stamp-1.png" alt="">
                                </div>
                            </td>
                            <td>
                                <div style="position: relative">
                                <?php echo $product['status'] == '1'
                                    ? '<img class="process" src="../../../images/processing-png-1.png" alt="Processing">'
                                    : '<img class="process" src="../../../images/confirm-icon-png-2.png" alt="Confirm">';?>
                                </div>
                            </td>

                        </tr>
                        <?php endforeach; ?>
                    </table>
                <?php else:?>
                    <div>Sorry,you do`nt have any paid order.</div>
                <?php endif; ?>

            </div>
        </div>
    </div>


</div>
<?php include 'application/views/main/carousel.php'?>