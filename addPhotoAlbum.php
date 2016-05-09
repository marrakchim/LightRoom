<?

$id_photo=$_GET['id_photo'];
$id_album=$_GET['id_album'];
include('connectbdd.php');



$sql= 'INSERT INTO photo_album(id_photo,id_album) VALUES("'.$id_photo.'","'.$id_album.'")';
$req= $bdd->query($sql);



?>