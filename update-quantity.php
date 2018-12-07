<?php
//session_start();
//echo "Session Id : " . $_SESSION['sessionRetailerId'];

$conn=mysqli_connect("localhost","root","","retailershopperdatabase");
echo "Update Page";
$updatedQuantity=$_POST['updatedQuantity'];
$retailerId=$_POST['retailerId'];
$fruitName=$_POST['fruitName'];
$price=$_POST['price'];
echo "RetailerId - " . $retailerId;
echo "Fruit Name - " . $fruitName;


$sql="UPDATE " . $retailerId . "fruits SET quantity='$updatedQuantity' where fruitName='$fruitName';";
$res=mysqli_query($conn,$sql);

if($res)
	echo "Quantity updated successfully";
else
	echo "Quantity updation failed";

header("location: updation-page.php");
?>

<!--<a href="updation-page.php">Back to Updation Page</a>-->