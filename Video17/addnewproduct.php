<?php include("conn.php"); ?>
<?php include("utility.php"); ?>
<?php 

$msg = "";
if(isset($_REQUEST["btnSubmit"])){
	
	$name = $_REQUEST["txtName"];
	$price = $_REQUEST["txtPrice"];
	$type = $_REQUEST["type"];
	
	$desc = $_REQUEST["description"];
	
	$file = $_FILES["prodimg"];
	$src_path = $file["tmp_name"];
	$filename = $file["name"];
	
	$new_name = SaveFile($src_path,$filename);
	$updated_on = date('Y-m-d H:i:s');
	$updated_by = "admin";
	
	$sql = "Insert into product(Name,Price,TypeId,description,picurl,updatedon,updatedby,isactive) VALUES('$name','$price','$type','$desc','$new_name','$updated_on','$updated_by',1) ";    
	
	if (mysqli_query($conn, $sql) === TRUE) 
	{      
		$msg = "Product is created successfully!";
	} 
	else 
	{   
		//$msg = "Unable to create account, Try again!";
		$msg = "Error: " . $sql . "" . mysqli_error($conn);  
	}
}
?>

<html>
<head>
</head>
<body>
<form action="" method="post" enctype="multipart/form-data">
	Name: <input type='text' name='txtName' /> <br>
	Price: <input type='text' name='txtPrice' /> <br>
	Type Select: <select name="type">
	<?php 
	$sql = "SELECT * FROM type";    
	$result = mysqli_query($conn, $sql);    
	$recordsFound = mysqli_num_rows($result);       
	if ($recordsFound > 0) {     
		while($row = mysqli_fetch_assoc($result)) {           
			$id = $row["TypeId"];      
			$name = $row["TypeName"];      
			echo "<option value='$id'>$name</option>";     
		}    
	}
	
	?>
	</select> <br>
	Description: <br>
	<textarea name="description" ></textarea> <br>
	Picture <br>
	<input type="file" name="prodimg" />
	<input type="submit" value="Sign Up" name="btnSubmit" />
	<span style="color:red"><?php echo $msg ?> </span>
</form>
</body>

</html>























