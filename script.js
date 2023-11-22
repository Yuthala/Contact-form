window.addEventListener('DOMContentLoaded', function() {



// Функция отправки формы fetch
async function postData(url= '', data = {}) {
    const response = await fetch(url, {
        method: "POST",
		// headers: {
		// 	'Content-Type': 'application/json;charset=utf-8'
		// },
        //body: JSON.stringify(data)
		body: data
    });
    //return await response.text();
	return await response.json();
}

// отправка
let form = document.getElementById('form'); // переменная с формой
// при отправке формы любым способом
form.addEventListener('submit', function (event) {
    // запрещаем стандартное действие
    event.preventDefault();
    // создаем объект новый
    let data = new FormData(form);
	console.log([data]);
    // передаем в фукцию fetch данные и получаем результат
    postData('send.php', data).then((data) => {
        let result = document.getElementById('result');
        // обработка ответа от сервера
        if (data.error == '') {
            //console.log(`if no error: ${data.success}`);
				// Очищаем поля формы 
				//cleanForm();
				event.target.reset();
                result.style.color = 'green';
                result.textContent = "Ваше сообщение успешно отправлено";
        //} else if (data.email !== '') {
        	//console.log(`if email is not empty ${data.email}`);
        } else {
            result.style.color = 'red';
            result.textContent = "При отправке формы произошла ошибка. Свяжитесь TG @SugarBay";
        }
    })
})

// async function postData(url= '', data = {}) {
// 		const response = await fetch(url, {
// 			method: "POST",
// 			body: data,
// 			headers: {
// 				"Content-Type": "application/json",
// 				// 'Content-Type': 'application/x-www-form-urlencoded',
// 			  },
// 			body: JSON.stringify(data)
// 		});
// 		return await response.json();
// 	}

// function postData(url= '', data ={}) {
// 	return new Promise(resolve => {
// 		return fetch ('url')
// 			.then(response => response.json())
// 			.then(data => resolve(data));
// 	})
// 	.catch(error => console.log(error));
// }





// // отправка
// let form = document.getElementById('contact'); // переменная с формой
// // при отправке формы любым способом
// console.log(`Значение form ${form}`);
// form.addEventListener('submit', function (event) {
//     // запрещаем стандартное действие
//     event.preventDefault();
//     // создаем объект новый
//     const data = new FormData(form);
// 	console.log(`Значение переменной ${data}`);
//     //передаем в фукцию fetch данные и получаем результат
//     postData('send.php', data).then((data) => {
//         // обработка ответа от сервера
//         console.log(data);
//         if (data.error == '') {
//             alert(data.success);
//             cleanForm();
//         } else if (data.email !== '') {
//             alert(data.email);
//         } else {
//             alert(data.error);
//         }
//     })
// 	//postData('send.php', data);
// });

});

