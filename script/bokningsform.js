 $(document).ready(function() {


 	$.getJSON("http://taggadig.zocomutbildning.se/test/show_members_admin.php", function(data){
 		var newdata = data.data;

 		 for( var i of newdata) {
              i.area;
             }

 	});

 });

