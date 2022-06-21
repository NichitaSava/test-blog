<?php
   use PHPMailer\PHPMailer\PHPMailer;
   use PHPMailer\PHPMailer\Exception;

   require 'phpmailer/src/Exception.php';
   require 'phpmailer/src/PHPMailer.php';

   $mail = new PHPMailer(true);
   $mail->CharSet = 'UTF-8';
   $mail->setLanguage('es','phpmailer/language/');
   $mail->isHTML(true);

// Om kozo nuсьмо
$mail->setFrom('nichitarich@gmail.com','Clien');
// Кому отправить
$mail->addAddress('nichitarich@gmail.com');
// Tema nuсьма
$mail -> Subject = 'Привет! Это "client"';





// Teлo nuсьма
$body = '<h1>BCтречайте супер письl</h1>';

if(trim(!empty($_POST['name']))){
   $body.='<p><strong>Nombre:</strong>'.$_POST['name'].'</p>';
}
if(trim(!empty($_POST['email']))){
   $body.='<p><strong>E-mail:</strong>'.$_POST['email'].'</p>';
}
if(trim(!empty($_POST['age']))){
   $body.='<p><strong>Edat:</strong>'.$_POST['age'].'</p>';
}
if(trim(!empty($_POST['message']))){
   $body.='<p><strong>Mensage:</strong>'.$_POST['message'].'</p>';
}

$mail->Body=$body;

    // отправляем
    if(!$mail->send()){
    $message='Error';
    } else {
    $message='Los dados fueron enviados!';
    }
    $response=['message'=>$message];

    header('Content-type:application/json');
    echo json_encode($response);
?>