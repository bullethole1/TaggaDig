
//Script som sköter allt kring registreringen

//De olika variablerna för inputen
var firstInput = "";
var lastInput = "";
var emailInput = "";
var businessInput = "";
var phoneInput = "";
var firstPassInput= "";
var secondPassInput = "";
var descripInput ="";
var fileInput = "";


$(document).ready(function() {

			//Skapar ett registeringsformulär i form av en dialogruta
			//Visas när mar trycker på Registerar på sidan
			$( "#registerform" ).dialog({ autoOpen: false, modal: true});
				$( "#register" ).click(function() {
  					$( "#registerform" ).dialog( "open" );
				});


			//När man trycker knappen registrera i dialogrutan och registreras som användare
			$("#registerButton").click(function() {
				firstInput = $("#forNamn").val();
				lastInput = $("#efterNamn").val();
				emailInput = $("#emailAdress").val();
				businessInput = $("#företagsNamn").val();
				phoneInput = $("#telefonNr").val();
				firstPassInput = $("#lösen1").val();
				secondPassInput = $("#lösen2").val();

				regform = {
					business: businessInput,
					firstName: firstInput,
					lastName: lastInput,
					email: emailInput,
					phone: phoneInput,
					password: firstPassInput,
					passwordsecond: secondPassInput
				};

				//Ajax anrop till serverna som skickar iväg alla ovanstående fält
				$.ajax({
					type: "POST",
					url: "http://taggadig.zocomutbildning.se/test/create_member.php",
					data: regform,
					dataType: "json",
					success: function(response) {
						console.log(response);
						alert("Du är nu registrerad");

					}
				});
				//Stänger dialogrutan efter att man tryck på registreringsknappen
				$("#registerform").dialog("close");
			});
		}); 