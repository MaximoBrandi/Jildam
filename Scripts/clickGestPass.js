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