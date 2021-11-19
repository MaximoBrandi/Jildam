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

/* Para mostrar las contraseñas en la pagina de registro */
if(window.location.href.includes('register')){

    let showBtns_register = document.querySelectorAll(".btn-verPassLogin"), passwordInput = document.getElementById('pswrd'), passwordInput2 = document.getElementById('pswrd_confirm');

    showBtns_register[0].addEventListener('click',()=>{
        if(passwordInput.type == "password") passwordInput.type = "text";
        else if(passwordInput.type == "text") passwordInput.type = "password";
    });

    showBtns_register[1].addEventListener('click',()=>{
        if(passwordInput2.type == "password") passwordInput2.type = "text";
        else if(passwordInput2.type == "text") passwordInput2.type = "password";
    });
}

function copyPassword(passCamp){
    let selectText = document.getElementById(passCamp);
    if(selectText.type === 'password'){selectText.type = 'text';selectText.select();document.execCommand('copy');selectText.type = 'password';}
    else{selectText.select();document.execCommand('copy');window.getSelection().removeAllRanges()}
}