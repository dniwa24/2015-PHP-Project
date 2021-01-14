<?php 
require_once("../include/connection.php");
?>
<html>
<head>
<style>
.cdiv{
	width:100%;
	display: flex;
	justify-content: left;
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
	<br><br><br><br><br>
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
				</div>
				<div class="nav navbar-nav navbar-right menu">
					<a class="navbar-brand" href="index.php">Logout</a>
				</div>
	   </div>
	</div>
	<div class="cdiv">
		<div class="row">
			<div class="col-md-4 glyphicon glyphicon-question-sign gi-2x" style="text-align:center">Still Have Questions? 
				<p>Take a moment to jot down your questions, we'll be happy to answer them.</p>
				<fieldset><legend>Please Call This Number.</legend><p>In case of emergency call me maybe :)</p>
				<p>508-6243 or 0928-942-5848</p></fieldset>
			</div>
			<div class="col-md-8 glyphicon glyphicon-envelope gi-2x">Contact us and we'll get back to you ASAP.
				<form class="form-horizontal" action="" method="post">
				<br>
					<div class="form-group">
							<label class="control-label col-md-2">Name:</label>
						<div class="col-md-6">
							<input type="text" class="form-control" placeholder="Name" name="fname">
						</div>
					</div>
					<div class="form-group">
							<label class="control-label col-md-2">Email:</label>
						<div class="col-md-6">
							<input type="email" class="form-control" placeholder="Email" name="email">
						</div>
					</div>
					<div class="form-group">
							<label class="control-label col-md-2">Message:</label>
						<div class="col-md-6">
							<textarea class="form-control" placeholder="Leave your message here" name="msg"></textarea>
						</div>
					</div>
					<div class="form-group">
						<div class="col-md-6 col-md-offset-2">
							<input type="submit" name="sub" class="btn btn-primary">
							<input type="reset" name="res" class="btn btn-warning">
						</div>
					</div>	
				</form>
			</div>
		</div>
	</div>
	<hr><hr>
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
<?php
if(isset($_POST['sub']))
{
	$name = $_POST['fname'];
	$email = $_POST['email'];
	$msg = $_POST['msg'];
	
	// $query = mysql_query("INSERT INTO message (fullname, email, message) VALUES ('$name', '$email', '$msg')");
	$sql = "INSERT INTO message (fullname, email, message) VALUES ('$name', '$email', '$msg')";
	$result = $con->query($sql);
	if(!$result)
		die("Problem in Inserting" .mysql_error());
	else
		echo "<script>alert('Message sent Successfuly!')</script>";
	
}
?>