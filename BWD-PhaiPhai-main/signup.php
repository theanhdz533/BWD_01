<?php require_once "controllerUserData.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cume</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css">
    <link rel="stylesheet" href="assets/fonts/Bas/baseticalFont.css">
    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/css/animations.css">
    <link rel="stylesheet" href="assets/css/login.css">
    <link rel="stylesheet" href="assets/css/fontawesome-free-6.1.1-web/css/all.min.css">
    <script src="assets/js/login-register.js" defer></script>
    <style>
    body {
        overflow: hidden;
    }
    </style>
</head>

<body>
    <div class="bg-img"></div>
    <div class="container">
        <a href="index.html" class="header-logo">cume</a>
        <div class="content">
            <div class="content_left">
                <span>keep your face always toward
                    the sunshine and shadows will
                    fall behind you.
                </span>
                <span>- John Sulivan</span>
            </div>

            <div class="content_right-login">

                <form action="signup.php" method="post">
                    <div class="login_box non_reg">
                        <span class="login-text">sign up </span>
                        <span class="login-subtext">ready to explore a new world? Make one</span>
                        <span style="font-size:1.6rem;margin-bottom: 20px;color: red;opacity: 0.6;">
                            <?php
                        if(count($errors) == 1){
                            ?>
                            <div class="alert alert-danger text-center">
                                <?php
                                foreach($errors as $showerror){
                                    echo $showerror;
                                }
                                ?>
                            </div>
                            <?php
                        }
                        elseif(count($errors) > 1){
                            ?>
                            <div class="alert alert-danger">
                                <?php
                                foreach($errors as $showerror){
                                    ?>
                                <li><?php echo $showerror; ?></li>
                                <?php
                                }
                                ?>
                            </div>
                            <?php
                        }
                    ?>
                        </span>

                        <span class="login-input-text">email</span>
                        <input class="login-email" type="email" name="email">
                        <span class="login-input-text">password</span>
                        <input class="login-email" type="password" name="password">
                        <span class="login-input-text">retype your password</span>
                        <input class="login-email" type="password" name="cpassword">

                        <button class="login-btn" name="signup">sign up</button>

                        <div class="login_register">
                            <span>already have an account?</span>
                            <div class="login-switch" onclick="window.open('login.php','_self')">let's login</div>
                        </div>

                    </div>
                </form>

            </div>
        </div>
    </div>
</body>

</html>