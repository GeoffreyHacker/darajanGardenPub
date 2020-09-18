<?php 

	define("Dbhost", "localhost");
	define("Dbuser", "root");
	define("Dbpass", "");
	define("Dbname", "darajanPub");

	$con = new mysqli(Dbhost,Dbuser,Dbpass,Dbname);
	if ($con->connect_error) {
		die("Could not Connect to Database");
	}
?>