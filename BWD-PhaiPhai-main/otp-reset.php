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
    <link rel="stylesheet" href="assets/css/otp.css">
    <link rel="stylesheet" href="assets/css/fontawesome-free-6.1.1-web/css/all.min.css">
</head>

<body>






    <div class="bg-img"></div>
    <div class="container">
        <a href="index.html" class="header-logo">cume</a>
        <div class="content">
            <div class="content_box">
                <h2>We sent you a code</h2>
                <p>Enter the confirmation code below</p>
                <div style="color:red;font-size: 1.6rem;text-align: center;padding-top: 20px;opacity: 0.7;">
                    <?php
                    if(count($errors) > 0){
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
                    ?>
                </div>
                <form action="otp-reset.php" method="POST">
                    <div class="content_box-input">
                        <input type="text" name="otp">
                        <button class="content_box-submit" name="check-reset-otp" type="submit">Submit</button>


                    </div>
                </form>

            </div>
        </div>
    </div>
</body>

</html>