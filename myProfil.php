

    

<? include('info_user.php'); ?>

       <a href="lireExif.php">exif</a>

<div id="allPhotos">

    <div id="haut_album">
        <div id="mesElements">
            <div id="titlePhotos">Mes photos</div>
            <div id="titleAlbums"><a href="albums.php?id=<? echo $id ?>">Mes albums</a></div>
        </div>
        <a id="boutonHaut" href="ajouterPhoto.php">Ajouter une photo</a>
    </div>

    <div id="photos_user">


        <?
  include('connectbdd.php');

  $sql = 'SELECT * FROM images WHERE user_id = '.$id; 
$req = $bdd->query($sql);


while($row = $req->fetch()){ 

	?>
            <div class="photo">
                <ul class="container_img">
                    <li>
                         <a href="<? echo $row['im_src'] ;?>" data-lightbox="image-1" data-title="Titre : <? echo  $row["im_titre"]."<p>"; ?>
                            Description : <? echo   $row["im_description"]."</p>"; ?>">
                             
                        <img id='image' src=<? echo $row[ 'im_src'];?> >
                                </a>
                        <a class="delete" href="<? echo 'deletePhoto.php?id='.$row['id'];?>"><span class="suppr"><img  id="corbeille"class="text-content"src="css/corbeille.png" ></span>
                        </a>
                    </li>
                </ul>
            </div>
            <?
        
        
        
    }
?>
    </div>
</div>

<script src="js/deletePhoto.js">
</script>