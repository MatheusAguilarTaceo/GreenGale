<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
// require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions

function send_mail($email,$name,  $token){
    $mail = new PHPMailer(true);
    
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;  
        $mail->CharSet = 'UTF-8';                    //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = $_ENV['SMTP_HOST'];                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = $_ENV['SMTP_USER'];                      //SMTP username
        $mail->Password   = $_ENV['SMTP_PASSWORD'];                                 //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom($_ENV['SMTP_USER'], 'Cadastro - GreenGale');
        $mail->addAddress($email);     //Add a recipient
        // $mail->addAddress('ellen@example.com');               //Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
        // $mail->addCC('cc@example.com');
        // $mail->addBCC('bcc@example.com');
    
        //Attachments
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Confirmação de cadastro';
        $mail->Body    = "Comfirme seu cadastro{$token}</b>";
        $mail->Body    = "Prezado {$name},<br>
        Estamos muito felizes em confirmar o seu cadastro em nosso site.
        Você está a um passo de aproveitar todos os recursos e benefícios que oferecemos.<br>
        Para ativar sua conta, por favor, clique no link de confirmação abaixo:<br>
        http://localhost:5000/?key=$token";
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';    
        $mail->send();
        ob_clean();
    } catch (Exception $e) {
        $status = false;
        // $msg = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        $msg = "Message could not be sent. Mailer Error:";
        echo json_encode(['status' => $status, 'msg' => $msg]);
    }
}