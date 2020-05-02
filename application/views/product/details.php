<?php //debug($data["id"]);?>
<div style="padding: 100px 0">

    <div style="margin: 0 auto" class="container">
        <div style="margin: 0;padding: 0" class="row">
            <div class="col-xs-4 item-photo mr-5">
                <img style="max-width:100%;" src="../../../images/<?=$data['image'] ?>" />
            </div>
            <div class="col-xs-5" style="border:0px solid gray">

                <h2 style="font-weight: bold;"><?=$data['name'] ?></h2>


                <h6 class="titles"><span>Product Price</span></h6>
                <div>
                    <div style="font-size: 16px"><?=$data['price'] ?>$</div>
                </div>

                <div class="section">
                    <h6 class="titles title-attr" style="margin-top:15px;" ><span>Description</span></h6>
                    <div>
                        <?=$data['description'] ?>
                    </div>
                </div>
                <div class="section" style="padding-bottom:5px;">
                    <h6 class="titles title-attr"><span>Status</span></h6>
                    <div>

                        <div class="attr2">NEW</div>
                        <div class="attr2">OLD</div>
                    </div>
                </div>
                <div class="section">
                    <h6 class="titles title-attr" style="margin-top:15px;" ><span>Adding Time</span></h6>
                    <div>
                        <?=$data['update_date'] ?>
                    </div>
                </div>
                <div class="section" style="padding-bottom:20px;">
                    <h6 class="titles title-attr"><span>Count</span></h6>
                    <div>
                        <div class="btn-minus"><span class="glyphicon glyphicon-minus"></span></div>
                        <input value="1" />
                        <div class="btn-plus"><span class="glyphicon glyphicon-plus"></span></div>
                    </div>
                </div>

                <div class="section" style="padding-bottom:20px;">
                    <a class="btn btn-success add-to-cart adding_card" data-id="<?=$data['id'] ?>" href="#"><span style="margin-right:20px" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Add to Cart</a>
                </div>
            </div>

            </div>
        </div>
    </div>
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