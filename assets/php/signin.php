<?php

require_once("config.php");

session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$status = "OFFLINE";

	if(!$username || !$password){
		echo "PLEASE FILL THE EMPTY FIELDS.";
	}else{
		$qu="SELECT COUNT(*) FROM user WHERE (username ='$username' OR email='$username')  AND password='$password' ";
		
		$data = mysqli_query($mysqli,$qu);
		$result = mysqli_fetch_array($data, MYSQLI_NUM);
	
		if (!$data) {
			die("Query Failed");
		}
		if ($result[0]==1) {
			$status="ONLINE"; 
			$st="UPDATE user SET status='$status' WHERE username='$username' AND password='$password'";
			$on = mysqli_query($mysqli,$st);
			if($on){
				$_SESSION["username"] = $username;
				
				echo $username;
				echo "DATA FOUND\n";
				echo "STATUS ONLINE";
			}else{
				echo "STATUS OFFLINE";
			}
			
		} else {
			echo "DATA NOT FOUND";
		}
		
	}
 
?>