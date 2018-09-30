<?php
	$con = mysqli_connect("localhost","admin","admin123","dbname");
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	
?>