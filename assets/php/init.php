

<?php 
require("config.php");


$sqlTableUser="SELECT * FROM  USER";
$sqlTableUserLinkup="SELECT * FROM USERLINKUP";
$sqlTableConversation="SELECT * FROM CONVERSATION";

if ($mysqli->query($sqlTableUser) && $mysqli->query($sqlTableUserLinkup) && $mysqli->query($sqlTableConversation) ) {

} else {
	$sqlTableUser="
	CREATE TABLE USER (
	 user_id int(11) NOT NULL AUTO_INCREMENT,
	 date varchar(20) NOT NULL,
	 username varchar(255) UNIQUE NOT NULL,
	 email varchar(255) UNIQUE NOT NULL,
	 password varchar(255) NOT NULL,
	 firstname varchar(255) NOT NULL,
	 surname varchar(255) NOT NULL,
	 dob varchar(255) NOT NULL,
	 gender varchar(255) NOT NULL,
	 status varchar(10) NOT NULL,
	 PRIMARY KEY (user_id)
	) DEFAULT CHARSET=utf8
	";


	$sqlTableUserLinkup="
	CREATE TABLE USERLINKUP(
	 link_id int(11) UNIQUE NOT NULL AUTO_INCREMENT,
	 user_one int(11) NOT NULL,
	 user_two int(11) NOT NULL,
	 date varchar(25) NOT NULL,
	 PRIMARY KEY (link_id),
	 FOREIGN KEY (user_one)
	 REFERENCES USER(user_id),
	 FOREIGN KEY (user_two)
	 REFERENCES USER(user_id)
	) DEFAULT CHARSET=utf8 
	";

	$sqlTableConversation="
	CREATE TABLE CONVERSATION(
	 con_id int(11) UNIQUE NOT NULL AUTO_INCREMENT,
	 reply text NOT NULL,
	 user_id_fk int(11) NOT NULL,
	 date varchar(25) NOT NULL,
	 link_id_fk int(11) NOT NULL,
	 PRIMARY KEY (con_id),
	 FOREIGN KEY (user_id_fk)
	 REFERENCES USER(user_id),
	 FOREIGN KEY (link_id_fk)
	 REFERENCES USERLINKUP(link_id)
	) DEFAULT CHARSET=utf8
	";
	
	
}

if ($mysqli->query($sqlTableUser) && $mysqli->query($sqlTableUserLinkup) && $mysqli->query($sqlTableConversation) ) {
	}else{
		echo "DATABASE ERROR";
		die();
	}


?>
