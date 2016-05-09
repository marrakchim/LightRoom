//fonction javascript pour gerer l'appel dynamique de la page follow.php
$(document).ready(function () {
    //Si on clique sur le bouton qui a l'id #follow
     $("#follow").click(function(){
        //Cette ligne evite la redirection direct vers la page          
        event.preventDefault();
         //On recupere le contenu du href du bouton, ici : follow.php avec le parametre id
         var href = $(this).attr("href");
         var btn = this;
         var text = document.getElementById('follow');
         var nb_follower= document.getElementById('nb_follower').innerHTML;
         var nb = nb_follower;
        $.ajax({
          type: "GET",
          url: href,
          success: function(response) {
              
            console.log(response);
              //Si on veut suivre l'utilisateur
              if (response == "Success")
              {
                //On change le texte du bouton
                text.innerHTML = "Suivre";
                  //On diminue le nombre de follower
                  nb--;
                 var nb_follower= document.getElementById('nb_follower');
                  //Variable qu'on affiche sur la page
                 nb_follower.innerHTML = nb;

              }
              else
              {
                //On change le texte du bouton
                text.innerHTML = "Suivi";
                //On augmente le nombre de follower
                nb++;
                var nb_follower= document.getElementById('nb_follower');
                //On affiche la variable sur la page 
                nb_follower.innerHTML = nb;
              }

       }
    });

   })
  });