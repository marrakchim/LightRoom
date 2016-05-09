<link href="./css/photoProfil.css" rel="stylesheet">

<script src="./js/jquery.min.js"></script>
<script src="./js/jquery.form.js"></script>
<script src="./js/profil_ajouterPhoto.js"></script>

<script src="js/follow.js">
</script>



<div id="info_user">

    <?
    	include('connectbdd.php');
       
    
    $del = $bdd->prepare('SELECT * FROM images WHERE user_id ='.$id);
    $del->execute();
    
    $count = $del ->rowCount();
	
		$sql = 'SELECT * FROM user WHERE id = '.$id; 
		$req = $bdd->query($sql);
		$row = $req->fetch();
    
    $del1= $bdd->prepare('SELECT * FROM album WHERE id_user ='.$id);
     $del1->execute(); 
    $count1 = $del1 ->rowCount();

    if($id == $_SESSION['id'])
    {
       ?> <div id="imgContainer">
            <form enctype="multipart/form-data" action="upload_photo_profil.php" method="post" name="image_upload_form" id="image_upload_form">
                <div id="imgArea"><img src=<? echo '"'.$row[ 'im_srcp']. '"'; ?>>
                    <div class="progressBar">
                        <div class="bar"></div>
                        <div class="percent">0%</div>
                    </div>
                    <div id="imgChange"><span>Modifier</span>
                        <input type="file" accept="image/*" name="image_upload_file" id="image_upload_file">
                    </div>
                </div>
            </form>
        </div>


        <div>
            <p id="username"><? echo $row['pseudo'] ?>
            </p>

            <p> Nombre de followers : 
                <? echo $row['nb_follower'] ?>
            </p>
            <p>Nombre de photos : <span id="nb_photo"><? echo $count ?></span></p>
            <p>Nombre d'albums :<? echo $count1 ?> </p>
        </div>


<?
    }
    else {
        ?>



    <?
        
		include('connectbdd.php');
     $del = $bdd->prepare('SELECT * FROM images WHERE user_id ='.$id);
    $del->execute();
    
    $count = $del->rowCount();
		$sql = 'SELECT * FROM user WHERE id = '.$id; 
		$req = $bdd->query($sql);
		$row = $req->fetch();

		?>
        <div id="imgContainer">
            <img id="image_arrondie" src=<? echo '"'.$row[ 'im_srcp']. '"'; ?> >


        </div>
        <div>
            <p id="username">
                <? echo $row['pseudo'] ?>
            </p>
            <?  
                $req = $bdd->prepare('SELECT * FROM following WHERE id = :id AND id_follower = :id_follower');
                $req->execute(array('id' => $id, 'id_follower' => $_SESSION['id']));

                $resultat = $req->fetch();
                ?>
                
            <!-- Quand l’utilisateur appuie sur ce bouton, il choisit de suivre ou pas un autre utilisateur. -->
            
            
                <button id="follow" href="follow.php?id=<? echo $id ?>">
                    <? if($resultat) {
                echo "Suivi";
            } else {
                echo "Suivre";
            }?>
                    
                </button>

                <p>Nombre de followers :<span id="nb_follower"><? echo $row['nb_follower'] ?></span></p>
                <p>Nombre de photos :<span id="nb_photo"><? echo $count ?></span></p>
                <p>Nombre d'albums :</p>
        </div>




        
<?  } ?>
</div>


       