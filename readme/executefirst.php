<?php
require_once("../include/connection.php");
$default=md5("admin");
mysql_query("INSERT INTO users(username, password, userlevel) VALUES ('admin', '$default', 1)");
?>