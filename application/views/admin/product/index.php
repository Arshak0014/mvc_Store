
<div>
    <div style="display: flex; justify-content: space-between">

        <a class="create nav-link" href="/admin/product/create">CREATE PRODUCT</a>
    </div>
    <div class="table-responsive">
        <table id="employee_data" class="table table-striped table-bordered ">
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
        <?php
        foreach ($data as $product){
            echo '  
                               <tr>  
                                    <td>'.$product["id"].'</td>  
                                    <td>'.$product["name"].'</td>  
                                    <td>'.$product["cat_name"].'</td>  
                                    <td>'.$product["price"].'</td>  
                                    <td>'.$product["create_date"].'</td>  
                                    <td>'.$product["update_date"].'</td>  
                                    <td style="text-align: center;" class="delete"><a href="/admin/product/delete/'.$product["id"].'">✘</a></td>  
                                    <td style="text-align: center;" class="update"><a href="/admin/product/update/'.$product["id"].'">↻</a></td>  
                               </tr>  
                               ';
        }
        ?>

        </tbody>
    </table>
    </div>
</div>

<script>

    $(document).ready(function(){
        $('#employee_data').DataTable();
    });
</script>