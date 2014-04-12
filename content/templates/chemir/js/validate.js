//Функция валидации полей
function validate(form) {
    var login = form.login.value;
    var email = form.email.value;
    var password = form.password.value;
    var repassword = form.repassword.value;

    if (login == "") {
        alert("Вы не ввели логин");
        return false;

    }

    var regVL = /^[A-Za-z0-9\-\_]{2,25}$/;
    var result = login.match(regVL);
    if (!result) {
        alert("Логин может содержать только латинские буквы и цифры");
        return false;
    }
    if (email == "") {
        alert("Вы не ввели email");
        return false;
    } else {
        var regV = /^[A-Za-z0-9\-\_]{2,15}\@[A-Za-z0-9\-\_]{2,10}\.[A-Za-z0-9\-\_]{2,4}$/;
        var result_e = email.match(regV);
        if (!result_e) {
            alert("Email не корректен");
            return false;
        }
    }
    if (password === "") {
        alert("Вы не ввели пароль");
        return false;
    }
    //Длина пароля
    if (password.length < 6 || password.length > 35) {
        alert("Длина пароля некорректна");
        return false;
    }
    if (password != repassword) {
        alert("Пароли не совпадают");
        return false;
    }
    return true;
}



