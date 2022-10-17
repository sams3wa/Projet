<?php
require_once 'services/db.php';


class register{

    //Declaration variable
    public $id = null;
    public $name = null;
    public $email = null;
    public $password = null;
    public $errors = [];



    //creation methode SET/GET
    public function getid(){
        return $this->id;
    }

    public function setid($id){
        $this->id = $id;
    }

    public function getName(){
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
    }
    
    public function getEmail(){
        return $this->email;
    }

    public function setEmail($email){
        $this->email = $email;
    }
    
    public function getPassword(){
        return $this->password;
    }

    public function setPassword($password){
        $this->password = $password;
    }


    //creation methodes de verification
    public function validateName(){

        

        $pdo = getConnect();
        $pdoRequest = $pdo->prepare('SELECT Users.id FROM Users WHERE Users.name= :name');
        $pdoRequest -> bindValue('name', $this->name);
        $pdoRequest -> execute();

        //verifie si la longueur de name ne depasse pas 255 charactere
        if(strlen($this->name)>255){
            $this->errors []= "Le nom ne doit pas excéder 255 charactères.";
        }
        
        
        
        //verifie si il y a quelque chose d'ecris dans l'input
        if(strlen($this->name)<1){
            $this->errors []= "Veuillez renseigner votre nom.";
        }

        return $this->errors;

    }
    
    public function validateEmail(){

       

        $pdo = getConnect();
        $pdoRequest = $pdo->prepare('SELECT Users.id FROM Users WHERE Users.email= :email');
        $pdoRequest -> bindValue('email', $this->email);
        $pdoRequest -> execute();
        
        
        
        //verifie si l'email est deja utilisé
        if ($pdoRequest->rowCount()>0){
            $this->errors []= "«{$this->email}» est déjà utilisé ";
        }
        
        
        
        
        //verifie si la longueur de name ne depasse pas 255 charactere
        if(strlen($this->email)>255){
            $this->errors []= "Votre email ne doit pas excéder 255 charactères.";
        }
        
        
        //verifie si il y a quelque chose d'ecris dans l'input
        if(strlen($this->email)<1){
            $this->errors []= "Veuillez renseigner votre email.";
        }

        return $this->errors;

    }
    
    public function validatePassword(){

        

        $pdo = getConnect();
        $pdoRequest = $pdo->prepare('SELECT Users.id FROM Users WHERE Users.password= :password');
        $pdoRequest -> bindValue('password', $this->password);
        $pdoRequest -> execute();

        //verifie si la longueur de name ne depasse pas 255 charactere
        if(strlen($this->password)>255){
            $this->errors []= "Votre mot de passe ne doit pas excéder 255 charactères.";
        }
        
        
        //verifie si il y a quelque chose d'ecris dans l'input
        if(strlen($this->password)<1){
            $this->errors []= "Veuillez renseigner votre mot de passe.";
        }

        return $this->errors;

    }
};


