
<div>
    <div style="display: flex; justify-content: space-between">

        <a class="create nav-link" href="/admin/category/create">CREATE CATEGORY</a>
    </div>
    <div class="table-responsive">
        <table id="employee_data" class="table table-striped table-bordered ">
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
            <?php
            foreach ($data as $category){
                echo '  
                               <tr>  
                                    <td>'.$category["id"].'</td>  
                                    <td>'.$category["name"].'</td>  
                                    <td>'.$category["create_date"].'</td>  
                                    <td>'.$category["update_date"].'</td>  
                                    <td style="text-align: center;" class="delete"><a href="/admin/category/delete/'.$category["id"].'">✘</a></td>  
                                    <td style="text-align: center;" class="update"><a href="/admin/category/update/'.$category["id"].'">↻</a></td>  
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


