<?php
use application\components\Auth;
use application\components\View;

if (!Auth::isGuest()) {
    View::redirect('/userProfile');
}

?>


<div style="width: 100%">
    <div style="margin: 140px auto ;width: 310px;">
        <h1 style="margin-left: 25px;">Sign In</h1>


        <div class="agileits-top">
            <form action="#" method="post">
                <input type="email" name="email" id="email" placeholder="Email" class="textInput" value="<?php echo $data[1][0]; ?>">
                <input type="password" name="password" id="password" placeholder="Password" class="textInput" value="<?php echo $data[1][1]; ?>">
                <div style="margin: 0;">
                    <label class="anim">
                        <input style="margin: 0px 0px 0px 25px;display: inherit;" type="checkbox" name="remember" value="1" class="checkbox">
                        <span style="vertical-align: text-bottom;">Remember</span>
                    </label>
                    <div class="clear"> </div>
                </div>

                <?php if (isset($data[0]) && is_array($data[0])): ?>
                    <ul style="list-style: none;padding-left: 25px;">
                        <?php foreach ($data[0] as $error): ?>
                            <li style="color: red;"> <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <input style="width: 290px;" type="submit" name="submit" class="textInput btn-success submit_cl" value="Sign In">


                <b><a style="margin-left: 25px;" href="/account/register">Sign Up ?</a></b>
            </form>

        </div>
    </div>
</div>
<?php



?>