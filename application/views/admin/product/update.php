<?php //debug($data[2]); ?>
<form method="post" enctype="multipart/form-data">

    <h2>Update Product</h2>
    <select class="create_page_inputs" style="padding: 8px; width: 260px;" name="category">

        <?php foreach ($data[2] as $y): ?>
            <option value="<?= $y['id'] ?>" <?= $y['id'] == $data[1]['categories_id'] ? 'selected' : '' ?>><?= $y['name'] ?></option>
        <?php endforeach; ?>

    </select><br>

    <input class="create_page_inputs" style="padding: 8px; margin-top: 10px" type="text" name="product_name" value="<?=$data[1]['name'] ?>"/><br>

    <input class="create_page_inputs" type="file" name="image" value="<?=$data[1]['image'] ?>"><br>

    <select class="create_page_inputs" name="is_new">
        <option disabled selected value>Is new?</option>
        <option value="1">New</option>
        <option value="0">Old</option>
    </select><br>

    <textarea class="create_page_inputs" name="product_description" style="margin-top: 10px;padding: 8px;"
              placeholder="Write escription" cols="30" rows="10"><?=$data[1]['description'] ?></textarea><br>

    <input class="create_page_inputs" style="padding: 8px; margin-top: 10px" type="text" name="product_price" value="<?=$data[1]['price'] ?>"/><br>

    <div>
        <?php if (isset($data[0]) && is_array($data[0])): ?>
            <ul style="list-style: none;padding: 0;margin-top: 20px;">
                <?php foreach ($data[0] as $error): ?>
                    <li style="color: red;"> <?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>

    <button style="margin-top: 10px" class="btn btn-success" name="submit" type="submit">Update</button>

    <a style="margin-top: 10px; color: #ffffff" class="btn btn-info" href="/admin/product">TABLE</a>
</form>