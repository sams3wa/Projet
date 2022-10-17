<?php
require_once 'models/register.php';
require_once 'services/db.php';

$errors = [];
$reg=new register();

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])){
    
    
    // verification du nom
    $nom = ucfirst(trim($_POST['name']));

    
    $reg->setName($nom);

    $errors = $reg->validateName();
    
    
    
    
    //verification de l'email
    $mail = ucfirst(trim($_POST['email']));

    
    $reg->setEmail($mail);

    $errors = $reg->validateEmail();
    
    
    
    //verification du password
    $pwd = ucfirst(trim($_POST['password']));

    
    $reg->setPassword($pwd);

    $errors = $reg->validatePassword();
   
   
   
   
    //enregistre les données seulement si il n'y a pas de probleme
    if(empty($errors)){
        $pdo = getConnect();
        $pdoRequest = $pdo->prepare("INSERT INTO `Users`( `name`, `email`, `password`) VALUES ('".$_POST['name']."','".$_POST['email']."','".$_POST['password']."')");
       // $pdoRequest-> bindValue($_POST['name'], $nom );
       
        
        //$pdoRequest-> bindValue($_POST['email'], $mail );
        
        
        //$pdoRequest-> bindValue($_POST['password'], $pwd );
        $pdoRequest->execute();
    }
    
    
    
}

require 'view/addUsers.html';
