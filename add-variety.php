<body style="background-color:Azure;text-align:center">

<?php
session_start();
$retailerId=$_SESSION["sessionRetailerId"];
	echo "Session Id " . $_SESSION["sessionRetailerId"] . "<br/>";
	echo " retailer Id : " . $retailerId . "<br/>";
	
	$f=$_POST['f'];
	$q=$_POST['q'];
	$p=$_POST['p'];
	
	$conn=mysqli_connect("localhost","root","","retailershopperdatabase");
	
	$sql="INSERT INTO " . $retailerId . "fruits(fruitName,quantity,price) values('$f','$q','$p');";
	$insertQ=mysqli_query($conn,$sql);
	if($insertQ)
		echo "<br/>Details of New Variety added successfully<br/>";
	else 
		echo "Error in adding New Variety<br/>";
	
	header("location: updation-page.php");
?>

<br/>
<a href="index.html">Go to the HOME page</a><br/><br/>

Check Your Wallet : 
<a href="retailer-wallet.php">MY-WALLET</a><br/><br/><br/>

<a href="logout-r.php">LOG_OUT</a><br/>
</body>

