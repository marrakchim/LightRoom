<?php 
 
include('connectbdd.php');

 	$nom = htmlspecialchars($_POST["nom"]);
    $prenom = htmlspecialchars($_POST["prenom"]);
    $date = htmlspecialchars($_POST["date"]);
    $email = htmlspecialchars($_POST["email"]);
    $pseudo = htmlspecialchars($_POST["pseudo"]);
    $mdp = MD5(htmlspecialchars($_POST["password1"]));
    $photo= "images/userlambda.png";


$sql ='SELECT pseudo FROM user WHERE pseudo LIKE ?';
$rep = $bdd->prepare($sql);
$rep->execute(array($pseudo));
$count = $rep->rowCount();

if($count == 0) {
// On ajoute une entrée dans la table identification
$bdd->exec('INSERT INTO user(nom, prenom, naissance, mail, pseudo, mdp,im_srcp) VALUES("'.$nom.'", "'.$prenom.'","'.$date.'","'.$email.'","'.$pseudo.'","'.$mdp.'","'.$photo.'")');

 
   if(isset($_POST["id"])) {
    
    header('Location: admin.php');
      } else{
       header('Location: index.php?error=2'); 
            }
} else {
    header('Location: inscription.php?error=1');
}


?>