
$(document).ready(function(){

     $(".delete").click(function(){
       alert("Photo supprimée!");               
  event.preventDefault();
         var href = $(this).attr("href");
         var btn = this;
         var nb_photo= document.getElementById('nb_photo').innerHTML;
         var nb = nb_photo;

        $.ajax({
          type: "GET",
          url: href,
          success: function(response) {
             
          if (response == "Success")
          {
             $(btn).closest('div').fadeOut("slow");
               nb--;
             var nb_photo= document.getElementById('nb_photo');
             nb_photo.innerHTML = nb;
            
          }
          else
          {
            alert("Error");
          }

       }
    });

   })
  });