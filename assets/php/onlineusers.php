<?php

	require("config.php");
	
	if($query = mysqli_query($mysqli,"SELECT firstname,surname,username FROM user WHERE status='ONLINE' ORDER BY firstname")){
		while($rowtwo = mysqli_fetch_array($query)){
			$username= $rowtwo['username'];
			$name= $rowtwo['firstname']." ".$rowtwo['surname'];
			echo '<div style="color: #333;display: block;height: 32px;line-height: 32px;padding: 4px 0;position: relative; cursor:pointer;">';
			echo '<div><img src="../../images/onlineuser.png"></div><div class="chattinguser" id="chattinguser" name="'.$username.'"style="font-size:4; padding: 0px 35px;margin-top:5px;" >'.$name.'</div>';
			echo '</div>';
		}
	}
	
?>