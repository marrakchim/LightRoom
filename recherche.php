<?php
include('connectbdd.php');

$keyword = '%'.$_POST['keyword'].'%';
if($keyword !=""){
$sql = "SELECT * FROM user WHERE pseudo LIKE (:keyword) ORDER BY pseudo ASC LIMIT 0, 10";
$query = $bdd->prepare($sql);
$query->bindParam(':keyword', $keyword, PDO::PARAM_STR);
$query->execute();
$list = $query->fetchAll();
foreach ($list as $rs) {
	// put in bold the written text
	$pseudo = str_replace($_POST['keyword'], '<b>'.$_POST['keyword'].'</b>', $rs['pseudo']);
	// add new option
    echo '<li onclick="set_item(\''.$rs['pseudo'].'\')"> <a href="profil.php?id='.$rs['id'].'"><img src='.$rs['im_srcp'].' id="image_arrondi">'.$pseudo.'</a></li>';
}
}
?>