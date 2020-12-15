<?php
/*
    Very Important Note:
        1.This script Doesn't work with the college dorms network (MU-Cities).
        You Need to use a vpn.

        2.This script needs an email and password as constants in a file called config.php
        root/core/config.php

*/
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../vendor/autoload.php';
require_once '../config.php';

function reset_mailer($useremail, $token) {

    $mail = new PHPMailer(); // ture for debuging

    try{
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = EMAIL;                     // SMTP username
        $mail->Password   = PASSWORD;                               // SMTP password
        $mail->SMTPSecure = 'tls'; 
        $mail->Port       = 587;
        $mail->SMTPOptions = array(
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
                ]
            );

        //Recipients
        $mail->setFrom(EMAIL, 'User-System Mailer');
        $mail->addAddress($useremail);

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Password Reset';
        $mail->Body    = "<h2>To Reset Your Password Please Click This Link: </h2><a href='http://localhost/user-system/reset-pass.php?email=$useremail&token=$token'>Reset Password</a><br/><div><strong>Note: </strong>This Link Will Expire After <strong>15 Minutes</strong></div>";
        $mail->AltBody = "To Reset Your Password Please Click This Link: " . 'http://localhost/user-system/reset-pass.php?email=$useremail&token=$token';

        $mail->send();
        // echo 'Message Sent Successfully';
        return true;
    } catch (Exception $e) {
        // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return false;
    }
}