<?php include("conn.php"); ?>

<?php 

$msg = "";
$login = "";
if(isset($_REQUEST["btnSubmit"])){

	$login = $_REQUEST["txtLogin"];
	$password = $_REQUEST["txtPassword"];
	
	$sql = "Select * from admin where login='$login' and password='$password' ";  
	$result = mysqli_query($conn, $sql);
	 $recordsFound = mysqli_num_rows($result); 
	
	if($recordsFound == 1)
		header("location:adminhome.php");
	else 
		$msg = "Invalid Login/Password";
}
?>

<html>
<head>
</head>
<body>
<form action="" method="post">	
	Login: <input type='text' name='txtLogin' value='<?php echo $login ?>' /> <br>
	Password: <input type='text' name='txtPassword' /> <br>
	<input type="submit" value="Login" name="btnSubmit" />
	<span style="color:red"><?php echo $msg ?> </span>
</form>
</body>

</html>























