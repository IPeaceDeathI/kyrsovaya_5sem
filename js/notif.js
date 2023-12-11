const form = document.querySelector('#form');
const email = document.querySelector('#email');
const password = document.querySelector('#password');


Notification.requestPermission(function(permission){
// переменная permission содержит результат запроса
    console.log('Результат запроса прав:', permission);
});

let submit = false;
form.addEventListener('submit', function(evt) {
    evt.preventDefault();
    if(!password.value) {
        alert('Поле "Пароль" не заполнено');
        return;
    }

    if(!email.value) {
        alert('Поле "Почта" не заполнено');
        return;
    }

    submit = true;
    /*this.submit();*/
});

document.querySelector('#auth_submit').onclick = function notificationFunc(){
    if(submit){
        if (Notification.permission === "granted") {
            var Auth = new Notification("Вы прошли авторизацию!",
                {
                    icon: "images/icon.png",
                    vibrate: [200, 100, 200],
                    body: "Благодарим за прохождение авторизации, надеемся вы найдете автомобиль по вкусу!"
                });
        }
    }
}
document.querySelector('#auth_recover').onclick = function notificationFunc(){
    if (Notification.permission === "granted") {
        var Rec = new Notification("Забыли пароль?",
            {
                icon: "images/icon.png",
                vibrate: [200, 100, 200],
                body: "Не проблема, сейчас мы поможем вам вернуть доступ к своему аккаунту!"
            });
    }
}
document.querySelector('#auth_registration').onclick = function notificationFunc(){
    if (Notification.permission === "granted") {
        var Reg = new Notification("Желаете пройти регистрацию?",
            {
                icon: "images/icon.png",
                vibrate: [200, 100, 200],
                body: "Отлично, сейчас мы поможем вам пройти регистрацию, после чего вы сможете найти машину своей мечты!"
            });
    }
}