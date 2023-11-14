window.addEventListener('DOMContentLoaded', function() {

// // Функция отправки формы fetch

async function postData(url= '', data = {}) {
		const response = await fetch(url, {
			method: "POST",
			body: data,
			headers: {
				"Content-Type": "application/json",
				// 'Content-Type': 'application/x-www-form-urlencoded',
			  },
			body: JSON.stringify(data)
		});
		return await response.json();
	}

// function postData(url= '', data ={}) {
// 	return new Promise(resolve => {
// 		return fetch ('url')
// 			.then(response => response.json())
// 			.then(data => resolve(data));
// 	})
// 	.catch(error => console.log(error));
// }

// отправка
let form = document.getElementById('contact'); // переменная с формой
// при отправке формы любым способом
console.log(`Значение form ${form}`);
form.addEventListener('submit', function (event) {
    // запрещаем стандартное действие
    event.preventDefault();
    // создаем объект новый
    const data = new FormData(form);
	console.log(`Значение переменной ${data}`);
    //передаем в фукцию fetch данные и получаем результат
    postData('send.php', data).then((data) => {
        // обработка ответа от сервера
        console.log(data);
        if (data.error == '') {
            alert(data.success);
            cleanForm();
        } else if (data.email !== '') {
            alert(data.email);
        } else {
            alert(data.error);
        }
    })
	//postData('send.php', data);
});

});

