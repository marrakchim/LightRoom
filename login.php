<?php
 session_start(); 

// on se connecte à la base de donnée
include('connectbdd.php');
/// Hachage du mot de passe

  $pseudo = $_POST['pseudo'];
  $pass_hache = MD5($_POST['password']);

// Vérification des identifiants
$req = $bdd->prepare('SELECT id,im_srcp,us_admin FROM user WHERE pseudo = :pseudo AND mdp = :mdp');
$req->execute(array('pseudo' => $pseudo, 'mdp' => $pass_hache));

$resultat = $req->fetch();

if (!$resultat)
{
     header('Location: index.php?error=1'); 
     session_destroy();
}
else
{
  	
    $_SESSION['id'] = $resultat['id'];
    $_SESSION['admin']=  $resultat['us_admin'];
    $_SESSION['im_profil'] = $resultat['im_srcp'];
    $_SESSION['pseudo'] = $pseudo;
    
    header('Location: accueil.php');  

}

  ?>