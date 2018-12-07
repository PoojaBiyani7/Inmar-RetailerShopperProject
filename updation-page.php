updation-page: -

<?php
session_start();
$id=$_SESSION['sessionRetailerId'];
echo "Session Variable Value Retailer Id -" . $id;
$conn=mysqli_connect("localhost","root","","retailershopperdatabase");
$sql="select * from " . $id . "fruits;";
$rs= mysqli_query($conn,$sql);
echo "<html> <body style='text-align:center'>";
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

echo "</body></html>";

?>
<a href="index.html">Go to the HOME page</a>