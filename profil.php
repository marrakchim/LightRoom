<? session_start(); ?>
<!DOCTYPE html>

<html>
<head>
    <link rel="stylesheet" href="css/profil.css">
    
 <link href="lightbox/dist/css/lightbox.css" rel="stylesheet">
    
	<meta charset='utf-8'>
	
</head>


    <body>
    <? include('menu.php'); ?>
        
        <script src="lightbox/dist/js/lightbox.js"></script>
       
        
        
      <? $id=$_GET['id'];
      
        if($id == $_SESSION['id'])
        {
           include('myProfil.php');
        }
        else {
            include('userProfil.php');
        }
        ?>
        
    </body>
    
</html>