<?php 
$con=mysqli_connect("localhost","root","","test");
 function db_connect(){
 	$con=mysqli_connect("localhost","root","","test");
	if (mysqli_connect_errno($con)) {
		echo "Failed to connect to MySQL database.".mysqli_connect_errno();
	}
	mysqli_query($con,"set names utf8");
}
 ?>