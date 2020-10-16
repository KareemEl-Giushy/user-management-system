<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require '../vendor/autoload.php';

function reset_password($useremail, $token) {
    
    $mail = new PHPMailer();
    
    try{
        //Server settings
        // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = '';                     // SMTP username
        $mail->Password   = '';                               // SMTP password
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
        $mail->setFrom('', 'User-System Mailer');
        $mail->addAddress($useremail);
        
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Password Reset';
        $mail->Body    = "<h2>To Reset Your Password Please Click This Link: </h2><a href='http://localhost/user-system/reset-pass.php?email=$useremail&token=$token'>Reset Password</a>";
        $mail->AltBody = "To Reset Your Password Please Click This Link: ";
        
        $mail->send();
        // echo 'Message Sent Successfully';
        return true;
    } catch (Exception $e) {
        // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        return false;
    }
}