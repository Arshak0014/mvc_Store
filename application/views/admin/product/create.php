<form method="post">

    <h2>Create a category</h2>

    <input style="padding: 8px" placeholder="Write Products" type="text" name="productName"/><br>
    <input style="padding: 8px; margin-top: 10px" placeholder="Write Description" type="text" name="productDescription"/><br>
    <input style="padding: 8px; margin-top: 10px" placeholder="Write Price" type="text" name="productPrice"/><br>

    <div>
        <?php if (isset($data) && is_array($data)): ?>
            <ul style="list-style: none;padding: 0;margin-top: 20px;">
                <?php foreach ($data as $error): ?>
                    <li style="color: red;">* <?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
    <button style="margin-top: 10px" class="btn btn-success" name="submit" type="submit">CREATE</button>

    <a style="margin-top: 10px; color: #ffffff" class="btn btn-info" href="/admin/product/">TABLE</a>
</form>