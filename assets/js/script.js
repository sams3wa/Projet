import Form from "./Form.js"

let fields = {
 name:"",
 mail:"",
 pwd:"",
 confpwd:"",
};


//recupere les inputs

let name = document.getElementById('pseudo');
let mail = document.getElementById('email');
let pwd = document.getElementById('password');
let confpwd = document.getElementById('confpassword');
let submit = document.getElementById('submit');




// instancie la class form
let form = new Form



//////////////////////////////////

//attribut les valeurs des inputs au tableau et verifie les erreurs  
window.addEventListener("DOMContentLoaded", function(){
 submit.addEventListener('click',function(e){
    
    fields= [];
    fields.name=name.value;
    fields.mail=mail.value;
    fields.pwd=pwd.value;
    fields.confpwd=confpwd.value;
   
   
   
   ///////
     contact(fields, e)
    
});

 

////////////////////////////////

//réattribut la couleur d'origine a l'input où l'utilisateur ecris 
name.addEventListener("keydown", function(){
  name.style.background= ""

 
})

mail.addEventListener("keydown", function(){
  mail.style.background= ""
  
 
})

pwd.addEventListener("keydown", function(){
  pwd.style.background= ""

 
})
confpwd.addEventListener("keydown", function(){
  confpwd.style.background= ""

 
})})





//////////////////////////////////


//fonction pour changement de couleur des inputs en cas d'erreur 

function contact(objet, e){
 
 
 
 
   if(form.verifEmail(objet.mail) ===false){
   mail.style.background= "#EFA79D";
  e.preventDefault();
  
  }
  else{
   mail.style.background= "";
 
  }
 
 
 
   if(objet.name ===""){
   name.style.background= "#EFA79D";
   e.preventDefault();
  
  }
   else{
   name.style.background= "";
   
  }
 
 
 
 
   if(objet.confpwd !=objet.pwd){
   confpwd.style.background= "#EFA79D";
   e.preventDefault();
  
  } 
   else{
   confpwd.style.background= ""
  
  }
   if(objet.pwd ===""){
   pwd.style.background= "#EFA79D";
   e.preventDefault();
  
  } 
   else{
   pwd.style.background= "";
  
  }
 
}

