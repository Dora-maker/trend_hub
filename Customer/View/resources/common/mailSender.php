<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../View/resources/lib/PHPMailer/src/Exception.php';
require '../View/resources/lib/PHPMailer/src/PHPMailer.php';
require '../View/resources/lib/PHPMailer/src/SMTP.php';


class SendMail
{
    public function sendMail($toMail,$subject,$body,$embedImage = false)
    {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                   
            $mail->isSMTP();                                         
            $mail->Host       = 'smtp.gmail.com';                    
            $mail->SMTPAuth   = true;                                  
            $mail->Username   = 'trendhub.shop.mm@gmail.com';   //<< change   
            $mail->Password   = 'abomtelorheznvnx';          //<< change                     
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            
            $mail->Port       = 465;  
            
            if($embedImage){
                //path is from the point of view of resetPasswordController.php
                $imagePath = '../Mail/resetPasswordCompleteTemplate/images/image-1.gif';
                $mail->addEmbeddedImage($imagePath, 'img1');
            }
            
            //Recipients
            $mail->setFrom('trendhub.shop.mm@gmail.com',"TrendHUB"); //<<change
            $mail->addAddress($toMail);      

            //Content
            $mail->isHTML(true);                                  
            $mail->Subject = $subject;
            $mail->Body    = $body;
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
