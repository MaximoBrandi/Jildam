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