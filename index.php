<!DOCTYPE html>

<html>
<head>
	<meta charset='utf-8'>
	<link rel="stylesheet" href="css/index.css"/>
</head>



<body>
<header>

	<h1>LightRoom<h1>

</header>

	<div id="connexion">
		<div id="form_connexion">
		<form action="login.php"  method="post">
		<?php if(isset($_GET['error'] )) {
			if($_GET['error'] == 2){?> <p> Merci de votre inscription , veuillez vous connecter</p> <? }}?>
		
		</br>
			<div><input id="pseudo" type="text" autocomplete="off" maxlength="30" name="pseudo" placeholder="login"></div>
		</br>
			<div><input  id="password" autocomplete="off" type="password" placeholder="azert" name="password" ></div>
		</br>
		<?php if (isset($_GET["error"])){if($_GET['error'] == 1){?><p color="red"> Identifiant ou mot de passe non reconnu </p> <? } }?>
			<div><button id="button_ok" name="connexion" >Se connecter</button></div>
			</br>

		</form>

		</div>
	</br>
		<p>Vous n'êtes pas inscits ?</p>
		<form action="inscription.php" method="post">
		<div><button id="button_sub" name="subscribe">Inscription</button></div>
		</form>
	</div>

	</body>

	</html>

