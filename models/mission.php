<?php
require_once 'services/db.php';


class AddMission{

    //Declaration variable
    public $id = null;
    public $name = null;
    public $description = null;
    public $time = null;
    public $errors = [];



    //creation methode SET/GET
    public function getMissionid(){
        return $this->id;
    }

    public function setMissionid($id){
        $this->id = $id;
    }

    public function getMissionName(){
        return $this->name;
    }

    public function setMissionName($name){
        $this->name = $name;
    }
    
    public function getDescription(){
        return $this->description;
    }

    public function setDescription($description){
        $this->description = $description;
    }
    
    public function getTime(){
        return $this->time;
    }

    public function setTime($Time){
        $this->time = $time;
    }


    //creation methodes de verification
    public function validateMissionName(){

        

        $pdo = getConnect();
        $pdoRequest = $pdo->prepare('SELECT missions.id FROM missions WHERE missions.nom= :name');
        $pdoRequest -> bindValue('name', $this->name);
        $pdoRequest -> execute();

        //verifie si la longueur de name ne depasse pas 255 charactere
        if(strlen($this->name)>255){
            $this->errors []= "Le nom ne doit pas excéder 255 charactères.";
        }
        
        
        
        //verifie si il y a quelque chose d'ecris dans l'input
        if(strlen($this->name)<1){
            $this->errors []= "Veuillez renseigner le nom de la mission.";
        }

        return $this->errors;

    }
    
    public function validateMissionDescription(){

       

        $pdo = getConnect();
        $pdoRequest = $pdo->prepare('SELECT missions.id FROM missions WHERE missions.description= :description');
        $pdoRequest -> bindValue('description', $this->description);
        $pdoRequest -> execute();
        
        
        
        //verifie si il y a quelque chose d'ecris dans l'input
        if(strlen($this->description)<1){
            $this->errors []= "Veuillez remplir la description.";
        }

        return $this->errors;

    }
    
    
   
};


