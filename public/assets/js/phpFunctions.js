// General

  
  /* Modificar Cookie */

  function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }

  /* Obtener cookie */

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

  /* E? */

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




    




    
// Menu

  /* Tema Oscuro */

  const btn_switchTheme = document.getElementById("switchTheme");
  btn_switchTheme.addEventListener("click",()=>{
      btn_switchTheme.classList.toggle('lightMode');
      btn_switchTheme.classList.toggle('darkMode');
      if(btn_switchTheme.className == 'darkMode') document.documentElement.className = 'light';
      else if(btn_switchTheme.className == 'lightMode') document.documentElement.className = 'dark';

      /* Se guarda la configuración en local storage */
      if(document.documentElement.className == 'dark'){
          localStorage.setItem("dark-mode","true");
      }
      else{
          localStorage.setItem("dark-mode","false");
      }
  })
  
  /* Cerrar sesión */

  function deleteCookie(cookie) {
    document.cookie = cookie + "=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;"
    location.href = "index.php";
  }

  /* Condicional para establecer el modo */
    if(localStorage.getItem("dark-mode") === "true"){
        document.documentElement.className = 'dark';
        btn_switchTheme.className = 'lightMode';
    }
    else{
        document.documentElement.className = 'light';
        btn_switchTheme.className = 'darkMode';
    }




    




  
// Login y Register

  /* Comparar Contraseñas */

    function isTheSame() {
      var confirm = confirmPswrd("no")
      if (confirm != "true") {
        setCookie("register", "owo", 2)
      }
    }
  
    /* Comparar Contraseñas */
  
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




    




    
// Inicio

  /* Botones */

    document.getElementById("opUser1").addEventListener("click", ()=>{
      location.href='gestionarContrasenias.php';
    })
    document.getElementById("opUser2").addEventListener("click", ()=>{
      location.href='Perfil.php';
    })




    




    
// Gestionar Contraseñas

    /* Generar Contraseñas */

  let caracteresRandomPass = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","u","v","w","x","y","z","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","U","V","W","X","Y","Z",1,2,3,4,5,6,7,8,9,0,"!","#","^","*","-","_"];
  function createPassword() {
    let inputPassGenerada = document.getElementById('input-passGenerada');
    let passGenerada = '';
    for (let i = 0; i < 16; i++) {
      let random = Math.floor(Math.random() * caracteresRandomPass.length);
      passGenerada += caracteresRandomPass[random];
      inputPassGenerada.value = passGenerada;  
    }
  }

  /* Ver Contraseña */
  
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
  /* Para mostrar las contraseñas guardadas */
    function clickedView(passCamp) {
      if ( document.getElementById(passCamp).type === "password") {
          document.getElementById(passCamp).type = "text";
      }else if(document.getElementById(passCamp).type === "text"){
          document.getElementById(passCamp).type = "password";
      }
    }

  /* Para mostrar las contraseñas al momento de editarlas o agregarlas en las alertas en gestionarContrasenias.php */
    function showPasswordInput(){
      let passwordInput = document.getElementById('input-passGenerada');
      if(passwordInput.type == "password") passwordInput.type = "text";
      else if(passwordInput.type == "text") passwordInput.type = "password";
    }

  /* Para copiar las contrasñas en gestionarContrasenias.php */
    function copyPassword(passCamp){
      let selectText = document.getElementById(passCamp);
      if(selectText.type === 'password'){selectText.type = 'text';selectText.select();document.execCommand('copy');window.getSelection().removeAllRanges();selectText.type = 'password';}
      else{selectText.select();document.execCommand('copy');window.getSelection().removeAllRanges()}
      alertify.notify('Copiado al portapapeles', 'success', 3, function(){});
    }

  /* Para ver las contraseñas en register.php */
    function seeRegisterPasswords(){
      let inputs = document.querySelectorAll(".inputPasswordRegister");
      if(document.getElementById('seePasswordInputs').checked == true){
          inputs.forEach(e => {
              e.type = 'text';
          });
      }
      else{
          inputs.forEach(e => {
              e.type = 'password';
          });
      }
    }

  /* Para generar una contraseña al momento de registrarse */
    function generatePassMultipleInputs(){
      let inputs = document.querySelectorAll(".inputPasswordRegister");
      let caracteresRandomPass = ["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","u","v","w","x","y","z","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","U","V","W","X","Y","Z",1,2,3,4,5,6,7,8,9,0,"-","_"];
      let passGenerada = '';
      for (let i = 0; i < 20; i++) {
          let random = Math.floor(Math.random() * caracteresRandomPass.length);
          passGenerada += caracteresRandomPass[random];
        }
      inputs.forEach(e => {
          e.value = passGenerada;
      });
      if(location.href.includes('register.php')) document.getElementById('boton_repiola').removeAttribute('disabled');
    }




    





// Perfil

  /* Botones Secciones */

    document.getElementById("personalizarButton").addEventListener("click", ()=>{
      document.getElementById("Personalizar").classList.remove('vanish');
      document.getElementById("PyS").classList.add('vanish');

      document.getElementById("personalizarButton").classList.add('btn-primary');
      document.getElementById("personalizarButton").classList.remove('btn-secondary');
      document.getElementById("PySButton").classList.add('btn-secondary');
      document.getElementById("PySButton").classList.remove('btn-primary');
    })

    document.getElementById("PySButton").addEventListener("click", ()=>{
      document.getElementById("PyS").classList.remove('vanish');
      document.getElementById("Personalizar").classList.add('vanish');

      document.getElementById("PySButton").classList.add('btn-primary');
      document.getElementById("PySButton").classList.remove('btn-secondary');
      document.getElementById("personalizarButton").classList.add('btn-secondary');
      document.getElementById("personalizarButton").classList.remove('btn-primary');
    })

  /* Borrar todas las contraseñas */
    
    function truncateTable() {
      var r = confirm("Seguro de eliminar todas tus contraseñas?");
      if (r == true) {
        window.location.href = "truncate.php"
      } else {
        location.reload();
      }
    }























// Funciones a corregir


  /* Verificar login */

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

  /* Verificar login */

  function firstTime() {
    var login = getBooleanCookie("login");

    if (login != null) {
      setCookie("firstTime", false, 30);
    } else {
      setCookie("firstTime", true, 30);
      setCookie("login", false, 30);
    }
  }

  /* Verificar login */
  
    function alertLogin(ws) {
      if (ws == "login") {
        var cookie = getCookie("loginError")
        var login = getSesionState()
        if (cookie != null && cookie != "") {
          document.getElementById("errorAlert").classList.remove('vanish');
          document.getElementById("errorAlert").innerHTML = getCookie("loginError");
          return;
        }
        if (login == "LogedIn") {
          location.href = "inicio.php";
        }
      } 
      else if (ws == "register") {
        var cookie = getCookie("registerError");
        var login = getSesionState();
        if (cookie != null && cookie != "") {
          document.getElementById("errorAlert").classList.remove('vanish');
          document.getElementById("errorAlert").innerHTML = getCookie("registerError");
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
  
  /* Cerrar Session */
  
    function closeSesion() {
      deleteCookie("login")
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