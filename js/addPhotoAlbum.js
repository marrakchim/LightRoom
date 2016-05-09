//Fonction pour ajouter un album
$(document).ready(function(){

     $(".crea").click(function(){
       
        document.getElementById('monForm').style.display='block';
        document.getElementById('annuler').style.display='block';
         document.getElementById('tousLesAlbums').style.display='none';


   })
  });

//Fonction pour ajouter un album
$(document).ready(function(){

     $("#annuler").click(function(){
       
        document.getElementById('monForm').style.display='none';
        document.getElementById('annuler').style.display='none';

   })
  });

$(document).ready(function(){

     $(".voir").click(function(){
       
        document.getElementById('tousLesAlbums').style.display='flex';

   })
  });



//Fonction pour ajouter une photo dans un album
$(document).ready(function(){

     $(".add_photo").click(function(){
        alert("Photo ajoutée !");               
        event.preventDefault();
         var href = $(this).attr("href");
         var btn = this;

        $.ajax({
          type: "GET",
          url: href,
          success: function(response) {
              console.log(response);
          if (response == "Success")
          {
             $(btn).closest('div').fadeOut("slow");
            
          }
          

       }
    });

   })
  });

$(document).ready(function(){

     $(".supprimerAlbum").click(function(){
        event.preventDefault();
         var href = $(this).attr("href");
         var btn = this;

        $.ajax({
          type: "GET",
          url: href,
          success: function(response) {
              console.log(response);
          
              location.href= response;
             // location.href = "albums.php";
            
            alert("Album supprimé!"); 
          

       }
    });

   })
  });



$(document).ready(function(){

 $('#monForm').on('submit', function(e) {

      e.preventDefault(); // J'empêche le comportement par défaut du navigateur, c-à-d de soumettre le formulaire
     
        var $this = $(this); // L'objet jQuery du formulaire
     // Je récupère les valeurs
        var album = $('#nomAlbum').val();
      
      if(album === '') {
            alert('Les champs doivent êtres remplis');
        } else {
            // Envoi de la requête HTTP en mode asynchrone
            $.ajax({
                url: $this.attr('action'), // Le nom du fichier indiqué dans le formulaire
                type: $this.attr('method'), // La méthode indiquée dans le formulaire (get ou post)
                data: $this.serialize(), // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
                dataType: 'json', // JSON
                success: function(json) {
                    if(json.reponse === 'ok') {
                        $('.button_cre').attr("data-dismiss", "modal");
                        document.getElementById('creerUnAlbum').style.display='none';
                        document.getElementById('boutons').style.display='block';
                        
                    } else {
                        alert('Erreur : '+ json.reponse);
                    }
                   
                }
              
            });
        }
         document.getElementById('boutons').style.display='block';
     
     

     });
});





//Fonctions gestion apparition/disparitions blocs selon choix utilisateur


 $(function(){
    $('#allUserPhotosButton').on('click', function(e) {
    
    document.getElementById('photos_user').style.display='none';
        
    document.getElementById('photos_all_user').style.display='flex';
        document.getElementById('save').style.display='block';
  
    });
});

   
    $(function(){
    $('#userPhotosButton').on('click', function(e) {
    
    document.getElementById('photos_all_user').style.display='none';
        
    document.getElementById('photos_user').style.display='flex';
        document.getElementById('save').style.display='block';
  
    });
});