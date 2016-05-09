<? session_start(); ?>
<html>


<head>
	<meta charset="utf-8" />
    <link rel="stylesheet" type="text/css" href="css/profil.css">
    <link rel="stylesheet" type="text/css" href="css/albums.css">
    <link href="./css/photoProfil.css" rel="stylesheet">

	<title>Mes albums</title>
    

</head>

<body>
    
    <?
     $id= $_GET['id'];
    ?>
         
    <? include('menu.php'); ?>
       
     <? include('info_user.php'); ?>
         
    
    <div id="allAlbums">

        <div id="titleAlbums">Mes albums</div>
        
        <div id='creerUnAlbum'>
            
            <p class="crea" >Nouvel album</p>
           <form role="form" id="monForm" action="addAlbum.php" method="post">
                    <input type="text" id="nomAlbum" name="nomAlbum" placeholder="Entrez le nom de l'album" value="" />
               </br>
                    <button type="submit" class="button_crea">Créer</button>
            </form>
            
            <p id='annuler'>Annuler</p>
        </div>
        
       
     <p class="voir"> Voir tous mes albums</p>
        
        <div id='tousLesAlbums'>
    <?php

//AFFICHER TOUTES LES ALBUMS DE L'UTILISATEUR 
    
          include('connectbdd.php');

            $sql='SELECT * FROM album WHERE id_user='.$_SESSION['id'];
            $result= $bdd->query($sql);
         
            while($row= $result->fetch())
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
     
             
        ?>
         
    </div>  


        
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

            <?php
    
                include('connectbdd.php');



                $sql='SELECT id FROM album ORDER BY id DESC LIMIT 1';
                $result = $bdd->query($sql);


                while($alb = $result->fetch())
                {
                  
    
                ?>
    
                            <a class="add_photo"href="<? echo 'addPhotoAlbum.php?id_photo='.$row['id'].'&id_album='.$alb['id'];?>">
                                   <?
                
            } 

        ?>
                                <span class="add"><img  id="add"class="text-content"src="add.png" ></span>
                                </a>
                        </li>
                    </ul>
                </div>
             
            <?
                
            } 

        ?>


        </div>
    </div>
    
    <div id="allPhotos">
    
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

 <?php
    
                include('connectbdd.php');



                $sql='SELECT id FROM album ORDER BY id DESC LIMIT 1';
                $result = $bdd->query($sql);


                while($alb = $result->fetch())
                {     
    
                ?>
    
                            <a class="add_photo"href="<? echo 'addPhotoAlbum.php?id_photo='.$row['id'].'&id_album='.$alb['id'];?>">
                                   <?
                
            } 
            ?>
                                <span class="add"><img  id="add"class="text-content"src="add.png" ></span>
                                </a>
                        </li>
                    </ul>
                </div>
                <?

            } 

        ?>
        
       
      
        
        </div>
        
        
            <?php
    
                include('connectbdd.php');



                $sql='SELECT id FROM album ORDER BY id DESC LIMIT 1';
                $result = $bdd->query($sql);


                while($alb = $result->fetch())
                {
                  
    
                ?>
        
        <a id="save" href="<? echo 'monAlbum.php?id_album='.$alb['id'].' && id='.$id;?>"> Sauvegarder cet album</a>
        
        <?
                }
        ?>
        
    </div>


    </div>
    
    
   
 

   <footer></footer>

    

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 


<script src="js/addPhotoAlbum.js"> </script>
    

</body>
    
</html>