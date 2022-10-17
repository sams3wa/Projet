<?php

const DB_HOST = 'db.3wa.io';
const DB_PORT = '3306';
const DB_NAME = 'maximilienmbaye_projetFramework';
const DB_USERNAME = 'maximilienmbaye';
const DB_PASSWORD = '030da881f38decf9259cd3d2df897fb0';


function getConnect(): \PDO
{
   return new PDO(
       'mysql:host='. DB_HOST . ';port=' . DB_PORT . ';dbname='. DB_NAME,
       DB_USERNAME,
       DB_PASSWORD
   ) ;
}
