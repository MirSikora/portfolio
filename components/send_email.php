<?php

session_start();

$ini = parse_ini_file('../app.ini');

if(isset($_POST)){
    $header = 'From:'.addslashes($_POST['email']);
    $header .= '\nMIME-Version: 1.0\n';
    $header .= 'Content-Type: text/html; charser="utf-8"\n';
    $adress = $ini['app_email'];
    $subject = 'Nová zpráva z portfolia';
    $sending = mb_send_mail($adress, $subject, addslashes($_POST['message']),$header);
        
    if($sending){
        unset($_POST);
        $message = 'Zpráva byla úspěšně odeslána.';        
    }else{
        $message = 'Zprávu se nepodařilo odeslat. Zkontrolujte si prosím email.';
    }
    $_SESSION['flash'] = $message;
    header("location: /");
}
