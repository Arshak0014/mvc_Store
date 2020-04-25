<head>
    <style>
        input{
            display: block;
            margin: 10px 0px 10px 0px;
            padding: 10px 10px;
            width: 290px;
        }
        .submit_cl{
            margin: 10px 0 15px 0px;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
        .my_reg{
            margin: 25px 0px 20px 0px;
            color: green;
            font-size: 30px;
            text-align: center;
        }
        .warnings{
            color: red;
            background: peachpuff;
            padding: 3px 0px 3px 10px;
        }
        label{
            cursor: pointer;
        }

    </style>
</head>

<div style="width: 100%">
    <div style="margin: 140px auto ;width: 310px;">

        <?php if(\application\components\Message::get_message()): ?>
        <p class="my_reg"><?php echo \application\components\Message::get_message() ?></p>

        <b><a style="font-size: 20px;" href="/account/login">Sign In </a></b>

        <?php else: ?>
        <h1 style="margin-bottom: 25px">Sign Up</h1>

        <div class="agileits-top">

            <form action="#" method="post" style="width: 290px;">
                <label for="first_name">First name</label>
                <input type="text" id="first_name" name="first_name" placeholder="First name" value="<?php echo isset($data[1]) ? $data[1]['first_name'] : null ?>" >
                <label for="last_name">Last name</label>
                <input type="text" name="last_name" placeholder="Last name" value="<?php echo isset($data[1]) ? $data[1]['last_name'] : null ?>" >
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Email" value="<?php echo isset($data[1]) ? $data[1]['email'] : null ?>" >
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Password" value="<?php echo isset($data[1]) ? $data[1]['password'] : null ?>" >
                <label for="confirm_password">Confirm password</label>
                <input type="password" name="confirm_password" placeholder="Confirm password" value="<?php echo isset($data[1]) ? $data[1]['confirm_password'] : null ?>" >

                <?php if (isset($data[0]) && is_array($data[0])): ?>
                    <ul style="list-style: none;padding: 0; margin-top: 15px">
                        <?php foreach ($data[0] as $error): ?>
                            <li class="warnings">  <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <input style="margin-top: 15px" type="submit" name="submit" class="btn-success submit_cl" value="Sign Up">

                <b><a href="/account/login">Sign In ?</a></b>
            </form>
        </div>

      <?php   endif; ?>

    </div>
</div>