
$(document).ready(function () {

     $(".delete").click(function(){
       //alert("Delete?");               
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
             $(btn).closest('tr').fadeOut("slow");
            
          }
          else
          {
            alert("Error");
          }

       }
    });

   })
  });