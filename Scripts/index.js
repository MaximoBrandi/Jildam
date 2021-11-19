var opUser;

function userSelection() {
  if (opUser === 1) {
    document.getElementById("ingresarCuenta").classList.remove('vanish');
    document.getElementById("generarCuenta").classList.add('vanish');
    document.getElementById("verCuenta").classList.add('vanish');
    document.getElementById("bienvenida").classList.add('vanish');
    document.getElementById("selectedOptions").classList.add('vanish');
    
    document.getElementById("opUser1").classList.add('selected');
    document.getElementById("opUser2").classList.remove('selected');
    document.getElementById("opUser3").classList.remove('selected');
  }
  if (opUser === 2) {
    document.getElementById("bienvenida").classList.add('vanish');
    document.getElementById("ingresarCuenta").classList.add('vanish');
    document.getElementById("generarCuenta").classList.remove('vanish');
    document.getElementById("verCuenta").classList.add('vanish');
    document.getElementById("selectedOptions").classList.add('vanish');
    
    document.getElementById("opUser1").classList.remove('selected');
    document.getElementById("opUser2").classList.add('selected');
    document.getElementById("opUser3").classList.remove('selected');
  }
  if (opUser === 3) {
    document.getElementById("bienvenida").classList.add('vanish');
    document.getElementById("ingresarCuenta").classList.add('vanish');
    document.getElementById("generarCuenta").classList.add('vanish');
    document.getElementById("verCuenta").classList.remove('vanish');
    document.getElementById("selectedOptions").classList.add('vanish');

    document.getElementById("opUser1").classList.remove('selected');
    document.getElementById("opUser2").classList.remove('selected');
    document.getElementById("opUser3").classList.add('selected');
  }
  if (opUser === 4) {
    document.getElementById("bienvenida").classList.add('vanish');
    document.getElementById("registerMenu").classList.add('vanish');
    document.getElementById("loginMenu").classList.remove('vanish');

    document.getElementById("opUser4").classList.add('selected');
    document.getElementById("opUser5").classList.remove('selected');
  }
  if (opUser === 5) {
    document.getElementById("bienvenida").classList.add('vanish');
    document.getElementById("registerMenu").classList.remove('vanish');
    document.getElementById("loginMenu").classList.add('vanish');

    document.getElementById("opUser4").classList.add('selected');
    document.getElementById("opUser5").classList.remove('selected');
  }
}