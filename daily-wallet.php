<body style="background-color:Bisque">
<?php
 session_start();
 $srid=$_SESSION['RetailerID'];
 echo "Your Retailer ID is : " . $srid . "<br/>";
 	$date=$_POST['enteredDate'];
 echo "The Details Of Transactions on " . $date . "are:- <br/><br/>";

 $conn=mysqli_connect("localhost","root","","retailershopperdatabase");
 $retailerWallet=0;
 
//	echo "Your Today's Transactions are: <br/>";
	$sqlT="SELECT transactionDate,shopperId,sRetailerId,retailerWallet from retailershopper where sRetailerId='$srid' and transactionDate='$date';";
	$resT=mysqli_query($conn,$sqlT);
	
	echo "<html> <body style='text-align:center'>";
echo "<table width=70% align=center text-align=center border='1'><tr><th>Transaction Date</th><th>Shopper ID</th><th>Retailer ID</th><th>Retailer Wallet</th></tr>";

	while($rowT=mysqli_fetch_array($resT))
	{
	
		echo "<tr><td>" . $rowT['transactionDate'] . "</td>";
		echo "<td>" . $rowT['shopperId'] . "</td>";
		echo "<td>" . $rowT['sRetailerId'] . "</td>";
		echo "<td>" . $rowT['retailerWallet'] . "</td></tr>";
		
	}
	
	$sqlW="select sum(retailerWallet) from retailershopper where sRetailerId='$srid' and transactionDate='$date';";
	$resW=mysqli_query($conn,$sqlW);
	if($rowW=mysqli_fetch_array($resW))
	{
		$retailerWallet=$rowW['sum(retailerWallet)'];
		echo "The retailer's Wallet on " . $date . "is : " . $retailerWallet . "<br/>";
	}
	else
		echo "The retailer's Wallet on " . $date . "is : " . $retailerWallet . "<br/>";
	
?>


	<a href="index.html" > HOME_PAGE </a><br/>
	<a href="retailer.html">RETAILER_PAGE</a><br/>
	<a href="shopper.html">SHOPPER_PAGE</a><br/>
	<a href="retailer-wallet.php">MY_TOTAL_WALLET</a>
	</body>
	
	