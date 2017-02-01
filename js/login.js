function validar(){
    var username = document.frmLogin.username;
    var password = document.frmLogin.password;
    
    if (username.value.length >0){
        if (password.value.length >0){
            document.frmLogin.submit();
        }else{
            alert('Preencha p.f. a password');
            password.focus();
        }
    }else{
        alert('Preencha p.f. o username');
        username.focus();
    }    
}


