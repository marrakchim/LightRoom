<?php

$host ='localhost';
	$user ='root';
	$mdp ='root';
	$dbname='WebProjet';

try{
$bdd = new PDO('mysql:host=localhost;dbname=WebProjet', $user, $mdp, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
}
catch(PDOException $e){
   die('Erreur : '.$e->getMessage());
}

?>