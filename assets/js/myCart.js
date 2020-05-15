$(document).ready(function(){
     $(".add-to-cart").click(function () {
          var id = $(this).attr("data-id");
          $.post("/cart/add/"+id, {}, function (data) {
               $("#cart-count").html(data);
          });
          return false;
     });
});

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
                         alert('Product added.');
                    }
               })
          }else{
               alert('Please enter number of quantity');
          }
     })

})
