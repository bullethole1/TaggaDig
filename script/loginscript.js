
// Variabler som skapas för att lagra användare inmatningen
var usernameInput = "";
var usernamePass = "";

$(document).ready(function() {

			var userObject = sessionStorage.getItem("userObject");

			if(userObject != null){
				$("#username").text(userObject);
				$('#login-background').css('visibility', 'hidden');
				$('.login').text("Logga ut");
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

			//Funktion och anrop när man trycker på logga in knappen
			$("#login-frontpage").click(function() {

				usernameInput = $("#userEmail").val();
				usernamePass = $("#userPassword").val();

				loginform = {

					email: usernameInput,
					password: usernamePass

				};

				//AJAX anrop som skickar iväg användar inmatningen och gör diverse grejer på sidan
				$.ajax({
					type: "POST",
					url: "http://taggadig.zocomutbildning.se/test/login.php",
					data: loginform,
					dataType: "json",
					success: function(data) {
						$("#username").text(data.data[0].business);
						sessionStorage.setItem("userObject", data.data[0].business);
						$('.login').text("Logga ut");
						$('#login-background').css('visibility', 'hidden');

					}
				})

				//Ger ett felmeddelande om lösenord eller användarnamn inte stämmer
				.fail(function(){
					alert("Fel användarnamn eller lösenord");
				});
			});
		});