
import Errors from "./Errors.js"
class Form {
    // On injecte une instance d'erreur dans le constructeur
    constructor(errors) {
        this.error = new Errors;
        this.verif = false
    }
     
      
       verifEmail(fields){
      { 
      var a = "@";
      var extension = ".";
      if(fields.match(a) && fields.match(extension))
      {
      console.log('Your email have accepted : you can try another');
      return this.verif=true;
      }
      else
      {
      console.log('your email is incorrect');
      return this.verif=false;
      }
      }}

       verifAge(fields){
        if ((fields != isNaN) && (fields>0 && fields <=99)){
            console.log('Bien vu');
            return this.verif=true;
        }
        else {
            console.log('Mettez votre âge svp');
            return this.verif=false;
        }
    }

    validate(fields) {
        for (let field of fields) {
            if (!field.value) {
                //this.error.name = 'Form invalide'
                this.error.re = `Same player play again.`
                return this.verif=false;
            }
        }}
    get Error(){
        return this.error.getError();
        
    }
    
   
    
}
    
    

  export default Form
