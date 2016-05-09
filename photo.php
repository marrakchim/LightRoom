<?php session_start(); ?>


<?php
//session_start();

// Constantes
//define('TARGET', 'MAMP/htdocs/Test/Images/');    // Repertoire cible
define('TARGET', './images');    // Repertoire cible
define('MAX_SIZE', 10000000000000);    // Taille max en octets du fichier
define('WIDTH_MAX', 20000);    // Largeur max de l'image en pixels
define('HEIGHT_MAX', 20000);    // Hauteur max de l'image en pixels

// Tableaux de donnees
$tabExt = array('jpg','gif','png','jpeg');    // Extensions autorisees
$infosImg = array();

// Variables
$path='/Applications/MAMP/htdocs/PW/images';
$src = 'images';
$extension = '';
$message = '';
$nomImage = '';


/************************************************************
 * Creation du repertoire cible si inexistant
 *************************************************************/



if( !is_dir($path) ) {
  if( !mkdir($path, 0755,true) ) {
    exit('Erreur : le répertoire cible ne peut-être créé ! Vérifiez que vous diposiez des droits suffisants pour le faire ou créez le manuellement !');
}
}

/************************************************************
 * Script d'upload
 *************************************************************/
if(!empty($_POST))
{
  // On verifie si le champ est rempli
  if( !empty($_FILES['fichier']['name']) )
  {
    // Recuperation de l'extension du fichier
    $extension  = pathinfo($_FILES['fichier']['name'],PATHINFO_EXTENSION);

    // On verifie l'extension du fichier
    if(in_array(strtolower($extension),$tabExt))
    {
      // On recupere les dimensions du fichier
      $infosImg = getimagesize($_FILES['fichier']['tmp_name']);

      // On verifie le type de l'image
      if($infosImg[2] >= 1 && $infosImg[2] <= 1000)
      {
        // On verifie les dimensions et taille de l'image
        if(($infosImg[0] <= WIDTH_MAX) && ($infosImg[1] <= HEIGHT_MAX) && (filesize($_FILES['fichier']['tmp_name']) <= MAX_SIZE))
        {
          // Parcours du tableau d'erreurs
          if(isset($_FILES['fichier']['error']) 
            && UPLOAD_ERR_OK === $_FILES['fichier']['error'])
          {
            // On renomme le fichier
            $nomImage = md5(uniqid()) .'.'. $extension;

            $path_photo = $path.'/'.$nomImage;

            // Si c'est OK, on teste l'upload
            if(move_uploaded_file($_FILES['fichier']['tmp_name'],$path_photo))
            {
              $message = 'Upload réussi !';


              //connexion à la base de donnée 

          try{
               $host ='localhost';
               $user ='root';
               $mdp ='root';
               $dbname='WebProjet';

           $bdd = new PDO('mysql:host=localhost;dbname=WebProjet;charset=utf8', $user, $mdp);

           //on récupere les variables

           $date = date("Y-m-d");
           $heure = date("H:i:s");
           $path_src =  $src.'/'.$nomImage;

           // on insere les varriables dans la bdd

           $bdd->exec('INSERT INTO images(user_id,im_date,im_heure, im_chemin,im_src) VALUES("'.$_SESSION['id'].'","'.$date.'","'.$heure.'","'.$path_photo.'","'.$path_src.'")');
           

          }
          catch(Exception $e)
          {
             die('Erreur : '.$e->getMessage());
        }

   }
   else
   {
              // Sinon on affiche une erreur systeme
    $message = 'Problème lors de l\'upload !';


}
}
else
{
  $message = 'Une erreur interne a empêché l\'uplaod de l\'image';
}
}
else
{
          // Sinon erreur sur les dimensions et taille de l'image
     $message = 'Erreur dans les dimensions de l\'image !';
}
}
else
{
        // Sinon erreur sur le type de l'image
   $message = 'Le fichier à uploader n\'est pas une image !';
   print_r($_FILES); 
}
}
else
{
      // Sinon on affiche une erreur pour l'extension
 $message = 'L\'extension du fichier est incorrecte !';
}
}
else
{
    // Sinon on affiche une erreur pour le champ vide
    $message = 'Veuillez remplir le formulaire svp !';
}
}


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>Index</title>


</head>

<body>

 <? include('menu.php');?>
    
 <p align="center"> Nom d'utilisateur : <?php echo $_SESSION['pseudo']; ?> <?php echo $_SESSION['id']; ?>  </p>
 <?php include('menu.php'); ?>



 <?php
 if( !empty($message) ) 
 {
   echo '<p>',"\n";
   echo "\t\t<strong>", htmlspecialchars($message) ,"</strong>\n";
   echo "\t</p>\n\n";
}
?>
<!-- Debut du formulaire -->
<form enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post"> 

    <fieldset>
        <legend>Formulaire</legend>
        <p>
            <label for="fichier_a_uploader" title="Recherchez le fichier à uploader !">Envoyer le fichier :</label>
            <!--<input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_SIZE; ?>" />-->
            <input name="fichier" type="file" id="fichier_a_uploader" />

            <input type="submit" name="submit" value="Uploader" />
       </p>
  </fieldset>
</form>
<!-- Fin du formulaire -->

<footer>
 <p align="center"> Alexandre Philibeaux    2 Février  2016</p> 
</footer>

</body>     

</html>

