<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require 'vendor/phpmailer/phpmailer/src/Exception.php';   
require 'vendor/phpmailer/phpmailer/src/PHPMailer.php';
require 'vendor/phpmailer/phpmailer/src/SMTP.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$descripcion = $_POST['descripcion'];
try {
    //Server settings
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = "193240@ids.upchiapas.edu.mx";                     //SMTP username
    $mail->Password   = "shunelly99";                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('193240@ids.upchiapas.edu.mx', 'Mailer');
    $mail->addAddress('193228@ids.upchiapas.edu.mx', 'User');     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Solicitar informacion';
    $mail->Body    = 'Nombre:' . $nombre . 
    '<br>Numero de telefono: '. $telefono . 
    '<br>Correo: ' . $correo .
    '<br>Descripcion: ' .
    '<br>'. $descripcion;
    // $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
    $mail->CharSet = 'UTF-8';

    $mail->send();
    echo '<script>
        alert("El mensaje fue enviado");
        </script>';
    //header("Location: http://localhost/index.html");
    exit;
} catch (Exception $e) {
    echo '<script>
        alert("El mensaje no fue enviado");
        </script>';
    //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    //header("Location: http://localhost/Proyecto/solicitarServicio.html");
}


?>