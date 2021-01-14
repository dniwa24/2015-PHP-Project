<?php
// require_once("../include/connection.php");
include "../include/connection.php";
$id1 = $_GET['id_del'];
// $delquery = mysql_query("DELETE FROM orders WHERE orderid = $id1");
$sql = "DELETE FROM orders WHERE orderid = $id1";
$result = $con->query($sql) or die(mysqli_error());
if(!$result)
	die(mysql_error());
else
	header("location:product.php");
?>