<body style="background-color:Azure;text-align:center;">
Select the Store :-

<?php
session_start();
	
	$sid=$_SESSION['SID'];
	$conn=mysqli_connect("localhost","root","","retailershopperdatabase");
	echo "Your Shopper Id is : " . $_SESSION['SID'] . "<br/>";
	echo "Available Stores are :-<br/>";
	$storeSql= "select retailerId,retailerEmail,storeName from store;";
	$storeRes=mysqli_query($conn,$storeSql);
	
	echo "<br/>";
echo "<table width=60% align=center text-align=center border='1'><tr><th>RetailerId</th><th>RetailerEmail</th><th>StoreName</th></tr>";

while($row=mysqli_fetch_array($storeRes))
	{
			echo "<tr><td>" . $row['retailerId'] . "</td>";
			echo "<td>" . $row['retailerEmail'] . "</td>";
			echo "<td>" . $row['storeName'] . "</td></tr>";
	}	

	

echo "<br/>";

?>

<h4>
Enter the RetailerId of the StoreName you want to purchase fruits from :</h4>  
<form method="POST" action="check-for-buy-once.php">
<input type="number" name="retailerId" placeholder="RetailerId">
<input type="submit" name="submit">
</form><br/>
<h4>If you try to buy from the same retailer more than once a day....you will be logged out!!!<h4/>
<h4>Please make sure that you buy from different retailers in one Day!!!</h4>
<br/>

