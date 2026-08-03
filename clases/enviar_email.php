<?php

use PHPMailer\PHPMailer\{PHPMailer, SMTP, Exception};

require __DIR__ . '/../phpmailer/src/PHPMailer.php';
require __DIR__ . '/../phpmailer/src/SMTP.php';
require __DIR__ . '/../phpmailer/src/Exception.php';

$env = parse_ini_file(__DIR__ . '/../.env');

$mail = new PHPMailer(true);

try {
    // Configuración del servidor
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = $env['MAIL_USER'] ?? '';
    $mail->Password   = $env['MAIL_PASS'] ?? ''; 
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; 
    $mail->Port       = 587; 

    // Destinatarios
    $mail->setFrom($env['MAIL_USER'] ?? '', 'TIENDA DMV');
    $mail->addAddress('jovisu200@gmail.com', 'Joe User');

    // Contenido del correo
    $mail->isHTML(true);
    $mail->Subject = 'Detalle de su compra';

    $cuerpo = '<h4>Gracias por su compra</h4>';
    $cuerpo .= '<p>El ID de su compra es <b>' . $id_transaccion . '</b></p>';

    $mail->Body      = utf8_decode($cuerpo);
    $mail->AltBody = 'Le enviamos los detalles de su compra.';

    $mail->setLanguage('es', '../phpmailer/language/phpmailer.lang-es.php');

    $mail->send();
    echo 'Correo enviado correctamente';
} catch (Exception $e) {
    echo "Error al enviar el correo: {$mail->ErrorInfo}";
    exit; 
}