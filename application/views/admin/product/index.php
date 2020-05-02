
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
            <th scope="col">Category</th>
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
                <td><?= $product['cat_name'] ?></td>
                <td><?= $product['price'] ?></td>
                <td><?= $product['create_date'] ?></td>
                <td><?= $product['update_date'] ?></td>
                <td style="text-align: center;" class="delete">
                    <a style="color: darkred;font-size: 20px;font-weight: bold;" href="/admin/product/delete/<?= $product['id']; ?>" class="deleteF" data-id="">✘</a>
                </td>
                <td style="text-align: center;" class="update">
                    <a style=";color: green;font-size: 20px;font-weight: bold;" href="/admin/product/update/<?= $product['id']; ?>">↻</a>
                </td>
            </tr>

        <?php endforeach; ?>

        </tbody>
    </table>
    <div>
        <?php
        $pagination = new \application\components\Pagination('/admin/product/','products','5','5');

        $pagination->html();

        ?>
    </div>
</div>

