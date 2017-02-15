var usernameInput = "";
var usernamePass = "";

$(document).ready(function() {
			var userObject = sessionStorage.getItem("userObject");
				console.log(userObject);

			if(userObject != null){
				$("#username").text(userObject);
				console.log("fsdg");
			}
			$("#login-frontpage").click(function() {
				usernameInput = $("#userEmail").val();
				usernamePass = $("#userPassword").val();

				loginform = {

					email: usernameInput,
					password: usernamePass
			
				};
				$.ajax({
					type: "POST",
					url: "http://taggadig.zocomutbildning.se/test/login.php",
					data: loginform,
					dataType: "json",
					success: function(data) {
						$("#username").text(data.data[0].business);
						sessionStorage.setItem("userObject", data.data[0].business);
						console.log(sessionStorage.getItem("userObject"));
					}
				})
				.fail(function(error, status, errortext){
					console.log(error);
					console.log(status);
					console.log(errortext);

				});
			});
		}); 