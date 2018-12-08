<body style="background-color:Bisque;text-align:center;">

updation-page: -

<?php
session_start();
$id=$_SESSION['sessionRetailerId'];
echo "Session Variable Value Retailer Id -" . $id;
$conn=mysqli_connect("localhost","root","","retailershopperdatabase");

$date=date('Y-m-d');
$retailerId=$_SESSION['RetailerID'];

$sql="select * from " . $id . "fruits;";
$rs= mysqli_query($conn,$sql);
echo "";
echo "<table width=60% align=center text-align=center border='1'><tr><th>FruitName</th><th>Quantity</th><th>UpdateQuantity</th><th>Price</th><th>Update Price</th></tr>";


while($row=mysqli_fetch_array($rs))
{
	$fruitName=$row['fruitName'];
	$quantity=$row['quantity'];
	$price=$row['price'];
 echo "<tr><td>" . $fruitName . "</td>"; 
	 echo "<td>" . $row['quantity'] . "</td><td>
<form method='POST' action='update-quantity.php'>
<input type='hidden' name='retailerId' value='" . $id . "'>
<input type='hidden' name='fruitName' value='" . $fruitName . "'>
<input type='number' name='updatedQuantity'>
<input type='hidden' step='0.01' name='price' value='" . $price . "'>
<input type='submit' name='submit' value='UpdateQuantity'>
</form>
</td>";
	     echo "<td>" . $row['price'] . "</td><td>
<form method='POST' action='update-price.php'>
<input type='hidden' name='retailerId' value='" . $id . "'>
<input type='hidden' name='fruitName' value='" . $fruitName . "'>
<input type='hidden' name='quantity' value='" . $quantity . "'>
<input type='number' step='0.01' name='updatedPrice'>
<input type='submit' name='submit' value='UpdatePrice'>
</form>
</td></tr>"; 
}
echo "</table>";
if($rs)
	echo "Records displayed successfully";
else
	echo "Error: " . $sql . "<br>" . $conn->error;

echo "";


$sqlU="INSERT INTO checkforupdateonce values('$retailerId','$date');";
$resU=mysqli_query($conn,$sqlU);
if($resU)
	echo "Updation Date and Id Registered successfully<br/>";
else
	echo "Updation Date and Id Registering <br/>";

?><br/>
<a href="index.html">Go to the HOME page</a><br/>

Check Your Wallet :<br/>
<a href="retailer-wallet.php">MY-WALLET</a><br/>
</body>

