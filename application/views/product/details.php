<?php //debug($data); ?>
<div style="display: flex;overflow: hidden;">
    <div style="margin-right: 40px; padding-top: 55px">
        <?php include 'application/views/layouts/leftSideBar.php'?>
    </div>
    <div style="padding: 100px 0">

        <div style="margin: 0 auto" class="container">
            <div style="margin: 0;padding: 0" class="row">
                <div style="margin-top: 25px;" class="col-xs-4  mr-5">
                    <img style="max-width:100%;" src="../../../images/<?=$data['image'] ?>" />
                </div>
                <div class="col-xs-5" style="border:0px solid gray">

                    <h2 style="font-weight: bold;"><?=$data['name'] ?></h2>

                    <h6 class="titles"><span>Product Price</span></h6>
                    <div>
                        <div style="font-size: 16px"><?=$data['price'] ?>$</div>
                    </div>

                    <div style="background: gainsboro" class="section">
                        <h6 class="titles title-attr" style="margin-top:15px;" ><span>Description</span></h6>
                        <div>
                            <?=$data['description'] ?>
                        </div>
                    </div>
                    <div style="background: gainsboro;padding-bottom:5px;" class="section">
                        <h6 class="titles title-attr"><span>Status</span></h6>
                        <div>
                        <?php if ($data['is_new'] == '1'):?>
                            <div class="status_active">NEW</div>
                        <?php else: ?>
                            <div class="status_passive">OLD</div>
                        <?php endif; ?>
                        </div>
                    </div>
                    <div style="background: gainsboro" class="section">
                        <h6 class="titles title-attr" style="margin-top:15px;" ><span>Adding Time</span></h6>
                        <div>
                            <?=$data['update_date'] ?>
                        </div>
                    </div>
                    <div class="mt-4 mb-4">
                        <h6 class="titles title-attr" style="margin-top:15px;" ><span>Count</span></h6>
                        <div  style="display: flex;">
                            <b class="mr-2">QTY</b>
                            <input type="text" name="quantity" id="quantity<?=$data['id'];?>" class="quantity_input" value="1">
                        </div>
                    </div>
                    <input type="hidden" name="hidden_image" id="image<?=$data['id'];?>" value="<?=$data['image'] ?>">
                    <input type="hidden" name="hidden_name" id="name<?=$data['id'];?>" value="<?=$data['name'] ?>">
                    <input type="hidden" name="hidden_price" id="price<?=$data['id'];?>" value="<?=$data['price'] ?>">
                    <input type="button" name="add_to_cart" id="<?=$data['id'];?>" class="btn btn-success mt-2 add_to_cart " value="Add To Cart">
                </div>
            </div>
        </div>

    </div>
</div>
<?php include 'application/views/main/carousel.php'?>

</div>


<script>
    $(document).ready(function(){
        //-- Click on detail
        $("ul.menu-items > li").on("click",function(){
            $("ul.menu-items > li").removeClass("active");
            $(this).addClass("active");
        })

        $(".attr,.attr2").on("click",function(){
            var clase = $(this).attr("class");

            $("." + clase).removeClass("active");
            $(this).addClass("active");
        })

        //-- Click on QUANTITY
        $(".btn-minus").on("click",function(){
            var now = $(".section > div > input").val();
            if ($.isNumeric(now)){
                if (parseInt(now) -1 > 0){ now--;}
                $(".section > div > input").val(now);
            }else{
                $(".section > div > input").val("1");
            }
        })
        $(".btn-plus").on("click",function(){
            var now = $(".section > div > input").val();
            if ($.isNumeric(now)){
                $(".section > div > input").val(parseInt(now)+1);
            }else{
                $(".section > div > input").val("1");
            }
        })
    })
</script>