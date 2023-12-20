<?php

require "vendor/autoload.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;


$name = (string) htmlspecialchars($_POST["name"], ENT_QUOTES, 'UTF-8');
$email = (string) htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');
$subject = (string) htmlspecialchars($_POST["subject"], ENT_QUOTES, 'UTF-8');
$message = (string) htmlspecialchars($_POST["message"], ENT_QUOTES, 'UTF-8');

$mail = new PHPMailer(true);

$mail->SMTPDebug  = 2;

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->SMTPOptions = array(
    "ssl" => array(
        "verify_peer" => false,
        "verify_peer-name" => false,
        "allow_self_signed" => true
    )
);

$secret = "6LcgjQMnAAAAAAbg6cLluxAhjZrIo-tKIG29ILcZ";
$response = htmlspecialchars($_POST['g-recaptcha-response']);
$remoteip = $_SERVER['REMOTE_ADDR'];
$request = "https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$response&remoteip=$remoteip";

$get = file_get_contents($request);
$decode = json_decode($get, true);

try {
    if (empty($subject) || (empty($name) || (empty($email)) || empty($message))) {
        throw new Exception();
    }
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

    $mail->Host = "mail.atout-org.com";
    $mail->Port = 587;
    $mail->Username = "psi@atout-org.com";
    $mail->Password = "eQM2O2vgEWA9ZJKActwA7QzkT8k9)dtj";

    $mail->setFrom($email, $name);
    $mail->addAddress("psi@atout-org.com", "PSI-26");

    $mail->Subject = "Formulaire site PSI-26 : \"$subject\"";
    $mail->Body = $message;

    $mail->send();
    header('Location:sent');
} catch (Exception $e) {
    // http_response_code(500);
    header('Location:contact');
    // echo ("An error occurred while sending the message. Please verify all the fields and try again."); 

}
