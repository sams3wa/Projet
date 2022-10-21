<?php


// On crée les variables avec comme données la base de donnée, le port, le nom, mdp
const DB_HOST = 'db.3wa.io';
const DB_PORT = '3306';
const DB_NAME = 'maximilienmbaye_projetFramework';
const DB_USERNAME = 'maximilienmbaye';
const DB_PASSWORD = '030da881f38decf9259cd3d2df897fb0';

// On crée une fonction qui va nous connecter a la base de donnée
function getConnect(): \PDO
    {
    // la méthode try est que si il n'y a pas d'erreur la function s'execute normalement sans passer par le catch
        try
    {
        return new PDO(
       'mysql:host='. DB_HOST . ';port=' . DB_PORT . ';dbname='. DB_NAME,
       DB_USERNAME,DB_PASSWORD) ;
    }

    // Si il y a une erreur dans la connexion a la base de donnée l'execution du code s'arrete a la méthode catch
    catch (Exception $e)
    {
        die('Erreur : ' . $e->getMessage());
    }
   
}


