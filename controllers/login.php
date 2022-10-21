<?php
require_once 'models/verifLogin.php';
require_once 'services/db.php';

$errors = [];
$reg=new register();

if(isset($_POST['email']) && isset($_POST['password'])){
    
    
    
    
    
    
    //verification de l'email
    $mail = ucfirst(trim($_POST['email']));

    
    $reg->setEmail($mail);

    $errors = $reg->validateEmail();
    
    
    
    //verification du password
    $pwd = ucfirst(trim($_POST['password']));

    
    $reg->setPassword($pwd);

    $errors = $reg->validatePassword();
   
   
   
   
    // Login l'utilisateur seulement si il a entré le mot de passe correspondant à l'addresse email utilisé
    if(empty($errors)){
        $pdo = getConnect();
        
        $pdoRequest = $pdo->prepare("SELECT password FROM Users WHERE email = :Email");
        $pdoRequest->bindValue(":Email",$_POST['email']);
        $pdoRequest->execute();
        $pwd = $pdoRequest->fetch(PDO::FETCH_ASSOC);
    
        if(password_verify($_POST['password'], $pwd['password'])){
            
            echo "login reussi";
        }
        
        else{
            echo "login raté";
            var_dump($pwd);
        }
    }
    
    
    
}

require 'view/login.html';