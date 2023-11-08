<?php
// $to = 'seogrey@gmail.com';
$to = 'finsaniwebsite@mail.ru';
// error_log(print_r($_POST, 1));
file_put_contents('send-log-post.txt', print_r($_POST, true), FILE_APPEND);
if (isset($_POST['submit'])) {
$location = trim($_POST['location']);
$price = trim($_POST['price']);
$date = trim($_POST['date']);
$name = trim($_POST['name']);
$tel = trim($_POST['tel']);
$mail = trim($_POST['mail']);
$message = trim($_POST['message']);
// error_log(print_r($_POST, 1));
//file_put_contents('send-log-post.txt', print_r($_POST, true), FILE_APPEND);
  error_log(print_r($_POST, 1));
if (!empty($_FILES['file']['tmp_name']) and $_FILES['file']['error'] == 0) {
$filepath = $_FILES['file']['tmp_name'];
$filename = $_FILES['file']['name'];
// $filetype = $_FILES['file']['type'];
  } else {
$filepath = '';
$filename = '';
// $filetype = '';
  }
$body = "Местонахождение объекта оценки: " . $location . "\r\n\r\n";
$body .= "Цена оценки:" .  $price . "\r\n\r\n";
$body .= "Предпочтительная дата оценки:: " . $date . "\r\n\r\n";
$body .= "Имя клиента: " . $name . "\r\n\r\n";
$body .= "Контактный телефон: " . $tel . "\r\n\r\n";
$body .= "E-mail: " . $mail . "\r\n\r\n";
$body .= "Дополнительная информация: " . $message . "\r\n\r\n";
  error_log(print_r($body, 1));
  send_mail($to, $body, $mail, $filepath, $filename);
}
// Вспомогательная функция для отправки почтового сообщения с вложением
function send_mail($to, $body, $email, $filepath, $filename)
{
$subject = 'Форма с прикреплением файла с сайта expert-otsenka24.ru';
$boundary = "--" . md5(uniqid(time())); // генерируем разделитель
$headers = "From: " . $email . "\r\n";
$headers .= "MIME-Version 1.0\r\n";
$headers .= "Content-Type: multipart/mixed; boundary=\"" . $boundary . "\"\r\n";
$multipart = "--" . $boundary . "\r\n";
$multipart .= "Content-type: text/plain; charset=\"utf-8\"\r\n";
$multipart .= "Content-Transfer-Encoding: quoted-printable\r\n\r\n";
$body = $body . "\r\n\r\n";
$multipart .= $body;
$file = '';
if (!empty($filepath)) {
$fp = fopen($filepath, "r");
if ($fp) {
$content = fread($fp, filesize($filepath));
      fclose($fp);
$file .= "--" . $boundary . "\r\n";
$file .= "Content-Type: application/octet-stream\r\n";
// $file .= "Content-Type: " . $filetype . "\r\n";
// $file .= "Content-Type: image / jpeg \r\n";
$file .= "Content-Disposition: attachment; filename=\"" . $filename . "\"\r\n\r\n";
$file .= "Content-Transfer-Encoding: base64\r\n";
$file .= chunk_split(base64_encode($content)) . "\r\n";
    }
  }
$multipart .= $file . "--" . $boundary . "--\r\n";
  mail($to, $subject, $multipart, $headers);
}