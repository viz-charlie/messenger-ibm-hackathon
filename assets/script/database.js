

	$(document).ready(function(){
		$('#clickRegister').click(function(){
			var regserverFile = "assets/php/register.php";
			var username = $('#usernamesignup').val();
			var email = $('#emailsignup').val();
			var password = $('#passwordsignup').val();
			var confirmPassword = $('#passwordsignup_confirm').val();
			/* if(document.getElementById("male").checked){
				var gender = 'M';
			}else if(document.getElementById("female").checked{
				gender = 'F';
			}else{
				alert("SELECT YOUR GENDER");
			} */
			
			if(username == "" || email == "" || password =="" || confirmPassword == "" ){
				alert("Please Fill the Empty Fields");
			}else {
				if(password != confirmPassword){
					alert("Error Password didnt match with Password Confirm");
				}else{
					$.post(regserverFile,{username,email,password},function(response){
						alert(response);
						window.location="assets/php/detail.php?username="+username;
					})
				}
			}
			
		});
	});
	

	$(document).ready(function(){
		$('#clickNext').click(function(){
			var bioserverfile = "../php/bioregister.php";
			var firstname = $('#firstname').val();
			var surname = $('#surname').val();
			var dob = $('#birthdate').val()+ "-" + $('#birthmonth').val()+ "-" + $('#birthyear').val();
			if(firstname == "" || surname == "" ){
				alert("Please Fill the Empty Fields");
			}else {
				$.post(bioserverfile,{firstname,surname,dob},function(response){
					alert(response);
					window.location="../../index.php";
				});
			}			
		});
	});
	

	$(document).ready(function(){
		$('#clickSignIn').click(function(){
			var signinserverFile = "assets/php/signin.php";
			var username = $('#username').val();
			var password = $('#password').val();
				if(username == "" || password==""){
					alert("Fill up the empty fields.");
				}else{
					$.post(signinserverFile,{username,password},function(response){
						
						if(response == "DATA NOT FOUND"){
							alert(response);
							window.location="index.php";
						}else{
								window.location="assets/php/chatlog.php";
						}
					});
				}	
		});
	});	

