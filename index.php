
//переписать на чистый JS - done
//вынести скрипт js в отдельный файл - done
//вынести php код в отдельный файл - done
//сделать чтобы форма очищалась после отправки - done
//сделать чтобы сообщение об успешной/неуспешной передаче выводилось в span или div - done
//поменять типы инпутов - done
//сделать ограничение знаков для textarea - done
//добавить плейсхолдеры - done
//сделать валидацию полей - done с косяками

//добавить согласие с Политикой конфиденциальности
//перенести форму на сайт
//добавить капчу после после переноса на рабочий домен



<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Contact Form</title>
	<style>
		h1 {
  font-size: 50px;
  line-height: 150%;
  margin-bottom: 20px;
  text-align: center;
}
form {
  display: flex;
  flex-direction: column;
}
input, textarea {
  border: 1px black solid;
  margin-bottom: 20px;
  padding: 5px 15px;
  font-size: 18px;
  line-height: 150%;
  border-radius: 5px;
  max-width: 100%;
}
button {
  width: 150px;
  height: 45px;
  border-radius: 5px;
  font-size: 18px;
}
	</style>
</head>
<body>

	<form action="" method="POST" id="form">
		<p>
			<label for="name">Имя</label>
			<input type="text" name="name" id="name" pattern="[А-Яа-яЁё]{3,15}" placeholder="Ваше имя" required><span></span>
		</p>
		<p>
			<label for="subject">Тема</label>
			<input type="text" name="subject" id="subject" pattern="[а-яА-ЯёЁa-zA-Z0-9]{3,20}" placeholder="Тема сообщения"><span></span>
		</p>
		<p>
			<label for="email">Email</label>
			<input type="email" name="email" id="email" maxlength="30" placeholder="Ваш e-mail" required><span></span>
		</p>
		<p>
			<label for="body">Сообщение</label>
			<textarea name="body" cols="30" rows="10" id="body" maxlength="250" pattern="[а-яА-ЯёЁa-zA-Z0-9]{3,250}" placeholder="Текст сообщения" required></textarea><span></span>
			<div id="result"></div>
		</p>
		<p>
			<input id="submit" type="submit" name="submit" value="Отправить"><span></span>
		</p>

	</form>

	<script src='script.js'></script>
</body>
</html>