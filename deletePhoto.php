<?

$id=$_GET['id'];
include('connectbdd.php');
 $sql = 'SELECT * FROM images WHERE id ='.$id;
 $req= $bdd->query($sql);
 $row =$req->fetch();

  if($row) {
         
      unlink($row['im_src']);
	 $bdd->exec('DELETE FROM images WHERE id ='.$id);
         
      echo "Success";
      
        } else {
          echo "Error";
        }




?>
