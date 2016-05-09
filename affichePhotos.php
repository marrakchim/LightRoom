
<div id='photos_user' >

  <? $sql = 'SELECT im_src,id FROM images WHERE user_id = '.$_SESSION["id"]; 
$req = $bdd->query($sql);

while($row = $req->fetch()){ 

	?> 	
		<div class="photo">
			<ul class="container_img">
				<li>
					<img id='img1' src=<? echo $row['im_src'];?>>
					<span class="text-content"><img onclick="supprime(<? echo $row['id']?>)" id="corbeille"class="text-content"src="corbeille.png" ></span>
				</li>
			</ul>
		</div>
		<p id="coucou"> </p>
		<?

} 

 ?>