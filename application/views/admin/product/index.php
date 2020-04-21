
<div>
    <div style="display: flex; justify-content: space-between">
        <h2>Products</h2>
        <a class="nav-link" href="/admin/product/create/">CREATE PRODUCT</a>
    </div>

    <table class="mb-4 table table-bordered table-dark" id="table_data">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Category id</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Create date</th>
            <th scope="col">Update date</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($data as $product): ?>
            <tr>
                <th scope="row"><?= $product['id'] ?></th>
                <td><?= $product['name'] ?></td>
                <td><?= $product['categories_id'] ?></td>
                <td><?= $product['description'] ?></td>
                <td><?= $product['price'] ?></td>
                <td><?= $product['create_date'] ?></td>
                <td><?= $product['update_date'] ?></td>
                <td style="text-align: center" class="delete"><a href="/admin/product/delete/<?= $product['id']; ?>" class="deleteF" data-id="">✘</a></td>
                <td style="text-align: center" class="update"><a href="/admin/product/update/<?= $product['id']; ?>">↻</a>
                </td>
            </tr>

        <?php endforeach; ?>

        </tbody>
    </table>
</div>

