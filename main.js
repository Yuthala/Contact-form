// Как только страничка загрузилась
window.onload = function () {
	// проверяем поддерживает ли браузер FormData
	if (!window.FormData) {
		alert("Браузер не поддерживает загрузку файлов на этом сайте");
	  }
	}
	$(document).ready(function () {
	// Валидация и отправка формы
	  var errorTxt = 'Ошибка отправки';
	$.validator.addMethod(
		"dmyDate",
	function(value, element) {
	return value.match(/^\d\d?\/\d\d?\/\d\d\d\d$/);
		},
		"Введите дату в формате день/месяц/год "
	);
	$("#sendform").validate({
		rules: {
		  location: {
			required: true,
		  },
		  price: {
			required: true,
		  },
		  date: {
			required: true,
			dmyDate: true
		  },
		  name: {
			required: true,
		  },
		  tel: {
			required: true,
		  },
		  mail: {
			required: true,
			email: true
		  },
		  policy: {
			required: true
		  }
		},
		messages: {
		  location: {
			required: "Это поле обязательно для заполнения",
		  },
		  price: {
			required: "Это поле обязательно для заполнения",
		  },
		  date: {
			required: "Это поле обязательно для заполнения"
		  },
		  name: {
			required: "Это поле обязательно для заполнения",
		  },
		  tel: {
			required: "Это поле обязательно для заполнения",
		  },
		  mail: {
			required: "Это поле обязательно для заполнения",
			email: "Введите валидный почтовый адресс"
		  },
		  "policy": "Нужно ваше согласие на обработку персональных данных"
		},
		submitHandler: function (form) {
		  var myform = document.forms.sendform,
			formData = new FormData(myform),
			xhr = new XMLHttpRequest();
		  xhr.open("POST", "/wp-content/themes/ocenka/mail.php");
		  xhr.onreadystatechange = function () {
			  if (xhr.readyState == 3) {
	$("#sendform").html('<p class="thank text-center">Идет отправка формы ...<br></p> ');
			  }         
			if (xhr.readyState == 4) {
			  if (xhr.status == 200) {
	$("#sendform").html('<p class="thank text-center">Данные отправлены!<Br> Вы получите ответ в ближайшее время<Br></p> ');
		}
			  if (xhr.status == 500) {
	$("#sendform").html('<p class="thank text-center">Внутренняя ошибка сервера!<p>');
				console.dir(xhr)
			  }
			}
		  };
		  xhr.send(formData);
		  console.dir(xhr)
		}
	  }); // end $("#sendform")
	// Изменяем текст на кнопке загрузки файлов на их количество или название, если он один
	  var inputs = document.querySelectorAll('.inputfile');
	  Array.prototype.forEach.call(inputs, function (input) {
		var label = input.nextElementSibling,
		  labelVal = label.innerHTML;
		input.addEventListener('change', function (e) {
		  var fileName = '';
	if (this.files && this.files.length > 1) {
			fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}', this.files.length);
		  }
	else
			fileName = e.target.value.split('\\').pop();
	if (fileName)
			label.innerHTML = fileName;
	else
			label.innerHTML = labelVal;
		});
	  }); // end Array.prototype
	}); // end $(document).ready
	