<?php

	session_start();
	require("config.php");
	require("userlinkup.php");
	require("convoDB.php");
	
	$messege = @$_POST['messege'];
	$signedinuser = $_SESSION["username"];
	$chatusername = $_SESSION["chatusername"];
	$userfullname = $_SESSION["userfullname"];

	if($config_query = mysqli_query($con,"SELECT user_id FROM user WHERE username='$chatusername'")){
		if($user_two_data = mysqli_fetch_array($config_query)){

			$user_two = $user_two_data['user_id'];
			$date = date('d.m.y h:i:s');
			$_SESSION['user_two'] = $user_two;
			
			$user_one_query = mysqli_query($con,"SELECT user_id FROM user WHERE username = '$signedinuser'");
			if($user_one_data = mysqli_fetch_array($user_one_query)){
				$user_one = $user_one_data['user_id'];
				$_SESSION['user_one'] = $user_one;
			} 
			
			
			if($user_linkup_check_query = mysqli_query($conul, "SELECT * FROM userlinkup WHERE user_one = '$user_one' AND user_two ='$user_two' ")){
				if($linkup_check_data = mysqli_fetch_array($user_linkup_check_query)){
					if($linkid = mysqli_query($con,"SELECT link_id FROM userlinkup WHERE user_one = '$user_one' AND user_two ='$user_two'")){
						if($linkupid = mysqli_fetch_array($linkid)){
							$userlinkup_id = $linkupid['link_id'];
								if($convodb_query = mysqli_query($convodb,"INSERT INTO conversation(reply,user_id_fk,date,link_id_fk) VALUES ('$messege','$user_one','$date','$userlinkup_id')")){
							
									
								}
								else{
									mysqli_error();
									
								} 
						}
					}
				}else{
					if($user_linkup_query = mysqli_query($conul,"INSERT INTO userlinkup(user_one,user_two,date) VALUES ('$user_one','$user_two','$date')")){
						if($linkid = mysqli_query($con,"SELECT link_id FROM userlinkup WHERE user_one = '$user_one' AND user_two ='$user_two'")){
							if($linkupid = mysqli_fetch_array($linkid)){
								$userlinkup_id = $linkupid['link_id'];
									if($convodb_query = mysqli_query($convodb,"INSERT INTO conversation(reply,user_id_fk,date,link_id_fk) VALUES ('$messege','$user_one','$date','$userlinkup_id')")){
						
									}
									else{
										mysqli_error();
										
									} 
							}
						}
					}else{
						mysqli_error();
					}
				}
			}else{
				
			}
			 
			
			
		}
		
	}
		
?>