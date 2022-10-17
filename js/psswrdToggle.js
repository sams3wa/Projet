// JavaScript File
// ---- VARIABLES GLOBALES
var psswrd=document.getElementById("password");
var eye=document.getElementById("eye");





// ---- FONCTION

function password(){
 
 // Au clique, si l'input est un password, alors il devient un input text
    if (psswrd.type === "password") {
    psswrd.type = "text";
   
// Au clique, si l'input est un text, alors il devient un input password
  } else {
    psswrd.type = "password";
  }
}
function changeImg(){
 
// Au clique, si l'oeil a la class fa-eye, alors il échange avec la class fa-eye-slash
 if (eye.className=="fa-solid fa-eye")
 {
  eye.className="fa-solid fa-eye-slash";
   } 
   
// Au clique, si l'oeil a la class fa-eye-slash, alors il échange avec la class fa-eye
   else
  {
   eye.className="fa-solid fa-eye";
  }
}




// ---- GESTIONNAIRE D'ÉVÈNEMENTS
eye.addEventListener('click', password);
eye.addEventListener('click', changeImg);