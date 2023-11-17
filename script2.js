window.addEventListener('DOMContentLoaded', function() {



	// Функция отправки формы fetch
	let form = document.getElementById('form');
	let data = new FormData(form);
	console.log([data]);


	let response =  fetch('send.php', {
		method: "POST",
		headers: {
			'Content-Type': 'application/json;charset=utf-8'
		},
		body: JSON.stringify(data)
	});

	let result = response.json();
	this.alert(result.message);
		//return await response.text();
		
	
	// отправка
	// let form = document.getElementById('form'); // переменная с формой
	// // при отправке формы любым способом
	// form.addEventListener('submit', function (event) {
	// 	// запрещаем стандартное действие
	// 	event.preventDefault();
	// 	// создаем объект новый
	// 	let data = new FormData(form);
	// 	console.log([data]);
	// 	// передаем в фукцию fetch данные и получаем результат
	// 	postData('send.php', data).then((data) => {
	// 		// обработка ответа от сервера
	// 		if (data.error == '') {
	// 			console.log(`if no error: ${data.success}`);
	// 				// Очищаем поля формы 
	// 				//cleanForm();
	// 				event.target.reset();
	// 		// } else if (data.email !== '') {
	// 		//     console.log(`if email is not empty ${data.email}`);
	// 		} else {
	// 		console.log(`Error text ${data.error}`);
	// 		}
	// 	})
	// })
	
	});
	
	