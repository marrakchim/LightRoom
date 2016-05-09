<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
 <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>  
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> 
 

<script>
   
function autocomplet() {
	var keyword = $('#navbar-search').val();
	$.ajax({
		url: 'recherche.php',
		type: 'POST',
		data: {keyword:keyword},
		success:function(data){
			$('#searchResults').show();
			$('#searchResults').html(data);
		}
	});
}

    
    
function mdpbdd(){
	var mdp = $('').val();
	$.ajax({
		url: 'recherche.php',
		type: 'POST',
		data: {keyword:keyword},
		success:function(data){
			$('#searchResults').show();
			$('#searchResults').html(data);
		}
	});
}


function set_item(item) {
	// change input value
	$('#navbar-search').val(item);
	// hide proposition list
	$('#searchResults').hide();
}

     var co=0;
function show_mdp() {
    
    if( co %2 == 0)
        {
            $('#mdp').show();
        }
    else{
         $('#mdp').hide();
    }
    co = co+1;
   
    
    
}
</script>

<head>
   <link rel="stylesheet" href="css/menu.css"/>
</head>

<header>
    <div id="barreMenu">
        
        <div id="header_left">
            <div id="logo"> <p>LightRoom</p></div>
            <div id='accueil'><a href="accueil.php">Accueil</a></div>
            <? if($_SESSION['admin'] == 1) 
            echo '<div id="admin"><a href="admin.php">Admin</a>
            </div>' ; ?>
        </div>
        
        <div id="header_center" >
            <div class="search">
                <form class="navbar-search" >
                    <div class="input_container"> 
                    <input id="navbar-search" type="text" class="input-xlarge navbar-search-field" placeholder="Rechercher" autocomplete="off" onkeyup="autocomplet()" >
                  <ul id="searchResults" class="searchResults" ></ul>
                        
              </div>
            </form>
         </div>
     </div>    
     
     <ul id="header_right">
        <li><div id="profil">
         <?php 
         include('connectbdd.php');
         $sql = 'SELECT im_srcp FROM user WHERE id = '.$_SESSION["id"]; 
         $req = $bdd->query($sql);
         $row = $req->fetch();

         ?>
         <a ><img id="image_arrondi"src=<? echo $row['im_srcp']; ?> ></a>
     </div>
     
     <ul>
        <li><a href="profil.php?id=<? echo $_SESSION['id']?>">Photos</a></li>

        <li><a href="albums.php?id=<? echo $_SESSION['id']; ?>">Albums</a></li>
        
    </ul>
</li>
          <li><div id="options">
        <a><img src="dots.png" id="dots"></a>
        <ul  >
            <li><a href="modif_profil.php">Modifier profil</a></li>
            <li><a href="deconnexion.php">Deconnexion</a></li>
        
           </ul>
        </div></li>
         


</ul>	

</div>
</header>




