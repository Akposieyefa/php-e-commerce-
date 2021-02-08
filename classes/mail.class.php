<?php
    class Mail
    {
        public function mailCreate($email,$subject,$message)
        {
            try {
                require_once("PHPMailer/PHPMailerAutoload.php");
                $mail=new PHPMailer();
                $mail->CharSet = 'UTF-8';

                $mail->IsSMTP();
                $mail->Host       = 'smtp.gmail.com';

                $mail->SMTPSecure = 'tsl';
                $mail->Port       = 587;
                $mail->SMTPAuth   = true;
                $mail->From     = "App";
//dddd
                $mail->Username   = '****';   //email
                $mail->Password   = '***';  //password

                $mail->SetFrom('***'); //email
                $mail->AddReplyTo('***','no-reply');//emails
                $mail->Subject    = $subject;

                $mail->MsgHTML("
                    $message
                ");
                $mail->AddAddress($email , $message);
                if (!$mail->send()) {
                    $msg= "Mailer Error: " . $mail->ErrorInfo;
                }

            } catch (Exception $e) {
                return "Mailer Error: " . $e->getMessage();
            }
        }
    }
        
    