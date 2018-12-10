<body style="background-color:Azure">
Selected Select Page:-

<?php
session_start();


	$conn=mysqli_connect("localhost","root","","retailershopperdatabase");
	
	$retailerId=$_POST['retailerId'];
	$fruitName=$_POST['fruitName'];
	$quantity=$_POST['quantity'];
	$price=$_POST['price'];
	$quantitySelected=$_POST['quantitySelected'];
	
		if($_SESSION['count'] == 0)
		$_SESSION['count']=3;
	
		$_SESSION['count']=$_SESSION['count']-1;
	echo "session count value is " . $_SESSION['count'];
	
	$sqlQ="UPDATE " . $retailerId . "fruits SET quantity=quantity+quantitySelected, quantitySelected=0, priceOfSelected=0 where fruitName='$fruitName';";
	$resQ=mysqli_query($conn,$sqlQ);
	
	
	if($row=mysqli_fetch_array($resQ))
		echo "Selected Successfully<br/>";
	
	
	else
		echo "Selection of item failed<br/>";
	
	$_SESSION['SRID']=$_SESSION['shopperRetailerId'];
header("location: selection-page.php");




?>
<a href="selection-page.php" >Go back to selection-page</a>
</body>