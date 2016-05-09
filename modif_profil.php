<? session_start(); ?>
<html>

<link rel="stylesheet" type="text/css" href="css/modif_profil.css">

<head>
  <meta charset="utf-8" />
  <title>Modifer mon profil</title>

</head>

<body>

  <? include('menu.php');?>


  <div id="modif">
   <p>Modifier mon profil</p>



   <form id ="modification" action="modif_profilbdd.php" method="post">

     <?  include('connectbdd.php');

     $sql = 'SELECT * FROM user WHERE id = '.$_SESSION['id']; 

     $req = $bdd->query($sql);
     $row = $req->fetch();

     ?>

     <div><input id="nom"type="text" name="nom" value=<? echo $row['nom'];?>></div> </br>
     <div><input id="prenom"type="text" name="prenom" value=<? echo $row['prenom'];?>></div> </br>

     <div><input id="date" type="date" name="date" title="Date (aaaa-mm-jj)" value=<? echo $row['naissance'];?> required id="date"> </div></br>


     <div> <input id="email" type="email" name="email" autocomplete="off" value=<? echo $row['mail'];?>> </div><br>

     <div><input type="text" id='pseudo' name="pseudo" value=<? echo $row['pseudo'];?> > </div> </br>
     <div> <button id ="submit"  name ="Modification">Modification</button></div>

   </form>
 </div>




 <footer></br></br></footer>

</body>


</html>