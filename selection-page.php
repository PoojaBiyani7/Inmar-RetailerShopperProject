<body style="background-color:Bisque;text-align:center;">
<?php
session_start();

echo "Selection - Page<br/>";
echo "You can Select only 3 varieties<br/>";
if(!isset($_SESSION['totalPrice']))
	$_SESSION['totalPrice']=0;


if(isset($_POST['retailerId'])){
	$id=$_POST['retailerId'];
	$_SESSION['shopperRetailerId']=$id;
}
else
	$id=$_SESSION['shopperRetailerId'];

echo "Retailer Id you selected is : " . $id . "<br/>";

$conn=mysqli_connect("localhost","root","","retailershopperdatabase");
$sql="select * from " . $id . "fruits;";
$rs= mysqli_query($conn,$sql);
echo "<br/>";
echo "<table width=70% align=center text-align=center border='1'><tr><th>FruitName</th><th>Quantity</th><th>Price</th><th>Number of Items to buy</th><th> Remove</th><th>Price for no. of items selected</th></tr>";

if($_SESSION['count'] < 3)
{
	if($_SESSION['count']==-10)
		$_SESSION['count']=3;
	
		echo "Count is " . $_SESSION['count'] . "<br/>";  
		

while($row=mysqli_fetch_array($rs))
{
	$fruitName=$row['fruitName'];
	$quantity=$row['quantity'];
	$price=$row['price'];
 echo "<tr><td>" . $fruitName . "</td>"; 
	 echo "<td>" . $row['quantity'] . "</td>";
	     echo "<td>" . $row['price'] . "</td>";
		 if($quantity >=1){
		 echo "<td>
<form method='POST' action='select.php'>
<input type='hidden' name='retailerId' value='" . $id . "'>
<input type='hidden' name='fruitName' value='" . $fruitName . "'>
<input type='hidden' name='quantity' value='" . $quantity . "'>
<input type='hidden' name='price' value='" . $price . "'>
<input type='number' name='quantitySelected'>
<input type='submit' name='submit' value='AddToCart'>
</form>

</td>";
		 
		 }
		 else
			 echo "<td> Out of Stock </td>";
		 if($row['priceOfSelected']){
		 echo "<td>
<form method='POST' action='unselect.php'>
<input type='hidden' name='retailerId' value='" . $id . "'>
<input type='hidden' name='fruitName' value='" . $fruitName . "'>
<input type='hidden' name='quantity' value='" . $quantity . "'>
<input type='hidden' name='price' value='" . $price . "'>
<input type='submit' name='submit' value='RemoveFromCart'>
</form>

		 </td>";}
		 else
			 echo "<td> Nothing added to Remove</td>";
		 echo "<td>" . $row['priceOfSelected'] . "</td></tr>";
}
}
else{
	echo "Can select only 3 varieties!!!";
	header("location: selected-items.php");
}
echo "</table>";
if($rs)
	echo "Records displayed successfully";
else
	echo "Error: " . $sql . "<br>" . $conn->error;

//echo "Total Price = " . $_SESSION['totalPrice'] . "<br/>";


echo "<br/>";

?>

<a href="select-store.php">Go to Store Selection Page</a><br/>
<a href="index.html">Go to HOME page</a><br/>
<a href="logout.php">LOG_OUT</a><br/>

</body>
</html>