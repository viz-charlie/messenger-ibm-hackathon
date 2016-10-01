<?php
	session_start();
	$userfullname = @$_POST['userfullname'];
	$chatusername = @$_POST['chatusername'];
	$_SESSION["userfullname"] = $userfullname;
	$_SESSION["chatusername"] = $chatusername;
	
	
?>