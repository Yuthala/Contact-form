window.addEventListener('DOMContentLoaded', function() {

// Функция отправки формы fetch
async function postData(url= '', data = {}) {
    const response = await fetch(url, {
        method: "POST",
        body: data
    });
    let result = await response.json();
	return result;

}

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
    // передаем в фукцию fetch данные и получаем результат
    // postData('send.php', data).then((data) => {
    //     // обработка ответа от сервера
    //     console.log(data);
    //     if (data.error == '') {
    //         alert(data.success);
    //         cleanForm();
    //     } else if (data.email !== '') {
    //         alert(data.email);
    //     } else {
    //         alert(data.error);
    //     }
    // })
	postData('send.php', data);
})

});