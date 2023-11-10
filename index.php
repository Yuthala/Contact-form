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

// if ($mail->send()) {
// 	echo 'Письмо отправлено!';
//   } else {
// 	echo 'Ошибка: ' . $mail->ErrorInfo;
//   } 

// if( $mail->send() ){
// 	$answer = '1';
// } else {
// 	$answer = '0';
// 	echo 'Письмо не может быть отправлено. ';
// 	echo 'Ошибка: ' . $mail->ErrorInfo;
// }

// 	die( $answer );
$mail->send();

?>

<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Contact Form</title>
</head>
<body>
	<form action="" method="POST" id="contact">
		<p>
			<label for="name">Имя</label>
			<input type="text" name="name" id="name"><span></span>
		</p>
		<p>
			<label for="subject">Тема</label>
			<input type="text" name="subject" id="subject"><span></span>
		</p>
		<p>
			<label for="email">Email</label>
			<input type="text" name="email" id="email"><span></span>
		</p>
		<p>
			<label for="body">Сообщение</label>
			<textarea name="body" cols="30" rows="10" id="body"></textarea><span></span>
		</p>
		<p>
			<input id="submit" type="submit" name="submit" value="Отправить"><span></span>
		</p>
	</form>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<script>
		$(function() {
			$('#contact').submit(function() {
				//валидация полей
				let errors = false;
				$(this).find('span').empty();

				$(this).find('input, textarea').each(function() {
					if($.trim($(this).val() ) == '') {
						errors = true;
						$(this).next().text( 'Не заполнено поле ' + $(this).prev().text() );
					}
				});

				if(!errors) {
					let data = $('#contact').serialize();
					$.ajax ({
						url: 'index.php',
						type: 'POST',
						data: data,
						success: function(res) {

						},
						error: function() {
							alert ('Ошибка!');
						}
 					});
					console.log(`Значение data ${data}`);
				}
				return false;

			});
		});
	</script>
</body>
</html>