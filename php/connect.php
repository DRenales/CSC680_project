<?php
	
	function open_connection()
	{
		$dbhost = "localhost";
		$dbuser = "root";
		$dbpass = "";
		$db = "who_covid_data";
		
		$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
		
		return $conn;
	}
	
	function close_connection($conn) { $conn->close(); }
?>

