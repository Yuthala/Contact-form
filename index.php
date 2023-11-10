<?php

if( $_POST ) {

	require 'phpmailer/PHPMailerAutoload.php';

	die;
}
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
				}
				return false;

			});
		});
	</script>
</body>
</html>