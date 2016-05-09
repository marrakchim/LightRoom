<?php session_start(); 

// Constantes
//define('TARGET', 'MAMP/htdocs/Test/Images/');    // Repertoire cible
define('TARGET', './images');    // Repertoire cible
define('MAX_SIZE', 10000000);    // Taille max en octets du fichier
define('WIDTH_MAX', 20000);    // Largeur max de l'image en pixels
define('HEIGHT_MAX', 20000);    // Hauteur max de l'image en pixels

// Tableaux de donnees
$tabExt = array('jpg','gif','png','jpeg');    // Extensions autorisees
$infosImg = array();

// Variables
$path='/Applications/MAMP/htdocs/PW/images';
$src = 'images';
$extension = '';
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
            
              //connexion à la base de donnée 
              $host ='localhost';
               $user ='root';
               $mdp ='root';
               $dbname='WebProjet';

           $bdd = new PDO('mysql:host=localhost;dbname=WebProjet;charset=utf8', $user, $mdp);

           //on récupere les variables

           $date = date("Y-m-d");
           $heure = date("H:i:s");
           $path_src =  $src.'/'.$nomImage;
         if(isset($_POST['titre']) && isset($_POST['description']) && isset($_POST['visible'])){
                
            $titre = $_POST['titre'];
            $description = $_POST['description']; 
            $visible= $_POST['visible'];
            
            }
           // on insere les varriables dans la bdd

           $bdd->exec('INSERT INTO images(user_id,im_date,im_heure, im_chemin,im_src,im_description,im_titre,visible) VALUES("'.$_SESSION['id'].'","'.$date.'","'.$heure.'","'.$path_photo.'","'.$path_src.'","'.$description.'","'.$titre.'","'.$visible.'")');
           
            $message = "ok";

          } 

   }
   else
   {
              // Sinon on affiche une erreur systeme
    $message = "Problème lors de l'upload !";


}
}
else
{
  $message = "Une erreur interne a empêché l'uplaod de l'image";
}
}
else
{
          // Sinon erreur sur les dimensions et taille de l'image
     $message = "Erreur dans les dimensions de l'image !";
}
}
else
{
        // Sinon erreur sur le type de l'image
   $message = "Le fichier à uploader n'est pas une image !";
   print_r($_FILES); 
}
}
else
{
      // Sinon on affiche une erreur pour l'extension
 $message = "L'extension du fichier est incorrecte !";
}
}
else
{
    // Sinon on affiche une erreur pour le champ vide
    $message = "Veuillez remplir le formulaire svp !";
}


echo $message;


?>