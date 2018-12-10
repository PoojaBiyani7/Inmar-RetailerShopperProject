<body style="background-color:Azure;text-align:center">
<?php
 session_start();
 $srid=$_SESSION['RetailerID'];
 echo "Your Retailer ID is : " . $srid . "<br/>";
 	$date=date('Y-m-d');

 $conn=mysqli_connect("localhost","root","","retailershopperdatabase");
 $retailerWallet=0;
 
 
 
 $sqlR="select sum(retailerWallet) from retailershopper where sRetailerId='$srid';";
 $resR=mysqli_query($conn,$sqlR);

	if($rowR=mysqli_fetch_array($resR)){
		$retailerWallet=$retailerWallet+$rowR['sum(retailerWallet)'];
		echo "The Retailer's Wallet is : ". $retailerWallet . "<br/><br/><br/>";
	}
	
//	echo "Your All Daily Transactions are: <br/>";
	$sqlQ="SELECT transactionDate,shopperId,sRetailerId,retailerWallet from retailershopper where sRetailerId='$srid' ;";
	$resQ=mysqli_query($conn,$sqlQ);
	
	
	echo "<html> <body style='text-align:center'>";
echo "<table width=70% align=center text-align=center border='1'><caption><h3>Your All Daily Transactions are:<br/><br/></h3></caption><tr><th>Transaction Date</th><th>Shopper ID</th><th>Retailer ID</th><th>Retailer Wallet</th></tr>";

	while($rowQ=mysqli_fetch_array($resQ))
	{
	
		echo "<tr><td>" . $rowQ['transactionDate'] . "</td>";
		echo "<td>" . $rowQ['shopperId'] . "</td>";
		echo "<td>" . $rowQ['sRetailerId'] . "</td>";
		echo "<td>" . $rowQ['retailerWallet'] . "</td></tr>";
		
	}
	
	?>
	
	<a href="index.html" > HOME_PAGE </a><br/>
	<a href="retailer.html">RETAILER_PAGE</a><br/>
	<a href="shopper.html">SHOPPER_PAGE</a><br/>
	<a href="logout-r.php">LOG_OUT</a><br/>
	
	<h3>Enter the date for which you want check the transactions!</h3><br/>
	<form method="POST" action="daily-wallet.php">
	<input type="date" name="enteredDate" placeholder="Date">
	<input type="submit" name="submit"><br/><br/>
	</form>
	
	
	</body>