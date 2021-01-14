<?php
 require_once("../include/connection.php");
?>
<?php 
require_once("../include/connection.php");
if(isset($_POST['load']))
{
	if(getimagesize($_FILES['uploadedfile']['tmp_name'])){
		$image= addslashes($_FILES['uploadedfile']['tmp_name']);
		$name= addslashes($_FILES['uploadedfile']['name']);
		$image= file_get_contents($image);
		$image= base64_encode($image);
	}
	else
		echo "Please select an image.";
	
	$addprod = $_POST['addprod'];
	$addprice = $_POST['addprice'];
	$desc = $_POST['desc'];
	
	$query = mysql_query("INSERT INTO product(image,name,productname,price,description) VALUES ('$image', '$name', '$addprod', $addprice, '$desc')");
	if(!$query)
		die(mysql_error());
	else
		echo "<script>alert('Successfuly added!')</script>";
}
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
					<li><a class="navbar-brand" href="message.php">Messages</li></a>
				</div>
				<div class="nav navbar-nav navbar-right menu">
					<a class="navbar-brand" href="view.php">View all</a>
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
	</div>
		<div class="row">
			<form class="form-horizontal" enctype="multipart/form-data" action="" method="post">
				<div class="form-group">
					<label class="control-label col-md-5">Add Product: </label>
					<div class="col-md-3">
						<input type="text" class="form-control" placeholder="Add Product" name="addprod">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-5">Price: </label>
					<div class="col-md-3">
						<input type="text" class="form-control" placeholder="Price" name="addprice">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-5">Description: </label>
					<div class="col-md-3">
						<input type="text" class="form-control" placeholder="Description" name="desc">
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-md-5">Choose file to upload:</label>
						<input name="uploadedfile" class="btn btn-primary" type="file">
					<div class="col-md-12 col-md-offset-5">
						<input type="submit" name="load" value="Submit" class="btn btn-success">
						<input type="reset" class="btn btn-danger" value="Reset">
					</div>
				</div>
		</div>
		</form>
		<table class="table table-bordered">
		<thead>
			<tr>
				<th>Product ID</th>
				<th>Image</th>
				<th>Product Name</th>
				<th>Price</th>
				<th>Desc</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
			<?php
				$query = mysql_query("SELECT * FROM product");
				while($row = mysql_fetch_array($query))
				{
			?>
			<tr>
			<td><?php echo $row['productid']; ?></td>
			<td><?php echo '<img height="100" width="100" src="data:image;base64,'.$row[1].' ">';?></td>
			<td><?php echo $row['productname']; ?></td>
			<td><?php echo $row['price']; ?></td>
			<td><?php echo $row['description'];?></td>
			<td><a href="updateprod.php?id=<?php echo $row['productid']; ?>">Update</a> |
				<a href="deleteprod.php?id=<?php echo $row['productid']; ?>">Delete</a></td>
			</tr>
			<?php } mysql_close($con);?>
		</tbody>
		</table>
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