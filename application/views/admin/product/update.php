<form method="post">

    <h2>Update Product</h2>

    <input style="padding: 8px" type="text" name="productName" value="<?=$data[1]['name'] ?>"/><br>
    <input style="padding: 8px; margin-top: 10px" type="text" name="productDescription" value="<?=$data[1]['description'] ?>"/><br>
    <input style="padding: 8px; margin-top: 10px" type="text" name="productPrice" value="<?=$data[1]['price'] ?>"/><br>

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