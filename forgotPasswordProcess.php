<?php

require "connection.php";

require "SMTP.php";
require "PHPMailer.php";
require "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_GET["e"])){

    $email = $_GET["e"];

    $rs = Database::search("SELECT * FROM `donors` WHERE `email`='".$email."'");
    $n = $rs->num_rows;

    if($n == 1){

        $code = uniqid();

        Database::iud("UPDATE `donors` SET `verification_code`='".$code."' WHERE 
        `email`='".$email."'");

        $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'sadeepasrirohanasinghe2@gmail.com';
            $mail->Password = 'dgrrfxryvhzxscob';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('sadeepasrirohanasinghe2@gmail.com', 'The Hope Reset Password');
            $mail->addReplyTo('sadeepasrirohanasinghe2@gmail.com', 'The Hope Reset Password');
            $mail->addAddress($email);
            $mail->isHTML(true);
            $mail->Subject = 'The Hope Forgot Password Verification Code';
            $bodyContent = '<h1 style="color:black">Your Verification code is '.$code.'</h1>';
            $mail->Body    = $bodyContent;

            if (!$mail->send()) {
                echo 'Verification code sending failed';
            } else {
                echo 'Success';
            }

    }else{
        echo ("Invalid Email address");
    }

}

?>