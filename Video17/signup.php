<?php include("conn.php"); ?>

<?php 

$msg = "";
if(isset($_REQUEST["btnSubmit"])){
	
	$name = $_REQUEST["txtName"];
	$login = $_REQUEST["txtLogin"];
	$password = $_REQUEST["txtPassword"];
	
	$sql = "Insert into admin(Name,Login,Password) VALUES('$name','$login','$password') ";    
	
	if (mysqli_query($conn, $sql) === TRUE) 
	{      
		$msg = "Account is created successfully!";
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
<form action="" method="post">
	Name: <input type='text' name='txtName' /> <br>
	Login: <input type='text' name='txtLogin' /> <br>
	Password: <input type='text' name='txtPassword' /> <br>
	<input type="submit" value="Sign Up" name="btnSubmit" />
	<span style="color:red"><?php echo $msg ?> </span>
</form>
</body>

</html>























