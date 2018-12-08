<body style="background-color:Bisque">
Store Description<br/>

<?php 
session_start();
$conn=mysqli_connect("localhost","root","","retailershopperdatabase");
	$retailerId=$_POST['retailerId'];
	$retailerEmail=$_POST['retailerEmail'];
	$storeName=$_POST['storeName'];
	$storeDescription=$_POST['storeDescription'];
	$storeLocation=$_POST['storeLocation'];
	
	echo "Retailer Id - " . $retailerId . "<br/> Retailer Email - " . $retailerEmail . "<br/>";
	
	$sqlQ="INSERT INTO store values('$retailerId','$retailerEmail','$storeName','$storeDescription','$storeLocation');";
	$insertQ=mysqli_query($conn,$sqlQ);
	if($insertQ)
		echo "Details about the store added successfully";
	else 
		echo "Adding Store Details Failed as already exist.";
	
	
	$sqlQuery="SELECT * FROM store WHERE retailerId='$retailerId'";
	$resultQ=mysqli_query($conn,$sqlQuery);
	$rowQ=mysqli_fetch_array($resultQ);

	if($rowQ)
		echo "StoreName : " .$rowQ['storeName'] . "<br/>";
	else
		echo "No store with this Retailer Id - " . $id;
	
	
	$_SESSION["sessionRetailerId"] = $retailerId;
	echo "Session Id " . $_SESSION["sessionRetailerId"];

	
	$sqlQ3="CREATE TABLE " . $retailerId ."fruits ( fruitName varchar(20) unique, quantity int, price double unique, quantitySelected int default 0, priceOfSelected double default 0 );";
	$resQ3=mysqli_query($conn,$sqlQ3);
	if($resQ3){
		echo "Table created successfully <br/>";
?>

<?php		
	}
		
	else
		echo "Table creation failed as you already have one table----please enter the details <br/>";
?>
	<a href="fruits-details.php" >Enter Fruits Details</a><br/>
</body>