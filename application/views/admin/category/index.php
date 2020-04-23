
<div>
    <div style="display: flex; justify-content: space-between">
        <h2>Categories</h2>
        <a class="nav-link" href="/admin/category/create/">CREATE CATEGORY</a>
    </div>
    
    <table class="mb-4 table table-bordered table-dark" id="table_data">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Name</th>
            <th scope="col">Create date</th>
            <th scope="col">Update date</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>

        <?php foreach ($data as $category): ?>
            <tr>
                <th scope="row"><?= $category['id'] ?></th>
                <td><?= $category['name'] ?></td>
                <td><?= $category['create_date'] ?></td>
                <td><?= $category['update_date'] ?></td>
                <td style="text-align: center" class="delete">
                    <a style="color: darkred;font-size: 20px;font-weight: bold;" href="/admin/category/delete/<?= $category['id']; ?>" class="deleteF" data-id="">✘</a>
                </td>
                <td style="text-align: center" class="update">
                    <a style="color: green;font-size: 20px;font-weight: bold;" href="/admin/category/update/<?= $category['id']; ?>">↻</a>
                </td>
            </tr>


        <?php endforeach; ?>

        </tbody>
    </table>
</div>

