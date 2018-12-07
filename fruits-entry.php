<?php
session_start();
$retailerId=$_SESSION["sessionRetailerId"];
	echo "Session Id " . $_SESSION["sessionRetailerId"];
	echo " retailer Id : " . $retailerId;
	
	$conn=mysqli_connect("localhost","root","","retailershopperdatabase");
	
	for ($x = 1; $x < 10; $x++) {
	$f=$_POST['f' . $x . ''];
	$q=$_POST['q' . $x . ''];
	$p=$_POST['p' . $x . ''];

	$sql="INSERT INTO " . $retailerId . "fruits(fruitName,quantity,price) values('$f','$q','$p');";
	$insertQ=mysqli_query($conn,$sql);
	}
	
?>

<form method="POST" action="updation-page.php">
<input type="submit" name="submit" value="Display">
</form>


<?php
/*
$sql="select * from " . $retailerId . "fruits;";
$rs= mysqli_query($conn,$sql);
echo "<table width=100% border='1'><tr><th>FruitName</th><td>Quantity</td><td>Price</td></tr>";


while($row=mysqli_fetch_array($rs))
{
 echo "<tr><td>" . $row['fruitName'] . "</td>"; 
	 echo "<td>" . $row['quantity'] . "</td>";
	     echo "<td>" . $row['price'] . "</td></tr>"; 
}
echo "</table>";
if($rs)
	echo "Records displayed successfully";
else
	echo "Error: " . $sql . "<br>" . $conn->error;
*/
?>

