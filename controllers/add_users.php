<?php
require_once 'models/register.php';
require_once 'services/db.php';

$errors = [];
$reg=new register();

if(isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confpassword'])){
    
    
    // verification du nom
    $nom = ucfirst(trim($_POST['pseudo']));

    
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
   if($_POST['password']!=$_POST['confpassword']){
        $errors+= ['erreur'=>'Les mots de passe ne coresspondent pas'];
    }
   
   $motdepasse=password_hash($_POST['password'], PASSWORD_DEFAULT);
   
    //enregistre les données seulement si il n'y a pas de probleme
    if(empty($errors)){
        $pdo = getConnect();
        $pdoRequest = $pdo->prepare("INSERT INTO `Users`( `name`, `email`, `password`) VALUES (:name,:email,:password)");
        $pdoRequest-> bindValue(':name',$_POST['pseudo']  );
       
        
        $pdoRequest-> bindValue( ":email", $_POST['email']);
        
        
        $pdoRequest-> bindValue(":password", $motdepasse );
        $pdoRequest->execute();
    }
    
    
    
}

require 'view/register.html';
