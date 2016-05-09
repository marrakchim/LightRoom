<?

session_start();

include('connectbdd.php');
$reponse = "dommage";


//album : id, titre, description, nb photos

if(isset($_POST['nomAlbum'])) {
   
    if($_POST['nomAlbum'] !== '' ) {
        $reponse = "ok";
     
        $nom = htmlspecialchars($_POST['nomAlbum']);
        $sql= 'INSERT INTO album(id_user,titre) VALUES("'.$_SESSION['id'].'","'.$nom.'")';

        $req= $bdd->query($sql) or die(print_r($bdd->errorInfo()));

    } else {
        $reponse = "Les champs sont vides";
    }
} else {
    $reponse = "Tous les champs ne sont pas parvenus";
     
    
}

echo json_encode(['reponse' => $reponse]);


?>