<?php 
session_start();
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
			<div class="col-md-12 col-md-offset-6" style="background-color:lavender">
				<h1><i>Daniel and Melchor's Online Ordering System!</i></h1>
			</div>
		</div>
	</div><!-- 
		<div class="row">
			<form class="form-horizontal" enctype="multipart/form-data" action="" method="post">	
		</div>
		</form> -->
		<div class="row">
			<div class="col-md-6">
		<table align="center" border="1">
		<tr>
		<td>
		<table class="table table-bordered">
		<thead>
			<tr>
				<th>Product ID</th>
				<th>Image</th>
				<th>Product Name</th>
				<th>Price</th>
				<th>Desc</th>
				<th>Buy</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$sql = "SELECT * FROM product";
				$result = $con->query($sql);
				while($row = $result->fetch_array(MYSQLI_ASSOC)){


				// $query = mysql_query("SELECT * FROM product");
				// while($row = mysql_fetch_array($query))
				// {
			?>
			<tr>
			<td><?php echo $row['productid']; ?></td>
			<td><?php echo '<img height="100px" width="150px" src="data:image;base64,'.base64_encode($row['image']).' ">';?></td>
			<td><?php echo $row['productname']; ?></td>
			<td><?php echo $row['price']; ?></td>
			<td><?php echo $row['description'];?></td>
			<td><a href="addprod.php?id1=<?php echo $row['productid'] ?>">Add</a></td>
			</tr>
			<?php } ?>
		</tbody>
		</table></td></tr>
		</table>
		</div>
			<div class="col-md-6">
			<table border="1">
			<tr>
				<td>
				<table border="2" class="table table-bordered">
					<tr align="center">
						<th>You orders</th>
						<th>Product Name</th>
						<th>Description</th>
						<th>Price</th>
						<th>Action</th>
					</tr>

					<?php 
					$total=0;
						$id=$_SESSION['id'];
						$sql2 = "SELECT * FROM orders WHERE userid = $id";
						$result = $con->query($sql2) or die(mysqli_error());
						while($row2 = $result->fetch_array(MYSQLI_ASSOC)){
						// $query2 = mysql_query("SELECT * FROM orders WHERE userid=$id");
						// while($row2=mysql_fetch_array($query2))
						// { 			
						?>
						<tr>
						<td><?php echo $row2['orderid'] ?></td>
						<td><?php echo $row2['productname'] ?></td>
					 	<td><?php echo $row2['description']; ?></td>
						<td><?php echo $row2['price'];
						$total += $row2['price']; ?></td>
						<td><a href="deleteorder.php?id_del= <?php echo $row2['orderid'] ?>">Cancel</a></td>
						</tr>
					 <?php } 
					 ?>
					 <tr>
					 <td align="right" colspan="3"><?php echo "Total =";?></td>
					 <td><?php echo $total; ?></td>
					 </tr>
				</table>
				</td></tr>
				<tr><td>
				<form class="horizontal" action="" method="post">
				<div class="form-group">
					<div class="col-md-12 col-md-offset-5">
						<input type="submit" value="Submit" class="btn btn-primary" name="chor">
					</div>
				</div>
				</form>

			</td></tr>
			</table>
			</div>
		</div>
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
if(isset($_POST['chor'])){
	echo "<script>confirm('Please pay this amount right here, right now! ".$total."')</script>";
}
?>