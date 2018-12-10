<body style="background-color:Azure;text-align:center">

<?php
session_start();

$date=date('Y-m-d');
$retailerId=$_SESSION['RetailerID'];

$conn=mysqli_connect("localhost","root","","retailershopperdatabase");
$sql="select * from checkforupdateonce where retailerId='$retailerId' and updatedDate='$date';";
$res=mysqli_query($conn,$sql);

if($row=mysqli_fetch_array($res)){
	echo "<h2>You have already updated your store details once !!!<br/> You can't update it more than once!!!</h2><br/><br/>";
	echo "Your retailer id is : " . $retailerId . "<br/><br/>";
	echo "Your store details of today " . $date . " are :- <br/><br/>";
	$sqlD="select * from " . $retailerId . "fruits;";
	$resD= mysqli_query($conn,$sqlD);
	echo "<html> <body style='text-align:center'>";
	echo "<table width=60% align=center text-align=center border='1'><tr><th>FruitName</th><th>Quantity</th><th>Price</th></tr>";


		while($rowD=mysqli_fetch_array($resD))
		{
			$fruitName=$rowD['fruitName'];
			$quantity=$rowD['quantity'];
			$price=$rowD['price'];
			
			echo "<tr><td>" . $fruitName . "</td>";
			echo "<td>" . $quantity . "</td>";
			echo "<td>" . $price . "</td></tr>";
		}
?>

<a href="index.html">Go to the HOME page</a><br/><br/>

Check Your Wallet :<br/><br/>
<a href="retailer-wallet.php">MY-WALLET</a><br/><br/>


<?php
		
}
else{
	header("location: updation-page.php");
}
		
?>
</body>