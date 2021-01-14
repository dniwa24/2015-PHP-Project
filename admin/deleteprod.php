<?php
// require_once("../include/connection.php");
include "../include/connection.php";
$id = $_GET['id'];

$sql = "DELETE FROM product WHERE productid = $id";
$result = $con->query($sql) or die(mysqli_error());

// $delquery = mysql_query("DELETE FROM product WHERE productid = $id");
// if(!$delquery)
// 	die(mysql_error());
// else
header("location:product.php");


?>