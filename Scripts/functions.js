function setCookie(cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  let expires = "expires=" + d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for (let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

function getBooleanCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for (let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      if (c.substring(name.length, c.length) == "true") {
        return "1";
      } else if (c.substring(name.length, c.length) == "false") {
        return "0";
      } else {
        return "3";
      }
    }
  }
  return null;
}

function getSesionState() {
  var loginCookie = parseInt(getCookie("login"));

  if (!isNaN(loginCookie)) {
    return "LogedIn";
  } else if (isNaN(loginCookie)) {
    return "NotLogedIn";
  } else {
    return "Error";
  }
}

/* function checkSesion(ind) {
  var sesionState = getSesionState();
  var loginName = getCookie("username");

  if (ind == "index") {
    if (sesionState == "LogedIn") {
      document.getElementById("LogInAccount-text").innerHTML = "Loged in " + loginName;
      document.getElementById("LogInAccount").classList.remove('vanish');
      document.getElementById("LogedIn").classList.remove('vanish');
    } else {
      document.getElementById("LogInAccount-text").innerHTML = "Not loged in";
      document.getElementById("LogedOut").classList.remove('vanish');
    }
  }else if (ind == "inicio") {
    if (sesionState == "LogedIn") {
      document.getElementById("LogInAccount-text").innerHTML = "Loged in " + loginName;
    } else{
      document.getElementById("LogInAccount-text").innerHTML = "Not loged in";
      document.getElementById("loged").classList.add('vanish');
      document.getElementById("notLoged").classList.remove('vanish');
    }
  }
} */

function firstTime() {
  var login = getBooleanCookie("login");

  if (login != null) {
    setCookie("firstTime", false, 30);
  } else {
    setCookie("firstTime", true, 30);
    setCookie("login", false, 30);
  }
}

function deleteCookie(cookie) {
  document.cookie = cookie + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;"
  location.href = "index.php";
}

function truncateTable() {
  var r = confirm("Seguro de eliminar todas tus contraseñas?");
  if (r == true) {
    window.location.href = "truncate.php"
  } else {
    location.reload();
  }
}

function viewPswrds() {
  var r = confirm("Estas a punto de ver tus contraseñas");
  if (r == true) {
    var c = prompt("Confirma tu contraseña");
    var cc = getCookie("psw");
    if (c == cc) {
      document.write("<form><input type='submit' formaction='pswrds.php' value='Ver contraseñas'></form> <br>")
    } else {
      alert("Contraseña equivocada");
      deleteCookie("login");
      document.write("<form><input type='submit' formaction='index.php' value='Atras'></form> <br>");
    }
  } else {
    location.reload();
  }
}

function alertLogin(ws) {
  if (ws == "login") {
    var cookie = getCookie("loginError")
    var login = getSesionState()
    if (cookie == "true") {
      document.getElementById("errorAlert").classList.remove('vanish');
      document.getElementById("errorAlert").innerHTML = "Los datos ingresados son incorrectos";
      document.getElementById("tituloLogIn").style = "";
      return;
    }
    if (login == "LogedIn") {
      location.href = "inicio.php";
    }
  } 
  else if (ws == "register") {
    var cookie = getCookie("registerError")
    var login = getSesionState()
    if (cookie == "true") {
      document.getElementById("errorAlert").classList.remove('vanish');
      document.getElementById("errorAlert").innerHTML = "Los datos brindados no son válidos";
      document.getElementById("tituloLogIn").style = "";
      return;
    }
    if (login == "LogedIn") {
      location.href = "inicio.php";
    }
  }
  else if (ws == "inicio") {
    var login = getSesionState()
    if (login == "LogedIn") {
      location.href = "inicio.php";
    }
  }
  else if (ws == "checkSession") {
    var login = getSesionState()
    if (login == "NotLogedIn") {
      location.href = "index.php";
    }else if(login == "Error") {
      location.href = "index.php";
  }
}
}

function closeSesion() {
  deleteCookie("login")
}

function confirmPswrd(write) {
  if (write != "no") {
    if(document.getElementById('pswrd').value == '' && document.getElementById('pswrd_confirm').value == ''){
      document.getElementById('message').innerHTML = '';
      document.getElementById('boton_repiola').setAttribute('disabled','true');
      return "false";
    }
    if (document.getElementById('pswrd').value ==
      document.getElementById('pswrd_confirm').value) {
      document.getElementById('message').style.color = 'green';
      document.getElementById('message').innerHTML = '¡Todo en orden!';
      document.getElementById('boton_repiola').removeAttribute('disabled','false');
      return "true";
    } 
    else if (document.getElementById('pswrd').value != null && document.getElementById('pswrd_confirm').value != null && document.getElementById('pswrd').value != document.getElementById('pswrd_confirm').value) {
      document.getElementById('message').style.color = 'red';
      document.getElementById('message').innerHTML = 'Las contraseñas no coinciden';
      document.getElementById('boton_repiola').setAttribute('disabled','true');
      return "false";
    }
  }
  else if(write == "no"){
    if (document.getElementById('pswrd').value ==
      document.getElementById('pswrd_confirm').value) {
      return "true";
  } 
  else if(document.getElementById('pswrd').value != null && document.getElementById('pswrd_confirm').value != null){
      return "false";
    } 
  }

}

function isTheSame() {
  var confirm = confirmPswrd("no")
  if (confirm != "true") {
    setCookie("register", "owo", 2)
  }
}
/* 
function inicioTypes() {
  var actionType = getCookie("actionType")
  if (actionType == "1") {
    document.getElementById("bienvenida").classList.add('vanish');
    document.getElementById("submitFinal").classList.remove('vanish');
    deleteCookie("actionType")
  } else if(actionType == "2") {
    document.getElementById("bienvenida").classList.add('vanish');
    document.getElementById("generateFinal").classList.remove('vanish');
    deleteCookie("actionType")
  } else if (actionType == "4") {
    document.getElementById("bienvenida").classList.add('vanish');
    document.getElementById("loginFinal").classList.remove('vanish');
    deleteCookie("actionType")
  } else if (actionType == "5") {
    document.getElementById("bienvenida").classList.add('vanish');
    document.getElementById("registerFinal").classList.remove('vanish');
    deleteCookie("actionType")
  }
} */