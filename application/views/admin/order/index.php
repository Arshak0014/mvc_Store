
<div>

    <div class="table-responsive">
        <table id="employee_data" class="table table-striped table-bordered ">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">User id</th>
                <th scope="col">Product id</th>
                <th scope="col">Count</th>
                <th scope="col">Order date</th>
                <th scope="col"></th>

            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($data as $order){
                echo '  
                               <tr>  
                                    <td>'.$order["id"].'</td>  
                                    <td>'.$order["user_id"].'</td>  
                                    <td>'.$order["product_id"].'</td>  
                                    <td>'.$order["count"].'</td>  
                                    <td>'.$order["order_date"].'</td>  
                                    <td style="text-align: center;" class="delete"><a href="/admin/order/delete/'.$order["id"].'">✘</a></td>  
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


