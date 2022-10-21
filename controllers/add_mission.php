<?php

require_once 'models/mission.php';
require_once 'services/db.php';
require 'models/userInfo.php';


$errors = [];
$newMission=new AddMission();
$user= new UsersInfo();





if(isset($_POST['name']) && isset($_POST['mission']) ){
    
    
    // verification du nom
    $nom = ucfirst(trim($_POST['name']));

    
    $newMission->setMissionName($nom);

    $errors = $newMission->validateMissionName();
    
    
    
    
    //verification de l'email
    $description = ucfirst(trim($_POST['mission']));

    
    $newMission->setDescription($description);

    $errors = $newMission->validateMissionDescription();
    
    

   
    //enregistre la mission seulement si il n'y a pas de probleme
    if(empty($errors)){
        $pdo = getConnect();
        $pdoRequest = $pdo->prepare("INSERT INTO `missions`( `nom`, `description`) VALUES (:name,:description)");
        $pdoRequest-> bindValue(':name',$_POST['name']  );
       
        $pdoRequest-> bindValue(":description", $description );
        
        $pdoRequest->execute();
        
        
        
        
        $pdoRequest = $pdo->prepare("SELECT id FROM missions WHERE description = :description");
       
        $pdoRequest-> bindValue(":description", $description );
        
        $pdoRequest->execute();
        
        $ids = $pdoRequest->fetch(PDO::FETCH_ASSOC);
        
        
        foreach($ids as $id){
            
        $pdoRequest = $pdo->prepare("INSERT INTO `creer`( `id`, `id_Users`) VALUES (:id, :users_id)");
        $pdoRequest-> bindValue(':id',$id );
       
        $pdoRequest-> bindValue(":users_id", $user->userGetid() );
        
        $pdoRequest->execute();
        }
        
        
    }
    
    
    
}

require "view/missions.html";