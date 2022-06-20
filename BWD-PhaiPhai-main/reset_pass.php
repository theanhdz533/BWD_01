<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
if($email == false){
  header('Location: logig.php');
}
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
    <script src="assets/js/input-reveal.js" defer></script>
</head>

<body>

    <div class="bg-img"></div>
    <div class="container">
        <a href="index.html" class="header-logo">cume</a>
        <div class="content">
            <div class="content_box">
                <h2>Time to rewind yes?</h2>
                <p>Enter the new password and retype it again below</p>
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
                <form action="reset_pass.php" method="POST">
                    <div class="content_box-input">
                        <label for="password">Password *</label>
                        <i class="fa-solid fa-eye input-1"></i>
                        <input type="password" class="input1" name="password" required>
                        <label for="password">Retype your password *</label>
                        <i class="fa-solid fa-eye input-2"></i>
                        <input type="password" class="input2" name="cpassword" required>
                        <button class="content_box-submit" name="change-password" type="submit">Finish</button>

                    </div>
                </form>

            </div>
        </div>
    </div>
</body>

</html>