Select the Store :-

<?php
session_start();
	$conn=mysqli_connect("localhost","root","","retailershopperdatabase");
	echo "Your Shopper Id is : " . $_SESSION['SID'] . "<br/>";
	echo "Available Stores are :-<br/>";
	$storeSql= "select retailerId,retailerEmail,storeName from store;";
	$storeRes=mysqli_query($conn,$storeSql);
	
	echo "<html> <body style='text-align:center'>";
echo "<table width=60% align=center text-align=center border='1'><tr><th>RetailerId</th><th>RetailerEmail</th><th>StoreName</th></tr>";

while($row=mysqli_fetch_array($storeRes))
	{
			echo "<tr><td>" . $row['retailerId'] . "</td>";
			echo "<td>" . $row['retailerEmail'] . "</td>";
			echo "<td>" . $row['storeName'] . "</td></tr>";
	}	
	

echo "</body></html>";

?>
<h4>
Enter the RetailerId of the StoreName you want to purchase fruits from :</hr>  
<form method="POST" action="selection-page.php">
<input type="number" name="retailerId" placeholder="RetailerId">
<input type="submit" name="submit">
</form>
</pre>




