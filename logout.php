<body style="text-align:center">
<?php
	session_start();
	$_SESSION['count']=0;
	$conn=mysqli_connect("localhost","root","","retailershopperdatabase");
	echo "Shopper RETAILER ID is : - " . $_SESSION['SRID'] . "<br/> and Shopper ID is " . $_SESSION['SID'] . "<br/>";
	$srid=$_SESSION['SRID'];
	$sid=$_SESSION['SID'];
	
	$sql="UPDATE " . $srid . "fruits SET quantity=quantity+quantitySelected,quantitySelected=0, priceOfSelected=0; ";
	$res=mysqli_query($conn,$sql);
	
	if($res)
		echo "Logged Out Successfully";
	else
		echo "Logging out failed";
?>	
	<a href="index.html">HOME</a><br/>
	<a href="retailer.html">RETAILER PAGE</a></br>
	<a href="shopper.html">SHOPPER PAGE</a></br>
</body>


