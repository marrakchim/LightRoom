<?php 
 session_start();
include('connectbdd.php');

 	$nom = htmlspecialchars($_POST["nom"]);
    $prenom = htmlspecialchars($_POST["prenom"]);
    $dates = htmlspecialchars($_POST["date"]);
    $mail = htmlspecialchars($_POST["email"]);
    $pseudo = htmlspecialchars($_POST["pseudo"]);

    $bdd->exec("UPDATE user 
    SET nom ='{$nom}',
     prenom ='{$prenom}',
     naissance = '{$dates}',
     mail = '{$mail}',
     pseudo = '{$pseudo}'
     WHERE id= '{$_SESSION['id']}';");



  $_SESSION['pseudo'] = $pseudo;

 
 header('Location: profil.php?id='.$_SESSION['id']);  



?> 
