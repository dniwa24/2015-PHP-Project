<?php
	// require_once("../include/connection.php");
	include "../include/connection.php";
?>
<html>
<head>
<style>
.cdiv{
	height:25%;
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
					<a href="index.php" class="navbar-brand">Go Back</a>
				</div>
	   </div>
	</div>
	<div class="cdiv">
		<div class="row">
			<div class="col-md-12" style="background-color:lavender">
				<h1><i>Daniel and Melchor's Online Ordering System!</i></h1>
			</div>
		</div>
	</div>
	<div class="row">
		<form class="form-horizontal" action="" method="post">
			<br>
				<div class="form-group">
					<label class="control-label col-md-5">First name: </label>
					<div class="col-md-2">
						<input type="text" class="form-control" placeholder="First Name" name="fname">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-5">Last name: </label>
					<div class="col-md-2">
						<input type="text" class="form-control" placeholder="Last Name" name="lname">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-5">Gender: </label>
					<div class="col-md-2">
						<input type="radio" class="inline-radio" name="gender" value="Male">Male
						<input type="radio" class="inline-radio" name="gender" value="Female">Female
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-5">Username: </label>
					<div class="col-md-2">
						<input type="text" class="form-control" placeholder="Username" name="uname">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-5">Password: </label>
					<div class="col-md-2">
						<input type="password" class="form-control" placeholder="Password" name="pword">
					</div>
				</div>
				<div class="form-group">
					<div class="col-md-12 col-md-offset-5">
						<input type="submit" value="Submit" class="btn btn-primary" name="submit">
						<input type="reset" value="Reset" class="btn btn-danger">
					</div>
				</div>
		</form>	
	</div>
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
<?php
	if(isset($_POST['submit'])){
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$gender = $_POST['gender'];
		$uname = $_POST['uname'];
		$pword = $_POST['pword'];
		$epass = md5($pword);
		
		if($fname == "")
			echo "<script> alert('First name is required') </script>";
		else if(!preg_match("/[a-z]/i", "$fname"))
			echo "<script> alert('Letters only!') </script>";
		if($lname == "")
			echo "<script> alert('Last name is required') </script>";
		else if(!preg_match("/[a-z]/i", "$lname"))
			echo "<script> alert('Letters only!') </script>";
		if($gender == "")
			echo "<script> alert('Gender is required') </script>";
		if($uname == "")
			echo "<script> alert('Username is required') </script>";
		if($pword == "")
			echo "<script> alert('Password is required') </script>";
		else
		{
			$query = "INSERT INTO users (firstname, lastname, gender, username, password, userlevel) VALUES ('$fname', '$lname', '$gender', '$uname', '$epass', 2)";
			$result = $con->query($query);

			// $insquery = mysql_query("INSERT INTO users(firstname, lastname, gender, username, password, userlevel) VALUES ('$fname','$lname','$gender','$uname', '$epass', 2)");
			header("location:index.php");
		}
	// mysql_close($con);	
	}
?>