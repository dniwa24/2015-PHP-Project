<?php
// require_once("../include/connection.php");
include "../include/connection.php";
$id = $_GET['id'];

$sql = "DELETE FROM users WHERE userid = $id";
$result = $con->query($sql) or die(mysqli_error());

// $delquery = mysql_query("DELETE FROM users WHERE userid = $id");
// if(!$delquery)
// 	die(mysql_error());
// else
header("location:view.php");


?>