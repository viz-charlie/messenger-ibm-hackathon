<?php

	session_start();
	require("config.php");
	require("userlinkup.php");
	require("convoDB.php");
	
	$sender = $_SESSION['username'];
	$receiver = $_SESSION["chatusername"];
	
	
	if($receiverquery = mysqli_query($mysqli,"SELECT firstname,surname From user WHERE username = '$receiver'")){
		$receivername = mysqli_fetch_array($receiverquery);
			$receiverfullname = $receivername['firstname']." ".$receivername['surname'];
	}
	
	$getuser1 = mysqli_query($mysqli,"SELECT user_id From user WHERE username = '$sender'");
	$getuser2 = mysqli_query($mysqli,"SELECT user_id From user WHERE username = '$receiver'" );								
	if($getuser1 && $getuser2){
		$user1 = mysqli_fetch_array($getuser1);
			$user_one = $user1['user_id'];
		$user2 = mysqli_fetch_array($getuser2);
			$user_two = $user2['user_id'];
			
		
	}
		
	
								
		$qw = mysqli_query($conul,"SELECT user.user_id,userlinkup.user_one,userlinkup.user_two,conversation.reply 
			FROM user 
			JOIN(SELECT conversation.reply,conversation.user_id_fk,conversation.link_id_fk,conversation.con_id FROM conversation) as conversation 
			ON user.user_id = conversation.user_id_fk 
			JOIN userlinkup 
			ON userlinkup.link_id = conversation.link_id_fk 
			WHERE
			(
			CASE 
				WHEN userlinkup.user_one = '$user_one'
					THEN userlinkup.user_two = '$user_two'
				WHEN userlinkup.user_two = '$user_one' 
					THEN userlinkup.user_one= '$user_two'
			END 
			)
			
			ORDER BY conversation.con_id  DESC Limit 20" );
								
		if($qw){
			
			while(($row = mysqli_fetch_array($qw,MYSQLI_ASSOC))){
				if($row['user_one']== $user_one){
					echo "You : ".$c_id=$row['reply']."<br>";
				}else if($row['user_one']==$user_two){
					echo $receiverfullname." : ".$c_id=$row['reply']."<br>";
				}

			} 
		}
?>