<?php
require_once 'controllerUserData.php';
?>
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
            <form action="login.php" method="post">
                <div class="login_box non_reg">
                    <span class="login-text">login</span>
                    <span class="login-subtext">sign in with your account to continue</span>
                    <div style="font-size:1.6rem;color: red;opacity: 0.6;">
                        <?php
                        if (count($errors) > 0) {
                        ?>
                            <div>
                                <?php
                                foreach ($errors as $showerror) {
                                    echo $showerror;
                                }
                                ?>
                            </div>
                        <?php
                        }
                        ?>

                    </div>
                    <div style="font-size:1.6rem;color: green;opacity: 0.6;">
                         
                    <?php
                        if(isset($_GET['notificaion'])){
                            echo $_GET['notificaion'];
                        }
                    ?>
                        

                    </div>


                    <br>
                    <span class="login-input-text">email</span>
                    <input class="login-email" type="email" name="email">
                    <div class="login_pass">
                        <span class="login-input-text">password</span>
                        <a href="forgot.php" class="login-input-text login--forgot">forgot password?</a>
                    </div>
                    <input class="login-email" type="password" name="password">

                    <button onclick="" class="login-btn" name="login-user">sign in</button>

                    <div class="login_register">
                        <span>not registered?</span>
                        <div class="register-switch" onclick="window.open('signup.php','_self')">create an account</div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>