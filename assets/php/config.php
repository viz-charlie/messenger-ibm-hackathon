<?php

	if(!$_ENV["VCAP_SERVICES"]){ //local dev
		$mysql_server_name = "127.0.0.1:3306";
		$mysql_username = "root";
		$mysql_password = "";
		$mysql_database = "im";
	} else { //running in Bluemix
		$vcap_services = json_decode($_ENV["VCAP_SERVICES" ]);
		if($vcap_services->{'mysql-5.5'}){ //if "mysql" db service is bound to this application
			$db = $vcap_services->{'mysql-5.5'}[0]->credentials;
		} 
		else if($vcap_services->{'cleardb'}){ //if cleardb mysql db service is bound to this application
			$db = $vcap_services->{'cleardb'}[0]->credentials;
		} 
		else { 
			echo "Error: No suitable MySQL database bound to the application. <br>";
			die();
		}
		$mysql_database = $db->name;
		$mysql_port=$db->port;
		$mysql_server_name =$db->hostname . ':' . $db->port;
		$mysql_username = $db->username; 
		$mysql_password = $db->password;
	}
	//echo "Debug: " . $mysql_server_name . " " .  $mysql_username . " " .  $mysql_password . "\n";

	$mysqli = new mysqli($mysql_server_name, $mysql_username, $mysql_password, $mysql_database);
	if ($mysqli->connect_errno) {
		echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		die();
	}
	

?>
