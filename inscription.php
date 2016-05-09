<!DOCTYPE html>
<html>

<link rel="stylesheet" type="text/css" href="css/inscription.css">
<script type="text/javascript" src ="js/inscription.js"> </script>

<head>
    <meta charset="utf-8" />
    <title>Inscription</title>
    
</head>

 <header>
     <a href="index.php"><h1>LightRoom</h1></a>
     <h2>Inscription</h2>
</header>

<body>



  <div id="inscrip">
   <form id ="inscription" action="inscriptionbdd.php" method="post" onSubmit="return formValidation();">


      <div><input id="nom"type="text" name="nom" placeholder="Nom"></div> </br>
      <div id="errornom"> </div></br>
      <div><input id="prenom"type="text" name="prenom" placeholder="Prénom"></div> </br>
        <div id="errorprenom"> </div></br>

      <div><input id="date" type="date" name="date" title="Date (jj-mm-aaaa)" placeholder="Naissance (aaaa-mm-jj)" > </div></br>
      <div id="errordate"> </div></br>
       
      <div> <input id="email" type="email" name="email" autocomplete="off" placeholder="Adresse e-mail"> </div><br>
      <div id="errormail"> </div></br>

      <div><input type="text" name="pseudo" autocomplete="off" onkeyup="errorPseudo()" placeholder="Login" id="pseudo"> </div> </br>

<div id="errorpseudo"> <?php if(isset($_GET['error'] )) {
			if($_GET['error'] == 1){?> <p style="color:red;">Pseudo déjà pris </p><? }}?></div></br> 
      <div> <input type="password" id="password1" autocomplete="off" name="password1" placeholder="password"> </div> </br>
<div id="errormdp"> </div></br>
      <div> <input type="password" id="password2" name="password2" placeholder="password"> </div> </br>
       
      <div id="errordiv"> </div></br>
     <input type="hidden" id="id" name="id" value="<? echo $_GET['id']; ?>">
      <div> <button id ="submit"  name ="inscription">Inscription</button></div>

   </form>
   </div>

<footer>
 <p></p>
</footer>

</body>     

</html>