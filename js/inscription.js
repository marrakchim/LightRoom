function errorNom() {
    
	var regex = /^[a-zA-Z]+$/;
	var nom = document.getElementById('nom');
    var errornom = document.getElementById('errornom');
    errornom.innerHTML = "";
    errornom.style.color = "red";
	nom.style.color = "black";

	if (nom.value.length === 0) {
		nom.style.color = "red";
		nom.focus();
        errornom.innerHTML = "Votre nom est vide";
		return false;
        
	} else if (!regex.test(nom.value)) {
		nom.style.color = "red";
		nom.focus();
        errornom.innerHTML  = "contient des caracteres spéciaux";
		return false;
	} else {
        return true;
    }
}

function errorPrenom() {
    
	var regex = /^[a-zA-Z]+$/;
	var prenom = document.getElementById('prenom');
    var errorprenom = document.getElementById('errorprenom');
 errorprenom.innerHTML = "";
	 errorprenom.style.color = "red";
	prenom.style.color = "black";

	if (prenom.value.length === 0) {
		prenom.style.color = "red";
		prenom.focus();
        errorprenom.innerHTML ="valeur vide";
		return false;
	}

	else if (!regex.test(prenom.value))
	{
		prenom.style.color = "red";
		prenom.focus();
        errorprenom.innerHTML = "contient des caracteres spéciaux";
		return false;
        
	} else return true;
}

function errorDate() {
	var errordate= document.getElementById('errordate');
	var dateNaissance = document.getElementById('date');
	var regex = /^[0-9]{4}[-][0-9]{2}[-][0-9]{2}$/;

    errordate.innerHTML="";
	dateNaissance.style.color = "black";
    console.log(dateNaissance.value);

	if(dateNaissance.value.length==0) {
        dateNaissance.focus();
        dateNaissance.style.color = "red";
		errordate.style.display = "block";
		errordate.innerHTML = "Veuillez entrer votre date de naissance";
		return false;
	}
	else if(!regex.test(dateNaissance.value))
	{
         dateNaissance.focus();
		dateNaissance.style.color = "red";
		errordate.style.display = "block";
		errordate.innerHTML = "Votre date de naissance au format 'jj/mm/aaaa'";
		dateNaissance.focus();
		return false;
	}
	else {
        errordate.innerHTML = "";
        return true;
    }


}


function errorMail()
{
	var mail = document.getElementById('email');
	var errormail = document.getElementById('errormail');
    
	var regex = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$', 'i');
    
    errormail.innerHTML ="";
    errormail.style.color="red";
    mail.style.color = "black";

	if(mail.value.length==0) 
	{
        errormail.innerHTML ="Champ mail vide";
        mail.style.color = "red";
        mail.focus();
		return false;
	}
	else if(!regex.test(mail.value))
	{
        
        errormail.innerHTML ="Champ mail incorrect";
		mail.style.color = "red";
		mail.focus();
		return false;
	}
	else return true;


}

function errorPseudo() {
    
    var pseudo = document.getElementById('pseudo');
    var p=pseudo.value;
    var errorpseudo = document.getElementById('errorpseudo');
    errorpseudo.innerHTML="";
    errorpseudo.style.color = "red";
    pseudo.style.color = "black";
    
  if (pseudo.value.length==0) { 
      pseudo.style.color = "red";
      errorpseudo.innerHTML="pseudo vide";
		pseudo.focus();
    return false;
  }else {
      
  
    
   if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
    
  xmlhttp.open("GET","recherchePseudo.php?q="+p,true);
  xmlhttp.send();
  
    
  xmlhttp.onreadystatechange=function () {
      
    if (xmlhttp.readyState==4 && xmlhttp.status==200) {    
        if(xmlhttp.responseText === pseudo.value) {
            
            errorpseudo.innerHTML="pseudo deja existant";
            pseudo.focus();
            return false;
        } else {
            return true;
        }
        
    } 
}
    console.log(xmlhttp.responseText);  
}
   
}




function mdpValidation(){

	var mdp1 = document.getElementById('password1');
	var mdp2 = document.getElementById('password2');
    
	var mdp = document.getElementById('errormdp');
    mdp.innerHTML="";
    mdp.style.color="red";
    
    if(mdp1.value.length == 0 || mdp2.value.length == 0){
    mdp.innerHTML="mot de passe vide";
	mdp1.focus(); 
     return false;
        
    }
	else if (mdp1.value!=mdp2.value)  //Test les deux mdp
	{  

	mdp.innerHTML= "mot de passe different";
	mdp1.focus(); 
	
	return false;
     }

	else (mdp1.value == mdp2.value) 
    {
    return true;
    }  
	
}


function formValidation()
{
	var errordiv= document.getElementById('errordiv');

	if(errorNom() == false ||errorPrenom() == false || errorDate() == false || errorMail() == false  ||errorPseudo() == false ||  mdpValidation() == false ||pseudo() == false  ) 
		{
			errordiv.innerHTML = "Champ(s) incorrect(s)";
			return false;
		}
	else return true;


}

