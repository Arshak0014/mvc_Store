<?php
use application\models\User;
?>

<div style="margin-top: 105px">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-sm-6">

                <div align="center" style="margin-bottom: 100px" class="card hovercard">

                    <div style="margin: 20px" class="avatar">
                        <img alt="" src="http://lorempixel.com/100/100/people/9/">
                    </div>
                    <div class="info">
                        <div class="title">
                            <a target="_blank" href="https://scripteden.com/">Script Eden</a>
                        </div>
                        <div class="desc">Passionate designer</div>
                        <div class="desc">Curious developer</div>
                        <div class="desc">Tech geek</div>
                    </div>
                    <div style="margin: 20px" class="bottom">
                        <a class="btn btn-primary btn-twitter btn-sm" href="https://twitter.com/webmaniac">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a class="btn btn-danger btn-sm" rel="publisher"
                           href="https://plus.google.com/+ahmshahnuralam">
                            <i class="fa fa-google-plus"></i>
                        </a>
                        <a class="btn btn-primary btn-sm" rel="publisher"
                           href="https://plus.google.com/shahnuralam">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a class="btn btn-warning btn-sm" rel="publisher" href="https://plus.google.com/shahnuralam">
                            <i class="fa fa-behance"></i>
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<?php
if (User::isGuest()){
    header('location: /account/login/');
}
?>