<body style="background-color:Bisque">
<?php
//session_start();
//echo "Session Id : " . $_SESSION['sessionRetailerId'];

$conn=mysqli_connect("localhost","root","","retailershopperdatabase");
echo "Update Page";
$updatedPrice=$_POST['updatedPrice'];
echo "Updated Price " . $updatedPrice;
$retailerId=$_POST['retailerId'];
$fruitName=$_POST['fruitName'];
$quantity=$_POST['quantity'];
echo "RetailerId - " . $retailerId;
echo "Fruit Name - " . $fruitName;
echo "Quantity - " . $quantity;

$sql="UPDATE " . $retailerId . "fruits SET price='$updatedPrice' where fruitName='$fruitName';";
$res=mysqli_query($conn,$sql);

if($res)
	echo "Price updated successfully";
else
	echo "Price updation failed";

header("location: updation-page.php");
?>

<!--<a href="updation-page.php">Back to Updation Page</a>-->
</body>