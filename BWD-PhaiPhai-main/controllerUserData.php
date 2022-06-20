<?php
session_start();
require "connection.php";

$email = "";

$errors = array();

if (isset($_POST['signup'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);

    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    if ($password !== $cpassword) {
        $errors['password'] = "Confirm password not matched!";
    }
    $email_check = "SELECT * FROM aloalo WHERE email ='$email'";
    $res = mysqli_query($con, $email_check);
    if (mysqli_num_rows($res) > 0) {
        $errors['email'] = "Email that you have entered is already exist!";
    }
    if (count($errors) === 0) {
        $encode = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(99999, 1000000);
        $status = "novertified";
        $insert = "INSERT INTO aloalo (email,password,status,code)
        VALUES ('$email','$encode','$status','$code')";
        $data_check = mysqli_query($con, $insert);
        if ($data_check) {
            include 'mail.php';

            sendmail($email, $code);
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            header('location:otp.php');
            exit();

            //    else {
            //     $errors['otp-error']="Failed while send code !";
            //    }


        } else {
            $errors['otp-error'] = "Failed while inserting data into database";
        }
    }
}
if (isset($_POST['check'])) {

    $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
    $check_code = "SELECT * FROM aloalo WHERE code = $otp_code";
   

    $code_res = mysqli_query($con, $check_code);
    if (mysqli_num_rows($code_res) > 0) {
        
        $fetch_data = mysqli_fetch_assoc($code_res);
        $fetch_code = $fetch_data['code'];
        $email = $fetch_data['email'];
        $code = 0;  
        $status = 'verified';
        $update_otp = "UPDATE aloalo SET code = $code, status = '$status' WHERE code = $fetch_code";
        $update_res = mysqli_query($con, $update_otp);
        if ($update_res) {

            $_SESSION['email'] = $email;
            header('location: login.php?notificaion=Register succesful ! Lets login');
            exit();
        } else {
            $errors['otp-error'] = "Failed while updating code!";
        }
    } else {
        $errors['otp-error'] = "You've entered incorrect code!";
    }
}
//login
if (isset($_POST['login-user'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $check_email = "SELECT * FROM aloalo WHERE email = '$email'";
    $res = mysqli_query($con, $check_email);
    if (mysqli_num_rows($res) > 0) {
        $fetch = mysqli_fetch_assoc($res);
        $fetch_pass = $fetch['password'];
        if (password_verify($password, $fetch_pass)) {
            $_SESSION['email'] = $email;
            $status = $fetch['status'];
            if ($status == 'verified') {
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;
                header('location: home.php');
            } else {

                header('location:otp.php');
            }
        }
         else {
            $errors['email'] = "Incorrect email or password!";
        }
    } else {
        $errors['email'] = "It's look like you're not yet a member!";
    }
}
//forgot password
if(isset($_POST['check-email'])){
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $check_email = "SELECT * FROM aloalo WHERE email='$email'";
    $run_sql = mysqli_query($con, $check_email);
    if(mysqli_num_rows($run_sql) > 0){
        $code = rand(99999, 1000000);
        $insert_code = "UPDATE aloalo SET code = $code WHERE email = '$email'";
        $run_query =  mysqli_query($con, $insert_code);
        if($run_query){
            include 'mail.php';
            (sendmail($email,$code));
                $_SESSION['email'] = $email;
                header('location: otp-reset.php');
                exit();
           
        }else{
            $errors['db-error'] = "Something went wrong!";
        }
    }
    else{
        $errors['email'] = "This email address does not exist!";
    }
}
//if user click check reset otp button
if(isset($_POST['check-reset-otp'])){
    
    $otp_code = mysqli_real_escape_string($con, $_POST['otp']);
    $check_code = "SELECT * FROM aloalo WHERE code = $otp_code";
    $code_res = mysqli_query($con, $check_code);
    if(mysqli_num_rows($code_res) > 0){
        $fetch_data = mysqli_fetch_assoc($code_res);
        $email = $fetch_data['email'];
        $_SESSION['email'] = $email;
       
        header('location: reset_pass.php');
        exit();
    }else{
        $errors['otp-error'] = "You've entered incorrect code!";
    }
}
//if user click change password button
if(isset($_POST['change-password'])){
  
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $cpassword = mysqli_real_escape_string($con, $_POST['cpassword']);
    if($password !== $cpassword){
        $errors['password'] = "Confirm password not matched!";
    }else{
        $code = 0;
        $email = $_SESSION['email']; //getting this email using session
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $update_pass = "UPDATE aloalo SET code = $code, password = '$encpass' WHERE email = '$email'";
        $run_query = mysqli_query($con, $update_pass);
        if($run_query){
           
            header('Location: login.php?notificaion=Reset password successful! Lets login   ');
        }else{
            $errors['db-error'] = "Failed to change your password!";
        }
    }
}