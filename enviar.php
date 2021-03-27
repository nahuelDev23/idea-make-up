<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require("./services/email/Exception.php");
require("./services/email/PHPMailer.php");
require("./services/email/SMTP.php");


 $nombre = $_POST['nombre'];
 $email = $_POST['email'];
 $sucursal = $_POST['sucursal'];
 $cursos = $_POST['cursos'];
 $formacion = $_POST['formacion'];
 $localidad = $_POST['localidad'];

    $destinatario ='nahuel.jotandjota@gmail.com';
    $msg = "
    ¡HOLA! mi nombre es {$nombre} mi email es {$email} quiero saber mas sobre {$cursos}
    mi formacion es: {$formacion}, soy de {$localidad}. 
    surcursal seleccionada: {$sucursal}";
    
    $mail = new PHPMailer(true);                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 0;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication TRUE
        $mail->Username = "inguzburguer2018@gmail.com";                 // SMTP username
        $mail->Password = 'vpcjywygtqdgjwwc';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted ssl:465  tls:587
        $mail->Port = 587;                                    // TCP port to connect to
    
        //Recipients
        $mail->setFrom("inguzburguer2018@gmail.com", "Admin de pedidos");
        $mail->addAddress("nahuel.jotandjota@gmail.com");                             // Add a recipient
        switch ($sucursal) {
            case 'Moron':
                $mail->addAddress("nahuel.jotandjota@gmail.com"); 
                break;
            case 'Caballito':
                $mail->addAddress("nahuel.dev.23@gmail.com"); 
                break;
        }
        
        
        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Consulta de cursos';
        $mail->Body = $msg;
        $mail->AltBody = 'Consulta cursos';
        $mail->send();
        echo "<script>window.location.replace('aceptado');</script>";
    } catch (Exception $e) {
        echo 'El mensaje no pudo ser enviado , disculpe las molestias, puede relizar su pedido llamando al 11 65 15 15 18. Muchas gracias: ';#$mail->ErrorInfo
    }
?>

                
