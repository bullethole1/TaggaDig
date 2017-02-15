$(document).ready(function() {
			$("#login-frontpage").click(function() {
				loginform = {

					email: "emil@email.com",
					password: "123",
					passwordsecond: "123"
			
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