<?
$datejour = date("d/m/Y");
$dateheure = date("H:i:s");

$djour = explode("/", $datejour); 
$dheure = explode(":", $dateheure); 


    $dateJourIm= $row['im_date'];
    $dateHeureIm = $row['im_heure'];
        //explode pour mettre la date au format numerique: 12/05/2006  -> 12052006
   $djourIm = explode("-", $dateJourIm); 
$dheureIm = explode(":", $dateHeureIm); 
    
// concaténation pour inverser l'ordre: 12052006 -> 20060512

$dji = $djourIm[0].$djourIm[1].$djourIm[2]; 
$dj =$djour[2].$djour[1].$djour[0]; 

//ici on traite en heure et min
 if($dj - $dji == 0)
 {
     $heure = $dheure[0]-$dheureIm[0];
     $min =$dheure[1]-$dheureIm[1];
     $min = abs($min);
     if($heure == 0){
         echo "il y a {$min} min";
     }else {
     echo "il y a {$heure}h et {$min} min";
     }
 }
//ici on traite en semaine et en jours
else if($dj - $dji < 29 ) {
 
    if( $dj - $dji <7){
     $time = $dj-$dji;
        echo "il y a {$time} jours";
    }
    else if($dj - $dji <14){
         
        echo "il y a 1 semaines"; 
    
    }
    else if($dj - $dji <21){
         
        echo "il y a 2 semaines"; 
    
    }
    else if($dj - $dji <29){
         
        echo "il y a 3 semaines"; 
    
    }  
}

else echo "il y a plus d'un mois";


    


?>