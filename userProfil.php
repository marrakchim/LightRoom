
</script>

<title>Profil </title>



<? include('info_user.php'); ?>


<div id="allPhotos">

    <div id="haut_album_user">
        <div id="titlePhotos">Photos</div>
        <div id="titleAlbums">Albums</div>
    </div>

    <div id="photos_user">


        <?
  include('connectbdd.php');

  $sql = "SELECT * FROM images WHERE user_id = {$id} AND visible = 1"; 
$req = $bdd->query($sql);

$count = $req->rowCount();
if($count !=0){
while($row = $req->fetch()){ 

	?>
            <div class="photo">
                <ul class="container_img">
                    <li> 
                        <a href="<? echo $row['im_src'] ;?>" data-lightbox="image-1" data-title="Titre : <? echo  $row["im_titre"]."<p>"; ?>
                            Description : <? echo   $row["im_description"]."</p>"; ?>">
                             
                        <img id='image' src=<? echo $row[ 'im_src'];?> >
                                </a>
                    </li>
                </ul>
            </div>
            <?
        
        
}
    } else {
    echo " <div id='noPhoto'>Pas de photo visible encore</div>";
}
?>
    </div>
</div>
<div id="allPhotos">

    <div id='tousLesAlbums_user'>
        <?php

//AFFICHER TOUTES LES ALBUMS DE L'UTILISATEUR 
    
          include('connectbdd.php');

            $sql='SELECT * FROM album WHERE id_user='.$id;
            $result= $bdd->query($sql);
         
            $count = $result->rowCount();

            while($row= $result->fetch())
            {
                if($count!=0)
                {
                     
        ?>

            <a id='unAlbum' href="<? echo 'monAlbum.php?id_album='.$row['id'].'&& id='.$id;?>">
                <? if($row['titre']==''){ 
                        echo "Sans titre ";
                        echo $row['id'];
                        }
                    else{ echo $row['titre'];}
                ?>
                    </br>
            </a>


            <?
            }
                
                }
    if($count==0) echo "<div id='noAlbums'>Pas d'albums</div>";
            
    
     
             
        ?>

    </div>
</div>

<script src="js/jquery.min.js"></script>

<script src="js/follow.js"></script>

<script>
    $(document).ready(function () {

        $("#titleAlbums").click(function () {

            document.getElementById('tousLesAlbums_user').style.display = 'flex';
            document.getElementById('photos_user').style.display = 'none';
            document.getElementById('titleAlbums').style.textDecoration = "underline";
            document.getElementById('titlePhotos').style.textDecoration = "none";


        })
    });
</script>

<script>
    $(document).ready(function () {

        $("#titlePhotos").click(function () {

            document.getElementById('tousLesAlbums_user').style.display = 'none';
            document.getElementById('photos_user').style.display = 'flex';
            document.getElementById('titlePhotos').style.textDecoration = "underline";
            document.getElementById('titleAlbums').style.textDecoration = "none";

        })
    });
</script>