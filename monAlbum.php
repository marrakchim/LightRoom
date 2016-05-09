<? session_start(); ?>
<html>


<head>
	<meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/profil.css">
    <link rel="stylesheet" type="text/css" href="css/albums.css">
    
     <link href="lightbox/dist/css/lightbox.css" rel="stylesheet">
    
    <link href="./css/photoProfil.css" rel="stylesheet">

<script src="./js/jquery.min.js"></script>
<script src="./js/jquery.form.js"></script>
    
     

	<title>Mes albums</title>
    

</head>

<body>
    
    <? $id= $_GET['id'];?>
    

     
    <? include('menu.php'); ?>
    
<? include('info_user.php'); ?>
    
   <div id='allPhotos'>
    <div id="haut_album">
    <div id="titlePhotos">Mon album</div>
        
         <? if( $id == $_SESSION['id'] ){
    ?>
             <a id="ajouterPhotoAlbum" >Ajouter une photo à l'album</a>
          <a href="albums.php?id= <? echo $id?>" id="retourAlbums">Retour aux albums</a>
        <?
}
        else{
            ?>
             <a href="profil.php?id= <? echo $id?>" id="retourAlbums">Retour aux albums</a>
        <?
        }
        
        ?>
       </div>
    
  
       
   <div id="photoAlbum">
    
   <?php

       include('connectbdd.php');


       $id_album=$_GET['id_album'];
        
        ?>
       
<?
//AFFICHER TOUTES LES PHOTOS DE L'ALBUM EN COURS
    
                    $rqst='SELECT id_photo FROM photo_album WHERE id_album='.$id_album;
                    $result1 = $bdd->query($rqst);
                    
                    
                    
                    $count = $result1->rowCount();
                    if($count == 0)
                    {
                        echo "<div id='noPhoto'> Pas de photos dans cet album</div>";
                    }
                    
                    else{
                    while( $row= $result1->fetch())
                    {  
                        $reqst1 = 'SELECT * FROM images WHERE id='.$row['id_photo'];
                    
                        $result2 = $bdd->query($reqst1); 
                      
                        while($row1 = $result2->fetch() )   
                        {
        ?>
            <div class="photo"> 
                    <ul class="container_img">
                        <li>
                            <a href="<? echo $row1['im_src'] ;?>" data-lightbox="image-1" data-title="Titre : <? echo  $row1["im_titre"]."<p>"; ?>
                            Description : <? echo   $row1["im_description"]."</p>"; ?>">
                             
                        <img id='img1' src=<? echo $row1['im_src'];?> >
                                </a>
                            
                             <? if( $id == $_SESSION['id'] ){
    ?>
                            
                        <a class="deletePhotoAlbum" href="<? echo 'deletePhotoFromAlbum.php?id_photo='.$row['id_photo'].'&id_album='.$id_album;?>"><span class="suppr"><img  id="corbeille"class="text-content"src="css/corbeille.png" ></span>
                        </a>
                            
                            <?
        }
            ?>
                 </li>
                </ul>
            </div>
               
		
                     
        <?
                    
                        }
                        }
                    }
              
        ?>
       
       <div id='boutons'>
             <div id='select'>Selectionnez les photos que vous souhaitez voir dans votre album</div>
        
        <button id="userPhotosButton">Mes photos</button>
        <button id="allUserPhotosButton">Toutes les photos</button>
        
        </div> 
        
        <!--Ne sera affiché que si on appuie sur le bon bouton -->
        
        <div id="photos_user" >
        <?
          include('connectbdd.php');

          $sql = 'SELECT im_src,id FROM images WHERE user_id = '.$_SESSION["id"]; 
          $req = $bdd->query($sql);


          while($row = $req->fetch()){ 

            ?> 	
                <div class="photo"> 
                    <ul class="container_img">
                        <li>
                            <img id='img1' src=<? echo $row['im_src'];?>>

           
    
                            <a class="add_photo"href="<? echo 'addPhotoAlbum.php?id_photo='.$row['id'].'&& id_album='.$id_album;?>">
                                 
                
          
                                <span class="add"><img  id="add"class="text-content"src="add.png" ></span>
                                </a>
                        </li>
                    </ul>
                </div>
             
            <?
                
            } 

        ?>


        </div>
       
          <div id="photos_all_user" >
        <?
          include('connectbdd.php');

          $sql = 'SELECT im_src,id FROM images'; 
          $req = $bdd->query($sql);


          while($row = $req->fetch()){ 

            ?> 	
                <div class="photo"> 
                    <ul class="container_img">
                        <li>
                            <img id='img1' src=<? echo $row['im_src'];?>>

 
                            <a class="add_photo"href="<? echo 'addPhotoAlbum.php?id_photo='.$row['id'].'&id_album='.$id_album;?>">
          
                                <span class="add"><img  id="add"class="text-content"src="add.png" ></span>
                                </a>
                        </li>
                    </ul>
                </div>
                <?

            } 

        ?>
        
       
      
        
        </div>
        
        
        
        
        <a id="save" href="<? echo 'monAlbum.php?id_album='.$id_album.'&& id='.$id;?>"> Sauvegarder cet album</a>
    </div>
    
      <? if( $id == $_SESSION['id'] ){
    ?>
       <a class="supprimerAlbum" href="<? echo 'deleteAlbum.php?id_album='.$id_album.'&& id='.$id ?>">Supprimer l'album </a>
       <?
} ?> 
        

</div>


  </div>
       
           

   <footer></footer>

    

<script src="js/jquery.min.js"></script> 
    
    <script>
    
    $(document).ready(function(){

     $("#ajouterPhotoAlbum").click(function(){
       
         document.getElementById('boutons').style.display='block';

   })
  });
    
    </script>

<script src="js/addPhotoAlbum.js"> </script>
<script>
    
    
$(document).ready(function(){

     $(".deletePhotoAlbum").click(function(){
  event.preventDefault();
         var href = $(this).attr("href");
         var btn = this;
       

        $.ajax({
          type: "GET",
          url: href,
          success: function(response) {
             
          if (response == "Success")
          {
             $(btn).closest('div').fadeOut("slow");
              
            
          }
          else
          {
            alert("Error");
          }

       }
    });

   })
  });
    
    
    </script>
<script src="lightbox/dist/js/lightbox.js"></script>

</body>
    
</html>