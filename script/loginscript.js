var usernameInput = "";
var usernamePass = "";

$(document).ready(function() {
			var userObject = sessionStorage.getItem("userObject");
				console.log(userObject);

			if(userObject != null){
				$("#username").text(userObject);
				$('#login-background').css('visibility', 'hidden');
				$('.login').text("Logga ut");
				console.log("fsdg");
			}
			else{
				$('.login').text("Logga in");
				$('#login-background').css('visibility', 'visible');
			}
			$(".login").click(function(){
				if($('.login').text === "Logga ut"){
					$('.login').text("Logga in");
					userObject = null;
					sessionStorage.clear();
				}
			});

			$("#login-frontpage").click(function() {

				usernameInput = $("#userEmail").val();
				usernamePass = $("#userPassword").val();

				loginform = {

					email: usernameInput,
					password: usernamePass

				};
				}
			});
				$.ajax({
					type: "POST",
					url: "http://taggadig.zocomutbildning.se/test/login.php",
					data: loginform,
					dataType: "json",
					success: function(data) {
						$("#username").text(data.data[0].business);
						sessionStorage.setItem("userObject", data.data[0].business);
						console.log(sessionStorage.getItem("userObject"));
						$('.login').text("Logga ut");
						$('#login-background').css('visibility', 'hidden');

					}
				})
				.fail(function(error, status, errortext){
					console.log(error);
					console.log(status);
					console.log(errortext);

				});
			});
		});
