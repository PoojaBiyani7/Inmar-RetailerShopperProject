<body style="background-color:Azure;text-align:center"><br/>
<?php
session_start();
echo "You can select only 3 varieties of Fruits!!!<br/>";

echo " ";

$totalPrice=0;
	$conn=mysqli_connect("localhost","root","","retailershopperdatabase");
	$id=$_SESSION['shopperRetailerId'];
	$_SESSION['count']=-10;
echo "Retailer Id you selected is : " . $id;
$sql="select * from " . $id . "fruits where priceOfSelected!=0;";
$rs= mysqli_query($conn,$sql);
echo "<html> <body style='text-align:center'><br/><br/>";
echo "<table width=60% align=center text-align=center border='1'><caption>Your Selected Items are:-</caption><tr><th>FruitName</th><th>QuantitySelected</th><th>PriceOfSelected</th></tr>";
while($row=mysqli_fetch_array($rs))
{
	$fruitName=$row['fruitName'];
	$quantitySelected=$row['quantitySelected'];
	$priceOfSelected=$row['priceOfSelected'];
	
	echo "<tr><td>" . $fruitName ."</td>";
	echo "<td>" . $quantitySelected . "</td>";
	echo "<td>" . $priceOfSelected . "</td></tr>";	
}

$sqlSum="select sum(priceOfSelected) from " . $id . "fruits where priceOfSelected!=0;";
$rsSum=mysqli_query($conn,$sqlSum);


if($row=mysqli_fetch_array($rsSum))
{
	echo "Sum of Prices is " . $row['sum(priceOfSelected)'] . "<br/>";
	$totalPrice=$totalPrice+$row['sum(priceOfSelected)'];
}


echo "Final Total Price : " . $totalPrice . "<br/>";

//echo "Total Price : " . $_SESSION['totalPrice'] . "<br/>";
?>
<br/>
<form method="POST" action="selection-page.php">
<input type="submit" name="submit" value="GoBackToSelectOtherVariety">
</form>
<br/><br/>
<form method="POST" action="payment.php">
<input type="hidden" name="totalPrice" value="<?php echo $totalPrice ?>">
<input type="submit" name="submit" value="PAY">
</form>
<br/><br/>
<a href="index.html" >Go to HOME page</a><br/><br/>

<form method="POST" action="logout.php">
<input type="submit" name="submit" value="Log-Out">
</form><br/>
</body>
