<? session_start(); ?>
    <!DOCTYPE html>

    <html>

    <head>
        <link rel="stylesheet" href="css/accueil.css">
        <meta charset='utf-8'>

    </head>
        

    <body>
        
        
        <? include('menu.php'); ?>
 

            <div id="container">

                <?
    include('connectbdd.php');
        
    $sql = 'SELECT id FROM following WHERE following.id_follower='.$_SESSION['id'];
    $req= $bdd->query($sql);
    
    $count = $req->rowCount();          
                  
       $rep =""; 
                
    $row = $req->fetchAll();
    if($count !=0){
       $count--; 
                
    for($i=0 ;$i < $count ; $i++){
        
     $rep .= " user_id= {$row[$i]['id']} OR ";
    }
    $rep.=" user_id= {$row[$i]['id']} OR ";
      }
    $rep .=" user_id= {$_SESSION['id']}";
            
           
 
    $sql='SELECT * FROM images WHERE'.$rep.' ORDER BY im_date DESC,im_heure DESC';
                
    $req= $bdd->query($sql);
                
    while($row = $req->fetch()){
        
        $sql =" SELECT * FROM user WHERE id={$row['user_id']}";
        $req1= $bdd->query($sql);
        $row1 = $req1->fetch();
        
       ?>
                    <div id="container_img">

                        <div id="info_user">
                            <img id="image_arrondi" href="profil.php?id=<? echo $row1['']; ?>" src=<? echo $row1[ 'im_srcp']; ?> >
                            <p>
                                <a href="<? echo 'profil.php?id='.$row1['id'];?>"><? echo $row1['pseudo'];?></a>
                            </p>

                            <p>
                                <? include('comparaisonHeure.php'); ?>
                            </p>
                        </div>

                        <div id="img_user">
                            <img src="<? echo $row['im_src'] ;?>">
                            <span class="text-content">
                            <?php
    
                        echo "<div id='EXIF'>";

                            
                            $filename = $row['im_src'];


                            $exif = exif_read_data($filename, 'IFD0');

                            echo $exif===false ? "Aucun en-tête de donnés n'a été trouvé.<br />\n" : "L'image contient des en-têtes<br />\n";
                            $exif = exif_read_data($filename, 0, true);


                            echo "<div id='infosEXIF'>";

                            foreach ($exif as $key => $section)
                                {
                                foreach ($section as $name => $val)
                                {

                                        try
                                        {
                                            echo "$key.$name: $val<br />\n";
                                        }
                                        catch(Exception $e)
                                        {

                                        }

                                }
                                }

                                echo "</div>";

                        echo "</div>";

                    ?>
                                </span>
                            
                        </div>
                    </div>
                    </br>
                    <?
    }
                

                
        ?>


            </div>
    </body>

    </html>