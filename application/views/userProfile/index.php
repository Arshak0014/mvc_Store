<?php
use application\components\Auth;
if (Auth::isGuest()){
    \application\components\View::redirect('/account/login/');
}
?>


<div style="padding-top: 105px">
    <hr>
    <div class="container bootstrap snippet">
        <div class="row">
            <div class="col-sm-10">
                <h1><?=$data[1]['first_name'] . ' ' . $data[1]['last_name']?></h1></div>
            <div class="col-sm-2">
                <a href="/users" class="pull-right"><img title="profile image" class="img-circle img-responsive" src="https://bootdey.com/img/Content/avatar/avatar1.png"></a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <!--left col-->

                <ul class="list-group">
                    <li class="list-group-item text-muted">Profile</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Joined</strong></span> 2.13.2014</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Last seen</strong></span> Yesterday</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Real name</strong></span> Joseph Doe</li>

                </ul>

                <div class="panel panel-default">
                    <div class="panel-heading">User E-mail <i class="fa fa-link fa-1x"></i></div>
                    <div class="panel-body"><b><?=$data[1]['email']?></b></div>
                </div>

                <ul class="list-group">
                    <li class="list-group-item text-muted">Activity <i class="fa fa-dashboard fa-1x"></i></li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Shares</strong></span> 125</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Likes</strong></span> 13</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>
                    <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li>
                </ul>

                <div class="panel panel-default">
                    <div class="panel-heading">User ID</div>
                    <div class="panel-body">
                        <b><?=$data[1]['id']?></b>
                    </div>
                </div>

            </div>
            <!--/col-3-->
            <div class="col-sm-9">

                <ul style="font-size: 20px;" class="nav nav-tabs" id="myTab">

                    <li style=""><a  class="user_prof_tabs" href="#settings" data-toggle="tab">Settings</a></li>
                    <li><a style="margin: 0;" class="user_prof_tabs" href="/userProfile/shippedOrders">Paid Orders</a></li>
                </ul>

                <div class="tab-content">


                    <div class="" id="">
                        <?php if (isset($_POST['submit']) && $data[0] == ''):?>
                        <b style="margin-left: 20px; color: green; font-size: 18px">Updated successful !!! :)</b>
                        <?php endif;?>

                        <form class="form" action="" method="post" id="registrationForm">
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="first_name">
                                        <h4>First name</h4></label>
                                    <input type="text" value="<?=$data[1]["first_name"];?>" class="form-control" name="first_name" id="first_name" placeholder="first name" title="enter your first name if any.">
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6">
                                    <label for="last_name">
                                        <h4>Last name</h4></label>
                                    <input type="text" value="<?=$data[1]["last_name"];?>" class="form-control" name="last_name" id="last_name" placeholder="last name" title="enter your last name if any.">
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-xs-6 pb-3">
                                    <label for="email">
                                        <h4>Email</h4></label>
                                    <input type="email" value="<?=$data[1]["email"];?>" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email.">
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-xs-6 pb-3">
                                    <label for="password">
                                        <h4>Password</h4></label>
                                    <input type="password" value="<?=$data[1]["password"];?>" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                                </div>
                            </div>
                            <div>
                            <?php if (isset($data[0]) && is_array($data[0])): ?>
                                <ul style="list-style: none;padding: 0; margin-top: 15px; margin-left: 15px; color: red">
                                    <?php foreach ($data[0] as $error): ?>
                                        <li class="warnings">  <?php echo $error; ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-12">
                                    <br>
                                    <button class="btn btn-lg btn-success" name="submit" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Save</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
                <!--/tab-pane-->
            </div>
            <!--/tab-content-->

        </div>
        <!--/col-9-->
    </div>
</div>