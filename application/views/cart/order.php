<?php //debug($data); ?>
<div style="padding-top: 105px">
    <h2 class="p-3">Confirm Order</h2>

    <p style="font-size: 18px" class="p-3">Are you want confirm order <b style="color: green">"<?= $data['name'] ?>"</b>?</p>
    <p style="font-size: 18px" class="p-3">You are going to pay <b style="color: green"><?= $data['price'] ?> $</b></p>

    <form method="post" class="p-3">
        <input class="p-2" style="font-weight: bold;cursor: pointer;background: green;color: white" type="submit" name="submitShipConfirm" value="CONFIRM">
        <a style="margin-left: 20px;font-weight: bold;cursor: pointer"  href="/cart/">CANCEL</a>
    </form>
</div>