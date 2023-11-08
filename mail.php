<?php
// ini_set('display_errors', 1);
// error_reporting(E_ALL);
// Файлы phpmailer
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
require 'phpmailer/Exception.php';
// Содержание полей формы которую отправил посетитель сайта
$location = trim($_POST['location']);
$price = trim($_POST['price']);
$date = trim($_POST['date']);
$name = trim($_POST['name']);
$tel = trim($_POST['tel']);
$email = trim($_POST['mail']);
$message = trim($_POST['message']);
// Вложенные в форму файлы будут обработаны ниже
//  $mail = new PHPMailer;  // Создаем экземпляр мейлера почты
$mail = new PHPMailer\PHPMailer\PHPMailer();
$mail->SMTPDebug = 1;  // Режим отладки
// try {
$mail->isSMTP();   // Включаем мейлер в режим SMTP
$mail->SMTPAuth = true; // Включаем SMTP аутентификацию
$mail->CharSet = 'utf-8';
// Настройки вашей почты (взять у провайдера)
$mail->Host = 'smtp.mail.ru';  // SMTP сервер
$mail->Username = 'finsaniwebsite@mail.ru'; // Ваш логин от почты с которой будут отправляться письма
$mail->Password = 'aPyUwD1GrSSe0dFxdbvwQ'; // Ваш пароль от почты с которой будут отправляться письма
$mail->SMTPSecure = 'ssl';  // Протокол шифрования SSL или TLS
$mail->Port = 465; // TCP порт для подключения
// Получатель письма
$mail->setFrom('finsaniwebsite@mail.ru'); // От кого будет уходить письмо?
    $mail->addAddress('finsaniwebsite@mail.ru'); // Кому будет уходить письмо 
//$mail->addAddress('ellen@example.com');               
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');
// Тело письма 
$body = "<b>Местонахождение объекта оценки: </b>" . $location . "<br>";
$body .= "<b>Цена оценки: </b>" .  $price . "<br>";
$body .= "<b>Предпочтительная дата оценки: </b>" . $date . "<br>";
$body .= "<b>Имя клиента: </b>" . $name . "<br>";
$body .= "<b>Контактный телефон: </b>" . $tel . "<br>";
$body .= "<b>E-mail: </b>" . $email . "<br>";
$body .= "<b>Дополнительная информация: </b>" . $message . "<br>";
// Прикрипление файлов к письму
if (!empty($_FILES['file']['name'][0])) {
    for ($ct = 0; $ct < count($_FILES['file']['tmp_name']); $ct++) {
$uploadfile = tempnam(sys_get_temp_dir(), sha1($_FILES['file']['name'][$ct]));
$filename = $_FILES['file']['name'][$ct];
if (move_uploaded_file($_FILES['file']['tmp_name'][$ct], $uploadfile)) {
$mail->addAttachment($uploadfile, $filename);
        } else {
$msg .= 'Неудалось прикрепить файл ' . $uploadfile;
        }
     }
    }
// Само письмо
$mail->isHTML(true);  // Задаём формат письма (HTML)
$mail->Subject = 'Заявка с сайта expert-otsenka24.ru';
$mail->Body    = $body;
if ($mail->send()) {
echo 'Письмо отправленно';
    } else {
echo "Сообщение не было отправлено. Неверно указаны настройки вашей почты";
    }
// } catch (Exception $e) {
//     echo "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
// }
