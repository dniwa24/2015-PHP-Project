<?php

	// $con=mysql_connect("localhost", "root", ""); //opens a new connection to the MySQL server
	// if(!$con)
	// 	die(mysql_error()); //checks if there is an error in server connection and displays it if any
	
	// $db=mysql_select_db("products", $con); //calls the database to be used
	// if(!$db)
	// 	die (mysql_error()); //checks if there is an error in database selection and displays it if any
	$con = mysqli_connect('localhost', 'root', '', 'products') or die(mysqli_error());

?>