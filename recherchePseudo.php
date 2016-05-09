<?php
//get the q parameter from URL
$q=$_GET["q"];

include('connectbdd.php');
$hint="";

$reponse = $bdd->prepare('SELECT pseudo FROM user WHERE pseudo LIKE ?');
$reponse ->execute(array($q));
$hint ="";
while($req =$reponse->fetch())
{
	$hint = $req['pseudo'];      
}

echo $hint;

?>
