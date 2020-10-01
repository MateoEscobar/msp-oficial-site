<head>
<link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
</head>
<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


function sendEmail($para_usuario,$asunto,$mensaje){
require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
$mail = new PHPMailer(true);
    try{
        //Server settings
        $mail->SMTPDebug = 0;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->CharSet = "UTF-8";
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'orlandis2014@gmail.com';                     // SMTP username
        $mail->Password   = 'Orlandis1';                               // SMTP password
        $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom("soporte@msp.com");
        $mail->addAddress($para_usuario);
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = "$asunto";
        $mail->AddEmbeddedImage('cabeza.png', 'logo_2u');

        $mail->Body= "<div style=';background:#0d1321; text-align:center;padding:20px;border-radius:10px 10px 0 0;color:white;'> <img src='cid:logo_2u'><br>
       <b>$mensaje</b>
        <header style='background:#000000;padding:10px;color:white;width:400px;margin:10px auto;text-align:center;'><p>Todos los derechos reservados msp 2020</p></header></div>
    ";
           $mail->send();
} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}
?>
