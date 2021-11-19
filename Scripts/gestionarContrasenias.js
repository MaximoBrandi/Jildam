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

