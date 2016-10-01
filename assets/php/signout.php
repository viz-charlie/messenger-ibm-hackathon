<?php
	
	require("config.php");
	session_start();
	$username = $_SESSION['username'];
	if($signoutquery = mysqli_query($mysqli,"UPDATE user SET status = 'OFFLINE' WHERE username = '$username'")){
		echo "Logging Out";
	}
	session_destroy();
?>