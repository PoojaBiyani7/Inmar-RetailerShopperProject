<body style="background-color:Azure;text-align:center">
<?php 

 session_start();
 $conn=mysqli_connect("localhost","root","","retailershopperdatabase");
 echo "Shopper RETAILER ID is : - " . $_SESSION['SRID'] . "<br/> and Shopper ID is " . $_SESSION['SID'] . "<br/>";
	$srid=$_SESSION['SRID'];
	$sid=$_SESSION['SID'];
	$amount=$_POST['totalPrice'];
	echo "Total Amount to be paid is " . $amount . "<br/>";
	
	$sqlP="UPDATE " . $srid . "fruits SET quantitySelected=0, priceOfSelected=0; ";
	$resP=mysqli_query($conn,$sqlP);
	
	if($resP)
		echo "Logged Out Successfully<br/>";
	else
		echo "Logging out failed<br/>";
	
	$date=date("Y-m-d");
	echo "Transaction Payment Date : " . $date . "<br/>";
	
	$sqlS="select sum(100-shopperTransactionWallet) from retailershopper where transactionDate='$date' and shopperId='$sid';";
	$resS=mysqli_query($conn,$sqlS);
	
	if($rowS=mysqli_fetch_array($resS)){
		echo "Earlier expenses of today are : " . $rowS['sum(100-shopperTransactionWallet)'] . "<br/>";
		$todayWallet = 100 - ($amount + $rowS['sum(100-shopperTransactionWallet)']);
		echo "The Shopper's Wallet Amount of today is : " . $todayWallet . "<br/>";
	}
	
	$sqlT="select sum(3500-shopperWallet) from retailershopper where shopperId='$sid';";
	$resT=mysqli_query($conn,$sqlT);
	
	if($rowT=mysqli_fetch_array($resT)){
		echo "Last Expenses from shopper Wallet are : " . $rowT['sum(3500-shopperWallet)'] . "<br/>";
		$totalWallet = 3500 - ($amount + $rowT['sum(3500-shopperWallet)']);
		echo "The Shopper's Wallet is : " . $totalWallet . "<br/>";
	}
	
	$sqlR="select sum(retailerWallet) from retailershopper where sRetailerId='$srid';";
	$resR=mysqli_query($conn,$sqlR);
	
	if($rowR=mysqli_fetch_array($resR)){
		$retailerWallet=$amount;
		echo "The Retailer's Wallet as of this Transaction is : ". $amount . "<br/>";
	}
	
	
	$sql="INSERT INTO retailershopper(transactionDate,shopperId,sRetailerId,shopperTransactionWallet,shopperWallet,retailerWallet) VALUES ('$date','$sid','$srid','$todayWallet','$totalWallet','$retailerWallet');";
	$res=mysqli_query($conn,$sql);
	
	if($res)
		echo "Payment Successfull<br/>";
	else{
//	echo "Payment Failed as you can purchase from one retailer only once a day!!!<br/>";
	header("location : logout.php");
	/*	$sqlZ="UPDATE " . $srid . "fruits SET quantity=quantity+quantitySelected, quantitySelected=0, priceOfSelected=0;";
		$resZ=mysqli_query($conn,$sqlZ);
	
	if($resZ)
		echo "Reverted Successfully<br/>";
	else
	echo "Reversion failed<br/>";
	*/
	}
	
	
	
	$sqlQ="SELECT * from retailershopper;";
	$resQ=mysqli_query($conn,$sqlQ);
	
	echo "Details Are :- <br/>";
	echo "<html> <body style='text-align:center'>";
echo "<table width=70% align=center text-align=center border='1'><tr><th>Transaction Date</th><th>Shopper ID</th><th>Retailer ID</th><th>Shopper Transaction Wallet</th><th>Shopper Wallet</th><th>Retailer Wallet</th></tr>";

	while($rowQ=mysqli_fetch_array($resQ))
	{
	
		echo "<tr><td>" . $rowQ['transactionDate'] . "</td>";
		echo "<td>" . $rowQ['shopperId'] . "</td>";
		echo "<td>" . $rowQ['sRetailerId'] . "</td>";
		echo "<td>" . $rowQ['shopperTransactionWallet'] . "</td>";
		echo "<td>" . $rowQ['shopperWallet'] . "</td>";
		echo "<td>" . $rowQ['retailerWallet'] . "</td></tr>";
		
	}
?>

<a href="select-store.php" > STORE-SELECTION-PAGE</a><br/>
<a href="index.html" > HOME-PAGE</a><br/>
<a href="logout.php" >LOG_OUT</a><br/>



</body>