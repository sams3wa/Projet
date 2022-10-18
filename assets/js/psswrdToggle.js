// ---- VARIABLES GLOBALES
var psswrd=document.getElementById("password");
var eye=document.getElementById("eye");





// ---- FONCTION
function password(){
    if (psswrd.type === "password") {
    psswrd.type = "text";
  } else {
    psswrd.type = "password";
  }
}
function changeImg(){
 if (eye.className=="fa-solid fa-eye")
 {
  eye.className="fa-solid fa-eye-slash";
   } 
   else
  {
   eye.className="fa-solid fa-eye";
  }
}




// ---- GESTIONNAIRE D'ÉVÈNEMENTS
eye.addEventListener('click', password);
eye.addEventListener('click', changeImg);