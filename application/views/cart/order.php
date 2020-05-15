<?php //debug($data); ?>
<?php if(\application\components\Message::get_message()): ?>
<div class="paid_success" style="padding-top: 105px;height: 600px;">
    <b style="color: green;font-size: 24px"><?php echo \application\components\Message::get_message(); ?></b>
    -->
    <a href="/userProfile/shippedOrders">Paid Orders</a>
    <?php unset($_SESSION['message']) ?>
</div>
<?php else:?>
<div style="padding-top: 105px">
    <h2 class="p-3">Confirm Order</h2>

    <p style="font-size: 18px" class="p-3">Are you want confirm order <b style="color: green">"<?=$data[0]['product_name']; ?>"</b>?</p>
    <p style="font-size: 18px" class="p-3">You are going to pay <b style="color: green"><?=$data[0]['product_quantity'] * $data[0]['product_price']; ?>$</b></p>

    <form method="post" class="p-3">
        <input class="p-2" style="font-weight: bold;cursor: pointer;background: green;color: white" type="submit" name="submitShipConfirm" value="CONFIRM">
        <a style="margin-left: 20px;font-weight: bold;cursor: pointer"  href="/cart/">CANCEL</a>
    </form>
</div>
<?php endif;?>