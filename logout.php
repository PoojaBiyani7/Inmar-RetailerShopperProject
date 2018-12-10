<body style="background-color:Azure;text-align:center;">
<?php
	session_start();
	
	$_SESSION['count']=0;
	$conn=mysqli_connect("localhost","root","","retailershopperdatabase");
	echo "RETAILER ID is " . $_SESSION['SRID'] . "<br/> SHOPPER ID is " . $_SESSION['SID'] . "<br/><br/>";
	$srid=$_SESSION['SRID'];
	$sid=$_SESSION['SID'];
	
	$sql="UPDATE " . $srid . "fruits SET quantity=quantity+quantitySelected,quantitySelected=0, priceOfSelected=0; ";
	$res=mysqli_query($conn,$sql);
	
	if($res)
		echo "Logged Out Successfully<br/><br/>";
	else
		echo "Logging out failed<br/>";
	

?>	
	<a href="index.html">HOME PAGE</a><br/><br/>
	<a href="retailer.html">RETAILER PAGE</a></br><br/>
	<a href="shopper.html">SHOPPER PAGE</a></br></br>
	<a href="select-store.php">STORE-SELECTION-PAGE</a><br/>
</body>


