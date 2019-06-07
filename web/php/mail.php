<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
$mail = new PHPMailer(true);

try {
    
    $mail->SMTPDebug = 0;                                       
    $mail->isSMTP();                                            
    $mail->Host       = 'smtp.gmail.com'; 
    $mail->SMTPAuth   = true;                                   
    $mail->Username   = 'serviciotecnicojuanperez@gmail.com';                     
    $mail->Password   = 'Elmejorteam1234';                               
    $mail->SMTPSecure = 'tls';                                  
    $mail->Port       = 587;                                    

    
    $mail->setFrom('serviciotecnicojuanperez@gmail.com');
    $mail->addAddress('serviciotecnicojuanperez@gmail.com');    
   
    $mail->isHTML(true);                                  
    $mail->Subject = 'prueba';
    $mail->Body    = 'esto es una prueba';
   

    $mail->send();
    echo 'El mensaje se envio correctamente';
} catch (Exception $e) {
    echo 'ha ocurrido un error',$mail->ErorInfo;
}
?>