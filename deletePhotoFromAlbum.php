<?

$id_photo=$_GET['id_photo'];
$id_album=$_GET['id_album'];
include('connectbdd.php');

 $sql = 'SELECT * FROM photo_album WHERE id_photo ='.$id_photo.' AND id_album=' .$id_album;
 $req= $bdd->query($sql);
 $row =$req->fetch();


if(isset($_GET['id_photo']) && isset($_GET['id_album'])){  
if($row) {
         
	 $bdd->exec('DELETE FROM photo_album WHERE id_photo ='.$id_photo.' AND id_album=' .$id_album);
         
      echo "Success";
      
        } else {
          echo "Error";
        }


}
                
    else echo "probleme isset";

?>
