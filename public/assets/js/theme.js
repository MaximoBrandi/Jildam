const btn_switchTheme = document.getElementById("switchTheme");
if(localStorage.getItem("dark-mode") === "true"){
    document.documentElement.className = 'dark';
    btn_switchTheme.className = 'lightMode';
}
else{
    document.documentElement.className = 'light';
    btn_switchTheme.className = 'darkMode';
}
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