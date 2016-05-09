<?

$id_album=$_GET['id_album'];
$id= $_GET['id'];

include('connectbdd.php');
if(isset($_GET['id_album'])) {
 $sql = 'SELECT * FROM album WHERE id ='.$id_album;

 $req= $bdd->query($sql);
 $row =$req->fetch();

  if($row) {
         
      
	 $bdd->exec('DELETE FROM album WHERE id =' .$id_album);
      
    $bdd->exec('DELETE FROM photo_album WHERE id_album ='.$id_album);
         
      echo "albums.php?id={$id}";
      
        } else {
          echo "Error";
        }


}
else {
            echo "Error isset";


        }



?>

