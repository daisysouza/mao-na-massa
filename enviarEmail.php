<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

$email = $_POST['email'];
$name = $_POST ['name'];
// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();
    $mail->SMTPSecure = "tls";
    $mail->Mailer = "smtp"; // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'maonamassa.receita@gmail.com';                     // SMTP username
    $mail->Password   = 'comidadeSuce$$o';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('maonamassa.receita@gmail.com', 'Daisy');
    $mail->addAddress('maonamassa.receita@gmail.com', 'Daisy');     // Add a recipient
 


    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Cadastro no site';
    $mail->Body    = 'nome: '.$name.'</b> email:'.$email;
    

    $mail->send();
    echo 'Message has been sent';
    header('Location: index.html?env=block');
}   catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
   
}
