<?php
	// require_once("../include/connection.php");
	include "../include/connection.php";
	$id = $_GET['id'];

	$sql = "SELECT * FROM product WHERE productid = $id";
	$result = $con->query($sql) or die(mysqli_error());

	// $query = mysql_query("SELECT * FROM product WHERE productid = $id");
	$row = $result->fetch_array(MYSQLI_ASSOC);
	// $row = mysql_fetch_array($query);
	if(isset($_POST['update']))
	{
		$newprice = $_POST['price'];

		$usql = "UPDATE product SET price = $newprice WHERE productid = $id";
		$result1 = $con->query($usql) or die(mysqli_error());

		// $uquery = mysql_query("UPDATE product SET price = $newprice WHERE productid = $id");
		// if(!$uquery)
		// 	die(mysql_error());
		// else
		header("location:product.php");
		
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
					<label class="control-label col-md-5">Product ID: </label>
					<div class="col-md-2">
						<input type="text" class="form-control" readonly value="<?php echo $row['productid']; ?>">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-5">Price: </label>
					<div class="col-md-2">
						<input type="text" class="form-control" placeholder="New Price" name="price">
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