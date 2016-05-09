<?php
session_start();
/*defined settings - start*/
ini_set("memory_limit", "99M");
ini_set('post_max_size', '20M');
ini_set('max_execution_time', 600);
define('IMAGE_MEDIUM_DIR', './uploades/medium/');
define('IMAGE_MEDIUM_SIZE', 250);
/*defined settings - end*/

if(isset($_FILES['image_upload_file'])){
	$output['status']=FALSE;
	set_time_limit(0);
	$allowedImageType = array("image/gif",   "image/jpeg",   "image/pjpeg",   "image/png",   "image/x-png"  );
	
	if ($_FILES['image_upload_file']["error"] > 0) {
		$output['error']= "Error in File";
	}
	elseif (!in_array($_FILES['image_upload_file']["type"], $allowedImageType)) {
		$output['error']= "You can only upload JPG, PNG and GIF file";
	}
	elseif (round($_FILES['image_upload_file']["size"] / 1024) > 4096) {
		$output['error']= "You can upload file size up to 4 MB";
	} else {
		/*create directory with 777 permission if not exist - start*/
	
		createDir(IMAGE_MEDIUM_DIR);
		/*create directory with 777 permission if not exist - end*/
		$path[0] = $_FILES['image_upload_file']['tmp_name'];
		$file = pathinfo($_FILES['image_upload_file']['name']);
		$fileType = $file["extension"];
		$desiredExt='jpg';
		$fileNameNew = rand(333, 999) . time() . ".$desiredExt";
		$path[1] = IMAGE_MEDIUM_DIR . $fileNameNew;
		
if(move_uploaded_file($_FILES['image_upload_file']['tmp_name'],$path[1]))
            {
    $output['status']=TRUE;
    $output['image_medium']= $path[1];
    
    include('connectbdd.php');
    
     $date = date("Y-m-d");
     $path_src = $path[1];
    $pathe='/Applications/MAMP/htdocs/PW/uploades/medium';
    $path_photo = $pathe.'/'.$fileNameNew;
    
    // on insere les varriables dans la bdd
       /* $bdd->exec('INSERT INTO images(user_id,im_date, im_chemin,im_src) VALUES("'.$_SESSION['id'].'","'.$date.'","'.$path_photo.'","'.$path_src.'")');*/

         $bdd->exec("UPDATE user set im_srcp = '{$path_src}' WHERE id= '{$_SESSION['id']}';");
              
    
        }
	}
	echo json_encode($output);
}

function createDir($path){		
	if (!file_exists($path)) {
		$old_mask = umask(0);
		mkdir($path, 0777, TRUE);
		umask($old_mask);
	}
}
?>	