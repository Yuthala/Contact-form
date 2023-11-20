
<?php


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
 

/***   Получаем данные из формы отправленные скриптом ***/
// перед присвоением в переменную, проверяем есть ли данные


// if (empty(trim($_POST["name"]))) {
//     echo "Заполните поле Имя";
// } elseif (!preg_match($pattern, $_POST["name"])) {
//     $pattern = '/^[а-яёЁ]+$/iu';
//     echo "Имя должно содержать только русские буквы";
// } elseif (strlen($_POST["name"]) < 3 || strlen($_POST["name"]) > 20) {
//     echo "Длина имени от 3 до 20 символов";
// } else {
//     if (!empty($_POST["name"])) $name = $_POST['name'];
// }
    
//     if (strlen($_POST["name"]) < 3) {
//         echo "Минимум 3 символа";
//     } elseif (strlen($_POST["name"]) > 20) {
//         echo "Максимум 20 символов";
//     } else {
//         //$pattern = '/^[а-яёЁ]+$/iu';
//         // if (!preg_match($pattern, $_POST["name"])) {
//         //     echo "Имя должно содержать только русские буквы";
//         // }
//     }
// } else {
//     if (!empty($_POST["name"])) $name = $_POST['name'];
// };

//валидация поля Имя
// $pattern = '/^[а-яёЁ]+$/iu';
// if (!empty($_POST["name"]) && //не пусто
//     !empty(trim($_POST["name"])) && //не заполнено только пробелами
//     strlen($_POST["name"]) > 3 && //больше 3 символов
//     strlen($_POST["name"]) < 20 && //меньше 20 символов
//     !preg_match($pattern, $_POST["name"]))//русские буквы
//         $name = $_POST['name'];
// var_dump($name);

if (!empty($_POST["name"])) $email = $_POST['name'];
if (!empty($_POST["email"])) $email = $_POST['email'];
if (!empty($_POST["subject"])) $email = $_POST['subject'];
if (!empty($_POST["text"])) $text = $_POST['text'];

/***   Проверка данных ***/
// валидация почты
$OK = false;
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $OK = true;
} else {
    $OK = false;
    $result['email'] = 'Неверный адрес электронной почты';
}

/***   Отправка данных ***/
if ($OK) {
    // отправка
   
    // если отправка успешна
    $result['error'] = "";
    $result['success'] = 'Сообщение отправлено';
} else {
    $result['error'] = 'Сообщение не отправлено';
}

/***   Возврат результата отправки ***/
header('Content-Type: application/json');
echo json_encode($result);


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
$mail->addAddress('smtp_assist@mail.ru', 'Form');

$mail->isHTML(true);

$mail->Subject = $_POST['subject'];
//$mail->Body = "Имя: {$_POST['username']}<br> Пароль: {$_POST['password']}";
$mail->Body = "Имя: {$_POST['name']}<br> Email: {$_POST['email']}<br> Тема: {$_POST['subject']}<br> Сообщение: {$_POST['body']}";
//$mail->AltBody =  "Имя: {$_POST['name']}\r\n Email: {$_POST['email']}\r\n Сообщение: {$_POST['body']}";
//$mail->SMTPDebug = 1;

$mail->send();

?>