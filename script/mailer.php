<?php
$post = json_decode(file_get_contents('php://input'), true);


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './mailer/Exception.php';
require './mailer/PHPMailer.php';
require './mailer/SMTP.php';


$mail = new PHPMailer(true);

try {
    //Server settings
//    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
    $mail->isSMTP();
    $mail->Host = 'smtp.yandex.ru';                                 //SMTP почты
    $mail->SMTPAuth = true;
    $mail->Username = 'maksuchiha92@yandex.ru';                     //login
    $mail->Password = 'dbphivzcawxnnopz';                           //pass
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;                                              //порт почты
    $mail->CharSet = "utf-8";
    //Recipients
    $mail->setFrom('maksuchiha92@yandex.ru', 'sobos');              // от кого
    $mail->addAddress('sakusan@mail.ru');                           // кому

    //Content
    $mail->isHTML(true);
    $mail->Subject = 'Here is the subject';                         // тема сообщения
    $mail->Body = sprintf('email: %s, имя: %s, телефон: %s', $post['email'] ?? '', $post['name'] ?? '', $post['phone'] ?? '');

    $mail->send();
    echo json_encode(['nice' => 'ok']);
} catch (Exception $e) {
    echo json_encode(['bad' => 'not-ok']);
}