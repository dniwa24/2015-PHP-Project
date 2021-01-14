<?php
// require_once("../include/connection.php");
include "../include/connection.php";
$id = $_GET['id'];

$sql = "DELETE FROM message WHERE msgno = $id";
$result = $con->query($sql) or die(msqli_error());

// $delquery = mysql_query("DELETE FROM message WHERE msgno = $id");
if(!$result)
	die(mysql_error());
else
	header("location:message.php");


?>