
<form method="post" enctype="multipart/form-data">

    <h2>Create a product</h2>


    <select class="mt-3 p-2" style="width: 260px;" name="category">
        <option disabled selected>Select Category</option>
        <?php foreach($data[1] as $x):  ?>
            <option value="<?= $x['id']?>" ><?= $x['name']?></option>
        <?php endforeach; ?>
    </select><br>

    <input class="mt-3 p-2" placeholder="Write Products" type="text" name="product_name"/><br>

    <input class="mt-3 p-2" type="file" name="image"><br>

    <select class="mt-3 p-2" name="is_new">
        <option disabled selected value>Is new?</option>
        <option value="1">New</option>
        <option value="0">Old</option>
    </select><br>

    <textarea name="product_description" class="mt-3 p-2"
              placeholder="Write escription" cols="30" rows="10"></textarea><br>

    <input class="mt-3 p-2" placeholder="Write Price" type="text" name="product_price"/><br>

    <div>
        <?php if (isset($data[0]) && is_array($data[0])): ?>
            <ul style="list-style: none;padding: 0;margin-top: 20px;">
                <?php foreach ($data[0] as $error): ?>
                    <li style="color: red;"> <?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
    <button class="mt-3 btn btn-success" name="submit" type="submit">CREATE</button>

    <a style="color: #ffffff" class="mt-3 btn btn-info" href="/admin/product/">TABLE</a>
</form>
