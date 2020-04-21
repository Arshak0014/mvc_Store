<form method="post">

    <h2>Update Categories</h2>

    <input style="padding: 8px" type="text" name="categoryName"/><br>
    <?php var_dump($data); ?>


    <div>
        <?php if (isset($data) && is_array($data)): ?>
            <ul style="list-style: none;padding: 0;margin-top: 20px;">
                <?php foreach ($data as $error): ?>
                    <li style="color: red;">* <?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
    <button style="margin-top: 10px" class="btn btn-success" name="submit" type="submit">Update</button>

    <a style="margin-top: 10px; color: #ffffff" class="btn btn-info" href="/admin/product/">TABLE</a>
</form>