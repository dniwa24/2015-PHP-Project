<?php
	// require_once("../include/connection.php");
	include "../include/connection.php";
	$id = $_GET['id'];
	if(isset($_POST['update']))
	{
		$uname = $_POST['uname'];
		$pword = $_POST['pword'];
		$ulevel = $_POST['ulevel'];
		$encpass = md5($pword);
		
		$sql = "UPDATE users SET username = '$uname', password = '$encpass', userlevel = $ulevel WHERE userid = $id ";
		$result = $con->query($sql) or die(mysqli_error());

		// $uquery = mysql_query("UPDATE users SET username = '$uname', password = '$encpass', userlevel = $ulevel WHERE userid = $id");
		// if(!$uquery)
		// 	die(mysql_error());
		// else
			header("location:view.php");
		
	}
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
					<label class="control-label col-md-5">User type: </label>
					<div class="col-md-2">
						<select class="form-control" name="ulevel" class="col-md-4">
							<?php

								$sqlLv = "SELECT * FROM userlv";
								$result = $con->query($sqlLv);

								while($row = $result->fetch_array(MYSQLI_ASSOC))

								// $querylv = mysql_query("SELECT * FROM userlv");
								// while($row = mysql_fetch_array($querylv))
									echo "<option value='" . $row['userlevel'] . "'>" . $row['userdesc'] . "</option>";
							?>
						</select>
					</div>	
				</div>
				<div class="form-group">
					<div class="col-md-12 col-md-offset-5">
						<input type="submit" value="Update" class="btn btn-primary" name="update">
					</div>
				</div>
		</form>	
	</div>
	<br><br><br><br><br><br><br><br>
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
	//mysql_close($con);
?>