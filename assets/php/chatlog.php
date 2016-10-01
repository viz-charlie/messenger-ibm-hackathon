<?php
	session_start();
	
	require("config.php");
	require("userlinkup.php");
	require("convoDB.php");

?>
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
        <link rel="stylesheet" type="text/css" href="../css/main.css" />
        <link rel="stylesheet" type="text/css" href="../css/chatstyle.css" />
		<link rel="stylesheet" type="text/css" href="../css/slider.css" />
		<script type="text/javascript" src="../script/jquery_lib.js"></script>
		<script type="text/javascript" src="../script/slider.js"></script>
		<script type="text/javascript" src="../script/chatlog.js"></script>

		
	</head>
	
    <body>
        <div class="container">
            <div id="statusbar">
				
					<div id="onlinenum">
						<div style="position:relative;width:auto;float:left;">
							<p style="text-align:left;">
								USERS ONLINE:
							</p>
						</div>
						<div style="position:relative; float:right; width:auto;">
							<?php 
								require("config.php");
								
								if($status = mysqli_query($mysqli,"SELECT * FROM user WHERE status='ONLINE'")){
									if($result = mysqli_num_rows($status)){
										echo $result;	
									}
								}	
							?>	
						</div> 
					</div>
					<div id="currentuser">
						<div style="position:relative;width:50%;float:left;">
							<p style="text-align:left;">
								CURRENT USER: 
							</p>
						</div>
						
						<div id="currentchatuser" style="position:relative; float:left; width:auto;">
						</div>
					</div>
					
				</div>
           
            <section>				
                <div id="container" >
                    <div id="wrapper">
                        <div id="chat" class="animate form">
                            <h1>WELCOME USER</h1>
							
							<div id="chatlog" class="">
								<h2>Your Messege will be displayed here.</h2>
								
							</div>
							<div id="chatcontrol" class="">
								<div id="chatinput">
									<p> 
										<textarea id="entermsg" name="entermsg" required="required" placeholder="Enter your messege here" for="entermsg" class="entermsg" data-icon="" cols="100" rows="5"></textarea>
									</p>
								</div>
								
								<div id="chatbuttons">
									<p class="send button" > 
										<input id="clickSend" type="submit" value="SEND" />
									</p>
									
									<p class="stop button" > 
										<input id="clickStop" type="submit" value="STOP" onclick="click_Stop()"/>
									</p>
								</div>
							</div>
						</div>
					</div>
                </div>
            </section>
        </div>
		
		<div id="slider" style="right:-300px;">
			<div id="sidebar">
				<img id="clickProfile" src="../../images/sidebar.png" onclick="open_panel()" >
			</div>
					
			<div id="header">
				<div>
					<img src="../../images/profile.png">
					<img id="rollback" src="../../images/sidebar.png" onclick="close_panel()">
					<h1>PROFILE</h1>
				</div>
				<div id="profile">
				</div>
				<div>
					<img src="../../images/online.png">
					<h1>USERS</h1>
					<div class="dropdown">
						<span>
							<img id="settings" src="../../images/settings.ico" onclick="settings()">
						</span>
						 <!-- <div class="dropdown-content">
							<ul>
								<li>Edit Profile</li>
								<li>Sign Out</li>
							</ul>
						</div> -->
					</div>
				</div>
				<div id="onlineuser">
					<div class="tabs">
						<ul class="tab-links">
							<li class="active"><a href="#tab1">ONLINE USERS</a></li>
							<li><a href="#tab2">ALL USERS</a></li>
						</ul>
					 
						<div class="tab-content">
							<div id="tab1" class="tab active">
								
								<?php

									require("config.php");
									
									if($query = mysqli_query($mysqli,"SELECT firstname,surname,username FROM user WHERE status='ONLINE' ORDER BY firstname")){
										while($rowtwo = mysqli_fetch_array($query)){
											$username= $rowtwo['username'];
											$name= $rowtwo['firstname']." ".$rowtwo['surname'];
											echo '<div id="" style="color: #333;display: block;height: 32px;line-height: 32px;padding: 4px 0;position: relative; cursor:pointer;">';
											echo '<div><img src="../../images/onlineuser.png"></div><div class="chattinguser" id="chattinguser" name="'.$username.'"style="font-size:4; padding: 0px 35px;margin-top:5px;" >'.$name.'</div>';
											echo '</div>';
										}
									}
									
								?>
								<script>
									
										/* setInterval(function(){
											$("#tab1").load("onlineusers.php");
											location.load("chatlog.js");
										},2000);  */
									
								</script>
								
							</div>
								
						
							<div id="tab2" class="tab">
								<?php

									require("config.php");
					
									if($query = mysqli_query($mysqli,"SELECT firstname,surname,username FROM user ORDER BY firstname")){
										while($rowtwo = mysqli_fetch_array($query)){
											$username = $rowtwo['username'];
											$name= $rowtwo['firstname']." ".$rowtwo['surname'];
											echo '<div style="color: #333;display: block;height: 32px;line-height: 32px;padding: 4px 0;position: relative; cursor:pointer;">';
											echo '<div><img src="../../images/user.png"></div><div class="chattinguser" id="chattinguser" name="'.$username.'"style="font-size:4; padding: 0px 35px;margin-top:5px;" >' .$name.'</div>';
											echo '</div>';
										
										}
									}
									
								?>
							</div>

						</div>
					</div>
				</div>
				
			</div>
		</div>
    </body>
</html>

