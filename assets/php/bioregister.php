<?php     //start php tag

require("config.php");

$file =simplexml_load_file("../xml/database.xml") or die("Error: Cannot create object");
$user = $file->Username;
$firstname = $_POST['firstname'];
$surname = $_POST['surname'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];

$q = "UPDATE user SET firstname='$firstname', surname='$surname', dob='$dob' , gender='$gender' WHERE username='$user'";
$ex = mysqli_query($mysqli,$q);
if($ex){
	echo "Signing Up...";
}else{
	echo "Error while processing.";
}

?>