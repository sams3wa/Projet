<?php

class UsersInfo{
    
    
    ///////////////////////////////////////
    public $id = null;
    
    public $pseudo = null;
    
    public $email = null;
    
    public $password = null;
    
    public $statut = null ;
    
    
   
    
    
    
    //////////////////////////////////////////
    public function userGetEmail(){
        return $this->email;
    }

    public function userSetEmail($email){
        $this->email = $email;
    }
     
    ////////////////////////////////////////
    public function userGetid(){
        echo var_dump($this->id);
        return $this->id;
    }

    public function userSetid(){
        $pdo = getConnect();
        $pdoRequest = $pdo->prepare("SELECT Users.id FROM `Users` WHERE Users.email = :email");
        $pdoRequest -> bindValue(':email', $this->email);
        $pdoRequest -> execute();
        $id = $pdoRequest->fetch(PDO::FETCH_ASSOC);
        return $this->id = $id['id'];
    }
    
    
    
    ///////////////////////////////////////
    public function userGetPseudo(){
        return $this->pseudo;
    }

    public function userSetPseudo(){
        $pdo = getConnect();
        $pdoRequest = $pdo->prepare("SELECT Users.name FROM `Users` WHERE Users.email = :email");
        $pdoRequest -> bindValue(':email', $this->email);
        $pdoRequest -> execute();
        $pseudo = $pdoRequest->fetch(PDO::FETCH_ASSOC);
        $this->pseudo = $pseudo['name'];
    }
    
    
    //////////////////////////////////////////
    public function userGetPassword(){
        return $this->password;
    }

    public function userSetPassword($password){
        $this->password = $password;
    }
    
    
    
    ////////////////////////////////////////////
    public function userGetStatut(){
        return $this->statut;
       
        
    }

    public function userSetStatut(){
        $pdo = getConnect();
        $pdoRequest = $pdo->prepare("SELECT Users.id FROM Users INNER JOIN avoir     ON Users.id = avoir.id INNER JOIN role     ON role.id = avoir.id_role WHERE role.statut = 'admin'");
        $pdoRequest -> execute();
        $ids = $pdoRequest->fetch(PDO::FETCH_ASSOC);
        $role = "   pas admin   ";
        foreach($ids as $id){
            
            if($id== $this->id){
                $role="admin";
                header("Location: index.php?page=accueil");
                die();
            }
        }
        echo $role;
    }
    
    
}