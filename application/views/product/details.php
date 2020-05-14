<?php //debug($_SESSION['products']); ?>
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
                    <div style="background: gainsboro;padding-bottom:20px;" class="section" >
                        <div>
<!--                            <div class="btn-minus"><span class="glyphicon glyphicon-minus"></span></div>-->
                            <?php if (!empty($_SESSION['products'])): ?>
                            <?php foreach ($_SESSION['products'] as $key => $val):?>

                            <?php if ($key == $data['id']):?>

                            <div><h6 class="titles title-attr"><span>Count</span></h6><?= $val ?></div>
<!--                            <div class="btn-plus"><span class="glyphicon glyphicon-plus"></span></div>-->
                            <?php else: ?>
                            <?php endif; ?>
                            <?php endforeach;?>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div style="background: gainsboro;" class="section">
                        <a class="btn btn-success add-to-cart adding_card" data-id="<?=$data['id'] ?>" href="#"><span style="margin-right:20px" class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>Add to Cart</a>
                    </div>
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