<?php
	require_once("../include/connection.php");
?>
<html>
<body>

<form enctype="multipart/form-data" action="" method="POST">

<input type="hidden" name="MAX_FILE_SIZE" value="100000" />
Choose a file to upload: <input name="uploadedfile" type="file" /><br />
<input type="submit" name="load" value="Upload File" />

</form>
</body>
</html>

<?php
if(isset($_POST['load'])){
	function saveimage($name, $image){
	$query = mysql_query("INSERT INTO images (name, image) VALUES ('$name', '$image')");
	if(!$query)
		die(mysql_error());
	else
		echo "<script> alert('Image Uploaded') </script>";
	}
	function displayimage(){
	$query = mysql_query("SELECT * FROM images");
	while($row = mysql_fetch_array($query)){
		echo '<img height="300" width="300" src="data:image;base64,'.$row[2].' "> ';
		}
	}
	if(getimagesize($_FILES['uploadedfile']['tmp_name']) == FALSE)
    {
        echo "Please select an image.";
    }
    else
    {
		$image= addslashes($_FILES['uploadedfile']['tmp_name']);
        $name= addslashes($_FILES['uploadedfile']['name']);
        $image= file_get_contents($image);
        $image= base64_encode($image);
        saveimage($name,$image);
    }
	displayimage();
	mysql_close($con);
}
?>