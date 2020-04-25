<?php //debug($data); ?>
<form method="post">

    <h2>Update Product</h2>
    <select style="padding: 8px; width: 260px;" name="category">
<!--        --><?php
//            foreach ($data[2] as $y){
//                ?>
<!--                <option value="--><?//= $y['id']?><!--" --><?php //if ($y['id'] == $data[1]['categories_id']) { ?><!-- selected --><?php //} ?><!-- >--><?//= $y['name']?><!--</option>-->
<!--                --><?php //}
//            ?>
        <?php foreach ($data[2] as $y): ?>
            <option value="<?= $y['id'] ?>" <?= $y['id'] == $data[1]['categories_id'] ? 'selected' : '' ?>><?= $y['name'] ?></option>
        <?php endforeach; ?>


    </select><br>
    <input style="padding: 8px; margin-top: 10px" type="text" name="product_name" value="<?=$data[1]['name'] ?>"/><br>
    <textarea name="product_description" style="margin-top: 10px;padding: 8px;"
              placeholder="Write escription" cols="30" rows="10"><?=$data[1]['description'] ?></textarea><br>
    <input style="padding: 8px; margin-top: 10px" type="text" name="product_price" value="<?=$data[1]['price'] ?>"/><br>

    <div>
        <?php if (isset($data[0]) && is_array($data[0])): ?>
            <ul style="list-style: none;padding: 0;margin-top: 20px;">
                <?php foreach ($data[0] as $error): ?>
                    <li style="color: red;">* <?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>

    <button style="margin-top: 10px" class="btn btn-success" name="submit" type="submit">Update</button>

    <a style="margin-top: 10px; color: #ffffff" class="btn btn-info" href="/admin/product/">TABLE</a>
</form>