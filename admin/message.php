<?php
	// require_once("../include/connection.php");
	include "../include/connection.php";
?>
<html>
<head>
<style>
.cdiv{
	height:30%;
	width:100%;
	display: flex;
	justify-content: center;
	align-items: center;
}
.gi-2x{font-size: 2em;}
.gi-3x{font-size: 3em;}
.gi-4x{font-size: 4em;}
.gi-5x{font-size: 5em;}
</style>
</head>
<body style="background-color:lavender">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
</head>
  <body>
	<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
       <div class="container-fluid">
				<div class="navbar-header">
						<a href="home.php" class="navbar-brand"><i>Ordering System</i></a>
				</div>
				<div class="nav navbar-nav navbar-left">
					<li><a class="navbar-brand" href="home.php">Home</li></a>
					<li><a class="navbar-brand" href="product.php">Products</li></a>
					<li><a class="navbar-brand" href="faqs.php">FAQs</li></a>
					<li><a class="navbar-brand" href="contact.php">Contact Us</li></a>
					<li><a class="navbar-brand" href="message.php">Messages</li></a>
				</div>
				<div class="nav navbar-nav navbar-right menu">
					<a class="navbar-brand" href="index.php">Logout</a>
				</div>
	   </div>
	</div>
	<div class="cdiv">
		<div class="row">
			<div class="col-md-12" style="background-color:lavender">
				<h1><i>Daniel and Melchor's Online Ordering System!</i></h1>
				<h1><b class="col-md-offset-4">All Accounts</b></h1>
			</div>
		</div>
	</div>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Message</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php

				$sql = "SELECT * FROM message";
				$result = $con->query($sql);
				while($row = $result->fetch_array()){

				// $viewquery = mysql_query("SELECT * FROM message");
				// while($row = mysql_fetch_array($viewquery))
				// {
			?>
			<tr>
				<td><?php echo $row['msgno']?></td>
				<td><?php echo $row['fullname']?></td>
				<td><?php echo $row['email']?></td>
				<td><?php echo $row['message']?></td>
				<td><a href="deletemsg.php?id=<?php echo $row['msgno']?>">Done</a></td>
			</tr>
		</tbody>
		<?php } //mysql_close($con); ?>
	</table>
	<hr/>
	<div class="row">
		<div class="col-md-12" style="text-align:center; font-size: 15px">
			Daniel and Melchor's Online Ordering System!
			<li>quick</li><li>easy</li><li>convinient</li>
		</div>
		<div class="col-md-12" style="text-align:right; font size:5px">
			<i>&copy; 2015 Online Ordering System, Inc.</i>
		</div>
	</div>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>
