<?php
	session_start();
	// require_once("../include/connection.php");
	include "../include/connection.php";
	$id = $_SESSION['id'];
	$sql = "SELECT * FROM users WHERE userid = $id";
	$result = $con->query($sql) or die(mysqli_error());
	$row = $result->fetch_array(MYSQLI_ASSOC);
	// $query = mysql_query("SELECT * FROM users WHERE userid = $id");
	// $row = mysql_fetch_array($query);
	$userid = $row['userid'];
	$fname = $row['firstname'];
	$lastname = $row['lastname'];

	$id1 = $_GET['id1'];
	$sql1 = "SELECT * FROM product WHERE productid = $id1";
	$result1 = $con->query($sql1) or die(mysqli_error());
	$row = $result1->fetch_array(MYSQLI_ASSOC);
	// $query1 = mysql_query("SELECT * FROM product WHERE productid = $id1 ");
	// $row = mysql_fetch_array($query1);
	$price = $row['price'];
	$desc = $row['description'];
	$prod_name=$row['productname'];

	$sql = "INSERT INTO orders (userid, firstname, lastname, price, description, productname) VALUES ($id, '$fname', '$lastname', '$price', '$desc', '$prod_name')";
	$result = $con->query($sql) or die(mysqli_error());
	// $query = mysql_query("INSERT INTO `orders`(`userid`, `firstname`, `lastname`, `price`, `description`, `productname`) VALUES ($id, '$fname', '$lastname', $price, '$desc', '$prod_name')");
	if(!$result)
		die(mysql_error());
	else
	{
		header("location:product.php");
	}
?>