<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require '../vendor/autoload.php';

session_start();

$ini = parse_ini_file('../app.ini');

if(isset($_POST) && trim($_POST['email'])!='' && trim ($_POST['message'])!=''){

    $email = $_POST['email'];
    $message = $_POST['message'];
    $mail = new PHPMailer(true);

    try{

        //Server settings
        $mail->isSMTP();
        $mail->Host = $ini['SMTP_SERVER'];
        $mail->SMTPAuth = true;

        $mail->CharSet="UTF-8";
        $mail->Encoding="base64";

        $mail->Username = $ini['APP_EMAIL'];
        $mail->Password = $ini['APP_PASSWORD'];
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port = $ini['PORT'];
        

        //Recipients
        $mail->setFrom($ini['APP_EMAIL']);
        $mail->addAddress($ini['RECIPIENT']);
        
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Nová zpráva z portfolia :)';
        $mail->Body    = '<h3>Odesílatel: </h3>'. $email . '<br><h3>Zpráva: </h3>'. $message;

        $mail->send();
        $message = 'Zpráva byla úspěšně odeslána.'; 
        unset($_POST);

    } catch(Exception $e){

        $message = 'Zprávu se nepodařilo odeslat.\n'.$e;

    }
    
    $_SESSION['flash'] = $message;
    header("Location: /");
        
}else{

    header("Location: /");

}  
