<? session_start(); ?>


    <html>
        
<link href="./css/photoProfil.css" rel="stylesheet">
        
        
<script src="./js/jquery.min.js"></script>
<script src="./js/jquery.form.js"></script>
<script src="./js/profil_ajouterPhoto.js"></script>

<link rel="stylesheet" type="text/css" href="css/profil.css">
<link rel="stylesheet" type="text/css" href="css/ajouterPhoto.css">

    <!--<script type="text/javascript" src="js/affichage.js"></script>-->


    <head>
        <meta charset="utf-8" />
        <title>Ajouter une photo</title>


    </head>

    <body>

        <? include('menu.php');?>

       <div id="info_user">

    <?
    	include('connectbdd.php');
       
    
    $del = $bdd->prepare('SELECT * FROM images WHERE user_id ='.$_SESSION['id']);
    $del->execute();
    
    $count = $del ->rowCount();
	
		$sql = 'SELECT * FROM user WHERE id = '.$_SESSION['id']; 
		$req = $bdd->query($sql);
		$row = $req->fetch();
           
   $del1 =$bdd->prepare('SELECT * FROM album WHERE id_user ='.$_SESSION['id']);
    $del1->execute();
    
    $count1 =$del1->rowCount();
        

		?>


        <div id="imgContainer">
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
            <p id="username">
                <? echo $row['pseudo'] ?>
            </p>
            <p> Nombre de follower :
                <? echo $row['nb_follower'] ?>
            </p>
            <p>Nombre de photos :<span id="nb_photo"><? echo $count; ?></span></p>
            <p>Nombre d'albums :<span id="nb_d'album"><? echo $count1; ?></span></p>
        </div>


</div>


            <div id='ajoutPhoto'>
                <img id="image" src="">

                <form enctype="multipart/form-data" id="uploadForm" method="post" action="uploadPhoto.php">

                    <div class="file_button_container">Choisir un fichier
                        <input name="fichier" type="file" id="upload" onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0]);" />
                    </div>
                    </br>
                    <div>
                    <input name="titre" type="text" placeholder="titre">
                    </div>
                   </br>
                    <div><input name="description" type="text" placeholder="description" >
                    </div>
                     </br>
                    <div>
                        <label for class="visible">Visible</label>
                        <input  class ="visible" name ="visible" type="checkbox" checked>
                    </div>
                 
               
                    </br>


                    <button type="submit" id="enregistrer" name="submit" value="submit"> Enregistrer</button>
                </form>
            </div>





            <footer>
            </footer>

            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
            <script>
                $(document).ready(function () {
                    $('#uploadForm').on('submit', function (e) {

                        // On empêche le navigateur de soumettre le formulaire
                        e.preventDefault();

                        var $form = $(this);
                        var formdata = (window.FormData) ? new FormData($form[0]) : null;
                        var data = (formdata !== null) ? formdata : $form.serialize();

                        $.ajax({
                            url: $form.attr('action'),
                            type: $form.attr('method'),
                            contentType: false, // obligatoire pour de l'upload
                            processData: false, // obligatoire pour de l'upload
                            data: data,
                            success: function (response) {
                                console.log(response);
                                if(response == "ok"){
                                alert("Photo bien chargé");
                                location.href = "profil.php?id=<? echo $_SESSION['id'] ?>";
                                }
                                else alert(response);


                            },
                            error: function (response) {
                                alert(response);
                            }
                        });

                    });
                });
            </script>
    </body>

    </html>