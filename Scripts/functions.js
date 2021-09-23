function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    let expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }

  function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie)
    let ca = decodedCookie.split(';')
    for(let i = 0; i <ca.length; i++) {
      let c = ca[i]
      while (c.charAt(0) == ' ') {
        c = c.substring(1)
      }
      if (c.indexOf(name) == 0) {
        return c.substring(name.length, c.length)
      }
    }
    return "";
  }

function getBooleanCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
      let c = ca[i];
      while (c.charAt(0) == ' ') {
        c = c.substring(1);
      }
      if (c.indexOf(name) == 0) {
        if (c.substring(name.length, c.length) == "true") {
            return "1"
        } else if (c.substring(name.length, c.length) == "false") {
            return "0"
        } else {
            return "3"
        }
      }
    }
    return null;
  }

function getSesionState() {
    var loginCookie = getBooleanCookie("login")

    if (loginCookie == "1") {
        return "LogedIn"
    } else if (loginCookie == "0") {
        return "NotLogedIn"
    } else {
        return "Error"
    }
}

function checkSesion(argumentloged, argumentlogin, argumentlogout) {
    var sesionState = getSesionState()
    var loginName = getCookie("username")

    if (sesionState == "LogedIn") {
        document.write("Loged in " + loginName)
        document.write(argumentloged)
        document.write("<br><br><button onclick='deleteCookie("+'"login"'+", " + '"Jildam/index.php"' +")' formaction='index.php'>Cerrar Sesion</button>")
    } else if (sesionState == "NotLogedIn") {
        document.write("Not loged in")
        document.write(argumentlogout)
        document.write(argumentlogin)
    } else if (sesionState == "Error") {
        document.write("An error has occurred")
    } else {
        document.write("Fatal error")
    }
}

function firstTime() {
    var login = getBooleanCookie("login")

    if (login != null) {
        setCookie("firstTime", false, 30)
    } else {
        setCookie("firstTime", true, 30)
        setCookie("login", false, 30)
    }
}

function deleteCookie(cookie, load) {
    document.cookie = cookie+"=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;"
    window.location.href = load
}