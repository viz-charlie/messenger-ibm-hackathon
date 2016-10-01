<!DOCTYPE html>

<html lang="en" class="no-js"> 
    <head>
        <meta charset="UTF-8" />
        <title>MESSENGER</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="description" content="Messenger" />
        <meta name="keywords" content="messenger" />
        <meta name="author" content="Viswajit Rana" />
		<meta name="author" content="Vibha Jain" />
        <link rel="stylesheet" type="text/css" href="assets/css/main.css" />
        <link rel="stylesheet" type="text/css" href="assets/css/style.css" />
		<link rel="stylesheet" type="text/css" href="assets/css/animate-custom.css" />
		<script type="text/javascript" src="assets/script/jquery_lib.js"></script>
		<script type="text/javascript" src="assets/script/database.js"></script>
				<script type="text/javascript" src="assets/script/database1.js"></script>


    </head>
	
    <body>
        <div class="container">
            
           
            <section>				
                <div id="container" >
                    <a class="hiddenanchor" id="toregister"></a>
                    <a class="hiddenanchor" id="tologin"></a>
                    <div id="wrapper">
						
                        <div id="login" class="animate form">
                           
                                <h1>Log in</h1> 
                                <p> 
                                    <label for="username" class="uname" data-icon="u" >Username or Email</label>
                                    <input id="username" name="username" required="required" type="text" placeholder="Username or Email"/>
                                </p>
                                <p> 
                                    <label for="password" class="youpasswd" data-icon="p">Password</label>
                                    <input id="password" name="password" required="required" type="password" placeholder="********" /> 
                                </p>
                                <p class="keeplogin"> 
									<input type="checkbox" name="loginkeeping" id="loginkeeping" value="loginkeeping" /> 
									<label for="loginkeeping">Keep me logged in</label>
								</p>
                                <p class="login button"> 
                                    <input id="clickSignIn" type="submit" value="Login" /> 
								</p>
                                <p class="change_link">
									Not a member yet ?
									<a href="#toregister" class="to_register">Join us</a>
								</p>
                           
                        </div>

                        <div id="register" class="animate form">
                            
                                <h1> Sign up </h1> 
                                <p> 
									<label for="usernamesignup" class="uname" data-icon="u">Username</label>
                                    <input id="usernamesignup" name="usernamesignup" required="required" type="text" placeholder="Username" />
                                </p>
                                <p> 
                                    <label for="emailsignup" class="youmail" data-icon="e" > Email</label>
                                    <input id="emailsignup" name="emailsignup" required="required" type="email" placeholder="Email"/> 
                                </p>
                                <p> 
                                    <label for="passwordsignup" class="youpasswd" data-icon="p">Password </label>
                                    <input id="passwordsignup" name="passwordsignup" required="required" type="password" placeholder="********"/>
                                </p>
                                <p> 
                                    <label for="passwordsignup_confirm" class="youpasswd" data-icon="p">Confirm Password</label>
                                    <input id="passwordsignup_confirm" name="passwordsignup_confirm" required="required" type="password" placeholder="********"/>
                                </p>
                                <p class="signin button" > 
									 <input id="clickRegister" type="submit" value="Sign up" />
								</p>

                                <p class="change_link">  
									Already a member ?
									<a href="#tologin" class="to_register"> Go and log in </a>
								</p>
                            
                        </div>
												
                    </div>
                </div>  
            </section>
        </div>
    </body>
</html>