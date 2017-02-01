function createCookie(name, value, days) {
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        var expires = "; expires="+date.toGMTString();
    }
    else var expires = "";
    document.cookie = name+"="+value+expires+"; path=/";
}

function readCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for(var i=0;i < ca.length;i++) {
        var c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
    }
    return null;
}

function eraseCookie(name) {
    createCookie(name,"",-1);
}

function limpar(){
        $('#main-content').empty();
};

function loadDashboard() {
    var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("main-content").innerHTML =
            this.responseText;
            }
        };
    xhttp.open("GET", "dashboard.php", true);
    xhttp.send();
}

function loadAddUser() {
    var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("main-content").innerHTML =
            this.responseText;
            }
        };
    xhttp.open("GET", "adicionarUser.php", true);
    xhttp.send();
}

function loadUser() {
    var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("main-content").innerHTML =
            this.responseText;
            }
        };
    xhttp.open("GET", "perfil.php", true);
    xhttp.send();
}

function loadUsersTable() {
    var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("main-content").innerHTML =
            this.responseText;
            }
        };
    xhttp.open("GET", "consultarUsers.php", true);
    xhttp.send();
}

function loadUserInfo() {
    var idref = $('input[name=selecionado]:checked', '#userstable').val();
    createCookie('idcons', idref, 1);
    limpar();
    var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("main-content").innerHTML =
            this.responseText;
            }
        };
    xhttp.open("GET", "consult.php", true);
    xhttp.send();
}

function loadAddCond() {
    var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("main-content").innerHTML =
            this.responseText;
            }
        };
    xhttp.open("GET", "adicionarCondominio.php", true);
    xhttp.send();
}

function loadCondTable() {
    var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("main-content").innerHTML =
            this.responseText;
            }
        };
    xhttp.open("GET", "consultarCondominios.php", true);
    xhttp.send();
}

function loadAddFrac() {
    var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("main-content").innerHTML =
            this.responseText;
            }
        };
    xhttp.open("GET", "adicionarFracao.php", true);
    xhttp.send();
}

function loadFracTable() {
    var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("main-content").innerHTML =
            this.responseText;
            }
        };
    xhttp.open("GET", "consultarFracoes.php", true);
    xhttp.send();
}

function loadEvents() {
    var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("main-content").innerHTML =
            this.responseText;
            }
        };
    xhttp.open("GET", "events.php", true);
    xhttp.send();
}

function loadEventsTable() {
    var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("main-content").innerHTML =
            this.responseText;
            }
        };
    xhttp.open("GET", "eventslist.php", true);
    xhttp.send();
}

function editEventInfo() {
	if($("form input:radio").is(':checked')) {
	var idref = $('input[name=selecionado]:checked', '#eventstable').val();
    createCookie('idevento', idref, 1);
    var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("main-content").innerHTML =
            this.responseText;
            }
        };
    xhttp.open("GET", "editaEvento.php", true);
    xhttp.send();
	}
}

function editavers(){
    var idref = $('input[name=selecionado]:checked', '#userstable').val();
    createCookie('idcons', idref, 1);
    alert(idref);
    var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("main-content").innerHTML =
            this.responseText;
            }
        };
    xhttp.open("GET", "editcons.php", true);
    xhttp.send();
}

function loadPw() {
    var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("demo").innerHTML =
            this.responseText;
            }
        };
    xhttp.open("GET", "teste.php", true);
    xhttp.send();
}

function loadInfo() {
    var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("main-content").innerHTML =
            this.responseText;
            }
        };
    xhttp.open("GET", "condominosInfo.php", true);
    xhttp.send();
}

function loadEfetuarPedido() {
    var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("main-content").innerHTML =
            this.responseText;
            }
        };
    xhttp.open("GET", "efetuarPedido.php", true);
    xhttp.send();
}

function loadVerPedidos() {
    var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            document.getElementById("main-content").innerHTML =
            this.responseText;
            }
        };
    xhttp.open("GET", "verPedido.php", true);
    xhttp.send();
}

function carregavers(){
    var idref = $('input[name=selecionado]:checked', '#userstable').val();
    createCookie('idcons', idref, 1);
    $("#main-content").load('consult.php');
    
}

function carregaCond(){
    var idref = $('input[name=selecionado]:checked', '#condtable').val();
    createCookie('idcond', idref, 1);
    $("#main-content").load('consultCondominios.php');
    
}

function carregaFrac(){
    var idref = $('input[name=selecionado]:checked', '#fractable').val();
    createCookie('idfrac', idref, 1);
    $("#main-content").load('consultFracoes.php');
    
}

function editUserInfo(){
    var idref = $('input[name=selecionado]:checked', '#userstable').val();
    createCookie('idcons', idref, 1);
    $("#main-content").load('editcons.php');
}

function editCondInfo(){
    var idref = $('input[name=selecionado]:checked', '#condtable').val();
    createCookie('idcondo', idref, 1);
    $("#main-content").load('editCondominio.php');
}

function editFracInfo(){
    var idref = $('input[name=selecionado]:checked', '#fractable').val();
    createCookie('idfrac', idref, 1);
    $("#main-content").load('editFracao.php');
}
/*
function validateForm() {
    var x = document.forms["frmRegistration"]["confirm_password"].value;
    if (x == "") {
        alert("Name must be filled out");
        return false;
    }
}*/


function loadEvents() {
    $("#main-content").load('events.php', function() {
    $( "#datepicker" ).datepicker();});
}

function loadPicker(){
    $( function() {
        $( "#datepicker" ).datepicker();
    } );
}

function loadTimePicker(){
    $( function() {
        $( "#timepicker" ).timepicker();
    } );
}
 

$(document).ready(function(){
    var password1 = document.getElementById('password1');
    var password2 = document.getElementById('password2');

    var checkPasswordValidity = function() {
        if (password1.value != password2.value) {
            password1.setCustomValidity('Passwords must match.');
        } else {
            password1.setCustomValidity('');
        }        
    };

password1.addEventListener('change', checkPasswordValidity, false);
password2.addEventListener('change', checkPasswordValidity, false);
});

function pwCheck(){
	$('#password1, #password2').on('keyup', function () {
        if ($('#password1').val() == $('#password2').val()) {
			document.getElementById("myBtn").disable = false;
			$( "#myBtn" ).prop( "disabled", false );
            $('#errorpw').html('Matching').css('color', 'green');
            
        } else if($('#password1').val() !== $('#password2').val()){
            $('#errorpw').html('Not Matching').css('color', 'red');
            document.getElementById("myBtn").disabled = true;
		}
    });
}


$(document).ready(function(){
    $("#testando").click(function(){
        alert();
    });
});


$(document).ready(function(){
    $('#password1, #password2').on('keyup', function () {
        if ($('#password1').val() == $('#password2').val()) {
            $('#message').html('Matching').css('color', 'green');
        } else 
            $('#message').html('Not Matching').css('color', 'red');
    });
});