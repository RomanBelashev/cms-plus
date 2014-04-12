function validate(form){
    var dbname = form.dbname.value;
    var dbuser = form.dbuser.value;
    var dbserver = form.dbserver.value;
    
    if(dbname == "") {
        alert('Введите имя БД');
        return false;
    }
    if (dbuser == ""){
        alert('Введите имя пользователя БД');
        return false;
    }
    if (dbserver == ""){
        alert('Введите имя сервера');
        return false;
    }
    return true;
}


