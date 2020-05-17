<?php
$products = \application\models\Product::ProductsListForCarousel();

?>
<hr>
<div class="container-fluid">

    <section>

        <div style="height: 330px;" id="carousel-example-multi" class="carousel slide carousel-multi-item v-2 product-carousel" data-ride="carousel">

            <!--Controls-->
            <div align="center" class="controls-top my-3 mt-4">
                <a style="background: #5cc6c3!important;" class="carousel_next_prev btn-floating btn-sm" href="#carousel-example-multi" data-slide="prev">⏪</a>
                <a style="background: #5cc6c3!important;" class="carousel_next_prev btn-floating btn-sm" href="#carousel-example-multi" data-slide="next">⏩</a>
            </div>
            <!--/.Controls-->

            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-multi" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-multi" data-slide-to="1"></li>
                <li data-target="#carousel-example-multi" data-slide-to="2"></li>
                <li data-target="#carousel-example-multi" data-slide-to="3"></li>
                <li data-target="#carousel-example-multi" data-slide-to="4"></li>
                <li data-target="#carousel-example-multi" data-slide-to="5"></li>
                <li data-target="#carousel-example-multi" data-slide-to="6"></li>
            </ol>
            <!--/.Indicators-->

            <div class="carousel-inner" role="listbox">

                <div class="carousel-item active mx-auto">
                    <div class="col-12 col-md-4 col-lg-2 mx-auto">
                        <div class="card_main card mb-2">
                            <div class="mb-1 view overlay">
                                <a href="/product/details/<?=$products[0]['id']?>">
                                    <img class="card_image_car card-img-top" src="../../../images/<?=$products[0]['image'] ?>" alt="Card image cap">
                                </a>
                                <a href="#!">
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                            <div class="card-body p-1">
                                <h5 style="color: black" class="mb-1 card-title font-weight-bold fuchsia-rose-text mb-0"><?=$products[0]['name'] ?></h5>
                                <p class="mb-3 mb-0"><b>Price </b><?=$products[0]['price'] ?> $</p>
                                <p ><a style="color: white; background: #ec971f; padding: 10px 30px;" class="" href="/product/details/<?= $products[0]['id']; ?>">Add to Cart</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="col-12 col-md-4 col-lg-2 mx-auto">
                        <div class="card_main card mb-2">
                            <div class="mb-1 view overlay">
                                <a href="/product/details/<?=$products['id']?>">
                                    <img class="card_image_car card-img-top" src="../../../images/<?=$products[6]['image'] ?>" alt="Card image cap">
                                </a>                                <a href="#!">
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                            <div class="card-body p-1">
                                <h5 style="color: black" class="mb-1 card-title font-weight-bold fuchsia-rose-text mb-0"><?=$products[6]['name'] ?></h5>
                                <p class="mb-3 mb-0"><b>Price </b><?=$products[6]['price'] ?> $</p>
                                <p ><a style="color: white; background: #ec971f; padding: 10px 30px;" class="" href="/product/details/<?= $products[6]['id']; ?>">Add to Cart</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="col-12 col-md-4 col-lg-2 mx-auto">
                        <div class="card_main card mb-2">
                            <div class="mb-1 view overlay">
                                <a href="/product/details/<?=$products['id']?>">
                                    <img class="card_image_car card-img-top" src="../../../images/<?=$products[1]['image'] ?>" alt="Card image cap">
                                </a>                                <a href="#!">
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                            <div class="card-body p-1">
                                <h5 style="color: black" class="mb-1 card-title font-weight-bold fuchsia-rose-text mb-0"><?=$products[1]['name'] ?></h5>
                                <p class="mb-3 mb-0"><b>Price </b><?=$products[1]['price'] ?> $</p>
                                <p ><a style="color: white; background: #ec971f; padding: 10px 30px;" class="" href="/product/details/<?= $products[1]['id']; ?>">Add to Cart</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="col-12 col-md-4 col-lg-2 mx-auto">
                        <div class="card_main card mb-2">
                            <div class="mb-1 view overlay">
                                <a href="/product/details/<?=$products['id']?>">
                                    <img class="card_image_car card-img-top" src="../../../images/<?=$products[2]['image'] ?>" alt="Card image cap">
                                </a>                                <a href="#!">
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                            <div class="card-body p-1">
                                <h5 style="color: black" class="mb-1 card-title font-weight-bold fuchsia-rose-text mb-0"><?=$products[2]['name'] ?></h5>
                                <p class="mb-3 mb-0"><b>Price </b><?=$products[2]['price'] ?> $</p>
                                <p ><a style="color: white; background: #ec971f; padding: 10px 30px;" class="" href="/product/details/<?= $products[2]['id']; ?>">Add to Cart</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="col-12 col-md-4 col-lg-2 mx-auto">
                        <div class="card_main card mb-2">
                            <div class="mb-1 view overlay">
                                <a href="/product/details/<?=$products['id']?>">
                                    <img class="card_image_car card-img-top" src="../../../images/<?=$products[3]['image'] ?>" alt="Card image cap">
                                </a>                                <a href="#!">
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                            <div class="card-body p-1">
                                <h5 style="color: black" class="mb-1 card-title font-weight-bold fuchsia-rose-text mb-0"><?=$products[3]['name'] ?></h5>
                                <p class="mb-3 mb-0"><b>Price </b><?=$products[3]['price'] ?> $</p>
                                <p ><a style="color: white; background: #ec971f; padding: 10px 30px;" class="" href="/product/details/<?= $products[3]['id']; ?>">Add to Cart</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="col-12 col-md-4 col-lg-2 mx-auto">
                        <div class="card_main card mb-2">
                            <div class="mb-1 view overlay">
                                <a href="/product/details/<?=$products['id']?>">
                                    <img class="card_image_car card-img-top" src="../../../images/<?=$products[4]['image'] ?>" alt="Card image cap">
                                </a>                                <a href="#!">
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                            <div class="card-body p-1">
                                <h5 style="color: black" class="mb-1 card-title font-weight-bold fuchsia-rose-text mb-0"><?=$products[4]['name'] ?></h5>
                                <p class="mb-3 mb-0"><b>Price </b><?=$products[4]['price'] ?> $</p>
                                <p ><a style="color: white; background: #ec971f; padding: 10px 30px;" class="" href="/product/details/<?= $products[4]['id']; ?>">Add to Cart</a></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="carousel-item">
                    <div class="col-12 col-md-4 col-lg-2 mx-auto">
                        <div class="card_main card mb-2">
                            <div class="mb-1 view overlay">
                                <a href="/product/details/<?=$products['id']?>">
                                    <img class="card_image_car card-img-top" src="../../../images/<?=$products[5]['image'] ?>" alt="Card image cap">
                                </a>                                <a href="#!">
                                    <div class="mask rgba-white-slight"></div>
                                </a>
                            </div>
                            <div class="card-body p-1">
                                <h5 style="color: black" class="mb-1 card-title font-weight-bold fuchsia-rose-text mb-0"><?=$products[5]['name'] ?></h5>
                                <p class="mb-3 mb-0"><b>Price </b><?=$products[5]['price'] ?> $</p>
                                <p ><a style="color: white; background: #ec971f; padding: 10px 30px;" class="" href="/product/details/<?= $products[5]['id']; ?>">Add to Cart</a></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>

</div>
<hr class="pt-5">

<script>
    $('.carousel.carousel-multi-item.v-2 .carousel-item').each(function(){
        var next = $(this).next();
        if (!next.length) {
            next = $(this).siblings(':first');
        }
        next.children(':first-child').clone().appendTo($(this));

        for (var i=0;i<3;i++) {
            next=next.next();
            if (!next.length) {
                next = $(this).siblings(':first');
            }
            next.children(':first-child').clone().appendTo($(this));
        }
    });
</script>