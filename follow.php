<?
session_start();
include('connectbdd.php');

//On récupère l'id de l'utilisateur sur la page
$id=$_GET['id'];


// Vérification des identifiants
$req = $bdd->prepare('SELECT * FROM following WHERE id = :id AND id_follower = :id_follower');
$req->execute(array('id' => $id, 'id_follower' => $_SESSION['id']));

$resultat = $req->fetch();
// Si lorsque l'utilisateur a cliqué sur le bouton, il suivait déjà la personne
if($resultat) {
    //On supprime le lien following entre eux
    $req = $bdd->prepare('DELETE  FROM following WHERE id = :id AND id_follower = :id_follower');
   $req->execute(array('id' => $id, 'id_follower' => $_SESSION['id']));
    
    // Vérification des identifiants
$req = $bdd->prepare('SELECT * FROM following WHERE id = :id');
$req->execute(array('id' => $id));

$count = $req->rowCount();
    // Et on met à jour la table user       
     $bdd->exec("UPDATE user 
    SET nb_follower ='{$count}'
     WHERE id= '{$id}';");  
    echo "Success";
    
} else {
    // Si lorsque l'utilisateur a cliqué sur le bouton, il ne suit pas la personne
    //On crée le lien entre eux
    $bdd->exec('INSERT INTO following(id, id_follower) VALUES("'.$id.'", "'.$_SESSION['id'].'")');
    
    $req = $bdd->prepare('SELECT * FROM following WHERE id = :id');
    $req->execute(array('id' => $id));

    $count = $req->rowCount();
    //on met à jour la table         
     $bdd->exec("UPDATE user 
    SET nb_follower ='{$count}'
     WHERE id= '{$id}';");
 echo "Error";    
}


?>