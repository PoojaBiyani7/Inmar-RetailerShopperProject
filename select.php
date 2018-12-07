Selected Select Page:-

<?php
session_start();
	
	$quantitySelected=$_POST['quantitySelected'];
if($quantitySelected!=0)
{
	$_SESSION['count']=$_SESSION['count']+1;
	
if($_SESSION['count']==0)
	$_SESSION['count']=3;
	
	if($_SESSION['count'] <=3)
	{
	echo "session count value is " . $_SESSION['count'];
	$conn=mysqli_connect("localhost","root","","retailershopperdatabase");
	
	$retailerId=$_POST['retailerId'];
	$fruitName=$_POST['fruitName'];
	$quantity=$_POST['quantity'];
	$price=$_POST['price'];

	
	
	if($quantity>=$quantitySelected)
	$sqlQ="UPDATE " . $retailerId . "fruits SET quantity='$quantity'-'$quantitySelected', quantitySelected='$quantitySelected', priceOfSelected='$price'*'$quantitySelected' where fruitName='$fruitName';";
	$resQ=mysqli_query($conn,$sqlQ);
	
	if($row=mysqli_fetch_array($resQ)){
		echo "Selected Successfully<br/>";
	}
	else{
		echo "Selection of item failed as quantiy selected is greater than the quatity present<br/>";
//		$_SESSION['count']=$_SESSION['count']-1;
	}
	}
	$_SESSION['SRID']=$_SESSION['shopperRetailerId'];
}
header("location: selection-page.php");




?>
<a href="selection-page.php" >Go back to selection-page</a>