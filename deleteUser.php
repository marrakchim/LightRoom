<?

$id=$_GET['id'];
include('connectbdd.php');
 $sql = 'SELECT * FROM user WHERE id ='.$id;
 $req= $bdd->query($sql);
 $row =$req->fetch();

  if($row) {
         
	 $bdd->exec('DELETE FROM user WHERE id ='.$id);
          echo "Success";
        } else {
          echo "Error";
        }

?>
