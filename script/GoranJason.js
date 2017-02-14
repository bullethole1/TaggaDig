
  $(document).ready(function() {

    // Tillhör bokningsformuläretSidan
    $("#book").on('input', function() {
      console.log("funkar");
      $("#box").append("<p>testar</p>");

    });

    // Tillhör bokningsformuläretSidan
    // $.getJSON("http://localhost:88/taggaDig/api/show_members_admin.php", function(data){
              //  $("#storlek").val(data[0].firstName);


               
             
    });

      // Tillhör AdminSidan
     $("#tryck").click(function(){
      console.log("hej");
        $.getJSON("http://localhost:88/taggaDig/api/show_members_admin.php", function(data){

             var newdata = data.data;
             var poop = "<thead><tr><th>business</th> <th>Förnamn</th><th>Efternamn</th><th>Mail</th></tr></thead><tbody>";
              
             for( var i of newdata) {
              poop +="<tr><td>"
               + i.business + "<td>" + i.firstName + "<td>" + i.lastName + "<td>" + i.email + "</tr></td>";
             }

             poop += "</tbody>";
             $("#bajs").html(poop);
               
    });
        $("#tryck").click(function() {
          $("#bajs").fadeOut();

        });

               
    });