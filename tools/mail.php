<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
require('../vendors/PHPMailer/src/PHPMailer.php');
require('../vendors/PHPMailer/src/Exception.php');
require('../vendors/PHPMailer/src/SMTP.php');
require('../functions.php');
$userEmail = myStrip($_POST['email']);
$userSubject = myStrip($_POST['subject']);
$userText = myStrip($_POST['text']);
$to = '';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;



//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Server settings
    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();                                            //Send using SMTP
    $mail->Host       = 'smtp.mail.ru';                     //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
    $mail->Username   = '';                     //SMTP username mail login
    $mail->Password   = '';                               //SMTP password mail password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->CharSet    = 'utf-8';
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('', 'Some name'); //your email and name
    $mail->addAddress("$userEmail", 'Joe User');     //Add a recipient

    if(!empty($_FILES['img']['name'])){
        $path = $_FILES['img']['tmp_name'];
        $rand = getRandom();
        $extension = pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION);
        $to = "../images/mails/$rand.$extension";
        move_uploaded_file($path, $to);
        $mail->addAttachment("$to", "photo.$extension");    //Optional name
    }

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = "$userSubject";
    $mail->Body    = "$userText";
    $mail->AltBody = 'Ваша почта не поддерживает html формат';

    $mail->send();
    echo 'Сообщение отправлено';
    if(!empty($_FILES['img']['name'])){
        unlink($to);
    }
} catch (Exception $e) {
    echo "Сообщение не отправлено: {$mail->ErrorInfo}";
}

