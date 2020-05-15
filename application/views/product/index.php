
<div style="display: flex">
    <div style="padding-top: 46px;">
        <?php include 'application/views/layouts/leftSideBar.php'?>
    </div>
    <div style="padding-top: 96px; margin-right: 20px; display: flex; justify-content: space-between; flex-wrap: wrap">
        <?php foreach ($data as $product):?>
        <?php
            $result = \application\models\Product::concidenceProductsSess($product['id']);
        ?>
            <div id="counted" style="margin-bottom: 20px;margin-right: 5px" class="card">
                <img style="width:248px;height: 248px" src="../../../images/<?=$product['image'] ?>" alt="">
                <h1 style="font-size: 21px;" class="mt-2 mb-0"><?=$product['name'] ?></h1>
                <p class="price"><span style="color: darkred">Price</span> <?=$product['price'] ?> $</p>

                <input type="text" name="quantity" id="quantity<?=$product['id'];?>" class="form-control" value="1">
                <input type="hidden" name="hidden_image" id="image<?=$product['id'];?>" value="<?=$product['image'] ?>">
                <input type="hidden" name="hidden_name" id="name<?=$product['id'];?>" value="<?=$product['name'] ?>">
                <input type="hidden" name="hidden_price" id="price<?=$product['id'];?>" value="<?=$product['price'] ?>">
                <input type="button" name="add_to_cart" id="<?=$product['id'];?>" class="btn btn-success mt-2 add_to_cart " value="Add To Cart">
            </div>

        <?php endforeach;?>

    </div>
</div>
<div align="right" style="margin: 13px 17px 33px 0px;">
    <?php
    $pagination = new \application\components\Pagination('/product/','products','12','12');

    $pagination->html();

    ?>
</div>
<?php include 'application/views/main/carousel.php'?>
<script>
    // $(document).ready(function(){
    //     $(".add-to-cart").click(function () {
    //         var id = $(this).attr("data-id");
    //         $.post("/cart/add/"+id, {}, function (data) {
    //             $("#cart-count").html(data);
    //         });
    //         return false;
    //     });
    // });

    $(document).ready(function (data) {
        $(".add_to_cart").click(function () {
            var product_id = $(this).attr("id");
            var product_image = $('#image'+product_id).val();
            var product_name = $('#name'+product_id).val();
            var product_price = $('#price'+product_id).val();
            var product_quantity = $('#quantity'+product_id).val();
            var action = "add";
            console.log(product_name)

            if (product_quantity > 0){
                $.ajax({
                    url: "/cart/add/"+product_id,
                    method: "POST",
                    dataType: "json",
                    data:{
                        product_id:product_id,
                        product_image:product_image,
                        product_name:product_name,
                        product_price:product_price,
                        product_quantity:product_quantity,
                        action:action
                    },
                    success: function (data) {
                        $('#order_table').html(data.order_table);
                        $('.badge').text(data.cart_item);
                        alert('Product added');
                    }
                })
            }else{
                alert('Please enter number of quantity');
            }
        })

    })

</script>


