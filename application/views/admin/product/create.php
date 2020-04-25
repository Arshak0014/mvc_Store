
<form method="post">

    <h2>Create a product</h2>


    <select style="padding: 8px; width: 260px;" name="category">
        <option disabled selected>Select Category</option>
        <?php foreach($data[1] as $x):  ?>
            <option value="<?= $x['id']?>" ><?= $x['name']?></option>
        <?php endforeach; ?>
    </select><br>

    <input style="padding: 8px; margin-top: 10px" placeholder="Write Products" type="text" name="product_name"/><br>

    <textarea name="product_description" style="margin-top: 10px;padding: 8px;"
              placeholder="Write escription" cols="30" rows="10"></textarea><br>

    <input style="padding: 8px; margin-top: 10px" placeholder="Write Price" type="text" name="product_price"/><br>

    <div>
        <?php if (isset($data[0]) && is_array($data[0])): ?>
            <ul style="list-style: none;padding: 0;margin-top: 20px;">
                <?php foreach ($data[0] as $error): ?>
                    <li style="color: red;"> <?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
    <button style="margin-top: 10px" class="btn btn-success" name="submit" type="submit">CREATE</button>

    <a style="margin-top: 10px; color: #ffffff" class="btn btn-info" href="/admin/product/">TABLE</a>
</form>