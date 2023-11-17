
//переписать на чистый JS 
//вынести скрипт js в отлельный файл
//вынести php код в отдельный файл
//сделать чтобы форма очищалась после отправки
//сделать чтобы сообщение об успешной/неуспешной передаче выводилось в span или div 
//поменять типы инпутов
//сделать валидацию полей и ограничение знаков для textarea
//добавить плейсхолдеры
//перенести форму на сайт



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

<!-- <div class="form-block">
    <h1>Форма связи</h1>
    <form id="form">
        <input class="clean" type="text" name="name" placeholder="Имя">
        <input class="clean" type="email" name="email" placeholder="Email *">
        <textarea class="clean" rows="3" name="text" placeholder="Текст сообщения"></textarea>
        <button name="send" type="submit">Отправить</button>
    </form>
</div> -->
	<form action="" method="POST" id="form">
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
	<script src='script.js'></script>
	<!--<script>
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
	</script>-->
</body>
</html>