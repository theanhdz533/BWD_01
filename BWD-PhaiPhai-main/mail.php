<?php
require 'PHPMailer\src\PHPMailer.php';
require 'PHPMailer\src\SMTP.php';

require 'PHPMailer\src\Exception.php';

// require  'PHPMailer\PHPMailer\OAuthTokenProvider';
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Create an instance; passing `true` enables exceptions
function sendmail($email,$content){
    $mail = new PHPMailer(false);
    
    try {
        //Server settings
        $mail->SMTPDebug = 0;                  //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'nguyenngoclanh2003516@gmail.com';                     //SMTP username
        $mail->Password   = 'hvmbijwwphbxzeor';                               //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 587;                                   //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
       $mail->SMTPSecure="tls";
        //Recipients
        $mail->setFrom('nguyenngoclanh2003516@gmail.com', 'cumer');
        $mail->addAddress($email, "Khách hàng");     //Add a recipient  
        //Name is optional

        $mail->CharSet="UTF-8";
        //Content
        // $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'CODE REGISTER';
        $mail->Body    ='OTP: '. $content;
        $mail->AltBody="abc";
    

        $mail->send();
       
        
        
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
   

