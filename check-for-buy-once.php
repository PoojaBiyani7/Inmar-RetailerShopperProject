<body style="background-color:Bisque">

<?php
session_start();

$date=date("Y-m-d");
$retailerId=$_POST['retailerId'];

	$sid=$_SESSION['SID'];
	$conn=mysqli_connect("localhost","root","","retailershopperdatabase");
	echo "Your Shopper Id is : " . $_SESSION['SID'] . "<br/><br/>";
	

$sqlQ="select transactionDate,shopperId,sRetailerId from retailershopper where transactionDate='$date' and shopperId='$sid' and sRetailerId='$retailerId';";
$resQ=mysqli_query($conn,$sqlQ);

if($row=mysqli_fetch_array($resQ))
{
	echo "You can't buy from the same retailer same day!!!<br/><br/>";
	header("location: logout-r.php");
}
else{
	
if(isset($_POST['retailerId'])){
	$id=$_POST['retailerId'];
	$_SESSION['shopperRetailerId']=$id;
}
else
	$id=$_SESSION['shopperRetailerId'];

	header("location: selection-page.php");
}

/*
$storeSql= "select retailerId from store;";
	$storeRes=mysqli_query($conn,$storeSql);
	
	while($row=mysqli_fetch_array($storeRes))
	{
		if($retailerId==$row['retailerId'])
			header("location: selection.php");
	}
	
	header("lacation: select-store.php");
	
	*/
?>
</body>


