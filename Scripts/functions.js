function setCookie(cname, cvalue, exdays) {
    const d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    let expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
  }

  function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    for(let i = 0; i <ca.length; i++) {
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

function checkSesion(argumentloged, argumentlogout) {
    var sesionState = getSesionState()

    if (sesionState == "LogedIn") {
        document.write("Loged in")
        document.write(argumentloged)
    } else if (sesionState == "NotLogedIn") {
        document.write("Not loged in")
        document.write(argumentlogout)
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