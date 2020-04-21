<head>
    <style>
        input{
            display: block;
            margin: 25px;
            padding: 10px 10px;
            width: 290px;
        }
        .submit_cl{
            margin: 10px 0 15px 25px;
            color: white;
            font-weight: bold;
            cursor: pointer;
        }
        .my_reg{
            margin: 25px 0px 20px 25px;
            font-size: large;
            color: green;
        }
    </style>
</head>

<div style="width: 100%">
    <div style="margin: 140px auto ;width: 310px;">


        <?php if($data[2]): ?>
            <p class="my_reg">Registered !!! :)</p>
            <b><a style="margin-left: 25px;" href="/account/login">Sign In</a></b>
        <?php else: ?>
        <h1 style="margin-left: 25px;">Sign Up</h1>

        <div class="agileits-top">

            <form action="#" method="post">
                <input type="text" name="login" placeholder="Login" value="<?php echo $data[1][0] ?>" >
                <input type="email" name="email" placeholder="Email" value="<?php echo $data[1][1] ?>" >
                <input type="password" name="password" placeholder="Password" value="<?php  $data[1][2] ?>" >

                <?php if (isset($data[0]) && is_array($data[0])): ?>
                    <ul style="list-style: none;padding-left: 25px;">
                        <?php foreach ($data[0] as $error): ?>
                            <li style="color: red"> * <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <input type="submit" name="submit" class="btn-success submit_cl" value="Sign Up">

                <b><a style="margin-left: 25px;" href="/account/login">Sign In ?</a></b>
            </form>
        </div>

      <?php   endif; ?>

    </div>
</div>