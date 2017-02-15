$(document).ready(function() {
			$("#login-frontpage").click(function() {
				loginform = {

					email: "alihodzicadnan@hotmail.com",
					password: "11111"
			
				};
				$.ajax({
					type: "POST",
					url: "http://taggadig.zocomutbildning.se/test/login.php",
					data: loginform,
					dataType: "json",
					success: function(response) {
						console.log(response);
					}
				})
				.done(function(){
					alert("Welcome");
				})
				.fail(function(){
					alert("Failed to log in");
				});
			});
		}); 