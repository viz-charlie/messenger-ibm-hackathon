<?php     //start php tag

require("config.php");

session_start();
$user = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['password'];
$date = date('d.m.y h:i:s');
$q = "INSERT INTO user(date,username,email,password) VALUES ('$date','$user','$email','$pass')";
$ex = mysqli_query($mysqli,$q);
if($ex){
	echo "Redirecting...";	
	$file = new DOMDocument();
	$root = $file->createElement('Database');
		$username = $file->createElement( 'Username' );
		$username->nodeValue = $user;
		$root->appendChild( $username );
		$password = $file->createElement( 'Password' );
		$password->nodeValue = $pass;
		$root->appendChild( $password );
		$emailID = $file->createElement( 'EmailID' );
		$emailID->nodeValue = $email;
		$root->appendChild( $emailID );
	$file->appendChild($root);

    $file->save('../xml/database.xml');
}else{
	echo "Error while processing.";
}

?>