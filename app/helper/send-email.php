<?php


    function sendEmail ($address,$title,$message){
        $mail = new PHPMailer(true);

        try {
            //Server settings
            //$mail->SMTPDebug = 2;
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = settings('smtp_email');
            $mail->Password   = settings('smtp_password');
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;
            $mail->CharSet = 'UTF-8';

            //Recipients
            $mail->setFrom(settings('smtp_email'),settings('smtp_email_title'));
            $mail->addAddress($address);
            //Content
            $mail->isHTML(true);
            $mail->Subject = $title;
            $mail->Body    = $message;

            $mail->send();
        } catch (Exception $e) {
        }
    }