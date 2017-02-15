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
				$.ajax({
					type: "POST",
					url: "http://taggadig.zocomutbildning.se/test/create_member.php",
					data: regform,
					dataType: "json",
					success: function(response) {
						console.log(response);
					}
				});
				$("#registerform").dialog("close");
			});
		}); 