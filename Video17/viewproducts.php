<?php include("conn.php"); ?>

<?php 


$sql = "select * from product";    
$result = mysqli_query($conn, $sql);  
$recordsFound = mysqli_num_rows($result);     
$results = array();  
if ($recordsFound > 0) {   
	while($row = mysqli_fetch_assoc($result)) 
	{   
		
		$picurl = $row["PicURL"];
		$Name = $row["Name"];
		$Price = $row["Price"];
		$TypeId = $row["TypeId"];
		$description = $row["Description"];
		$updatedon = $row["UpdatedOn"];
		$updatedby = $row["UpdatedBy"];
		
		echo "<div>";
		echo "<img src='img/$picurl' style='width:50px;height:50px;' /> <br>";
		echo "<h2>$Name</h2>";		
		echo "Type:$TypeId<br>";
		echo "Price:$Price<br>";
		echo "Description:$description<br>";
		echo "updated by:$updatedby<br>";
		echo "updated on:$updatedon<br>";
		echo "<a href='#'>Delete</a>";
		echo "<a href='#'>Edit</a>";
		echo "</div>";
	}  
}

?>
