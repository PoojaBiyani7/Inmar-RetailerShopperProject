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
		echo "Logged Out Successfully";
	else
		echo "Logging out failed";
		
	
	
	$sql="INSERT INTO retailershopper(shopperId,sRetailerId,shopperTransactionWallet,shopperWallet,retailerWallet) VALUES ('$sid','$srid',shopperTransactionWallet-'$amount',shopperWallet-'$amount',retailerWallet+'$amount');";
	$res=mysqli_query($conn,$sql);
	
	if($res)
		echo "Payment Successfull<br/>";
	else
		echo "Payment Failed<br/>";
	
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