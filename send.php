
<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
 
// // Для более ранних версий PHPMailer
// //require_once '/PHPMailer/PHPMailerAutoload.php';
 
// $mail = new PHPMailer;
// $mail->CharSet = 'UTF-8';
 
// // Настройки SMTP
// $mail->isSMTP();
// $mail->SMTPAuth = true;
// $mail->SMTPDebug = 0;
 
// $mail->Host = 'ssl://smtp.mail.ru';
// $mail->Port = 465;
// $mail->Username = 'smtp_assist@mail.ru';
// $mail->Password = 'MQumct8jdD8mAkuywnfa';
 
// // От кого
// $mail->setFrom('smtp_assist@mail.ru', 'Limonero');		
 
// // Кому
// $mail->addAddress('dinavl@bk.ru', 'Админ');
 
// // Тема письма
// $mail->Subject = $subject;
 
// // Тело письма
// $mail->Subject = $_POST['subject'];
// $mail->Body = "Имя: {$_POST['name']}<br> Email: {$_POST['email']}<br> Сообщение: {$_POST['body']}";
 
// // Приложение
// // $mail->addAttachment(__DIR__ . '/image.jpg');
 
// $mail->send();
// 	use PHPMailer\PHPMailer\PHPMailer;
// 	use PHPMailer\PHPMailer\Exception;
	 
// 	require_once '/PHPMailer/src/Exception.php';
// 	require_once '/PHPMailer/src/PHPMailer.php';
// 	require_once '/PHPMailer/src/SMTP.php';

// // require 'PHPMailer/src/Exception.php';
// // require 'PHPMailer/src/PHPMailer.php';
// // require 'PHPMailer/src/SMTP.php';

$mail = new PHPMailer;

$mail->isSMTP();
$mail->Host = 'smtp.mail.ru';
$mail->SMTPAuth = true;
$mail->Username = 'smtp_assist@mail.ru';
$mail->Password = 'MQumct8jdD8mAkuywnfa';
$mail->SMTPSecure = 'ssl';
$mail->Port = '465';

$mail->CharSet = 'UTF-8';
$mail->From = 'smtp_assist@mail.ru';
$mail->FromName = 'Limonero';
$mail->addAddress('dinavl@bk.ru', 'Form');

$mail->isHTML(true);

$mail->Subject = $_POST['subject'];
$mail->Body = "Имя: {$_POST['name']}<br> Email: {$_POST['email']}<br> Сообщение: {$_POST['body']}";
$mail->AltBody =  "Имя: {$_POST['name']}\r\n Email: {$_POST['email']}\r\n Сообщение: {$_POST['body']}";
//$mail->SMTPDebug = 1;

$mail->send();

?>