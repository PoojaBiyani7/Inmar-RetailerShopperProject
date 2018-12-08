<body style="background-color:Bisque">
Welcome Retailer!!!<br/><br/>

<?php
	$firstname=$_POST['firstname'];
	$lastname= $_POST['lastname'];
	$email= $_POST['email'];
	$password= $_POST['password'];
	$address=$_POST['address'];
	$PAN=$_POST['PAN'];
	
	echo $firstname;
	
	$conn=mysqli_connect("localhost","root","","retailershopperdatabase");
	if($conn){
		echo "SQL Connected<br/>";
	
	$sql = "INSERT INTO retailer(rFirstname,rLastname,rEmail,rPassword,rAddress,rPAN) values('$firstname','$lastname','$email','$password','$address','$PAN');";
	$insert=mysqli_query($conn,$sql);
	if($insert)
		echo "Details added successfully<br/>";
	else {
		echo "Details for this email are already added! <br/>";
		header("location: updation-page.php");
	}
	}
	else
		echo "SQL Connection Failed<br/>";
	
		
?>
Hello Retailer<br/>
<br/>

<?php
$sqlQuery="SELECT * FROM retailer WHERE rEmail='$email';";
$resultQ=mysqli_query($conn,$sqlQuery);
$rowQ=mysqli_fetch_array($resultQ);

if($rowQ){
	$retailerId = $rowQ['rId'];
	$retailerEmail = $rowQ['rEmail'];
	$_SESSION['RetailerID']=$retailerId;
	echo "Retailer Id of current retailer is : " . $retailerId . "<br/>Email is " . $retailerEmail . "<br/>" ;
}
else
	echo "Error in getting retailer Id<br/>";
?>

<br/><br/>
<h1> Add your store Details</h1><br/>
<br/>
<form method="POST" action="store-description.php">
<input type="hidden" name="retailerId" value="<?php echo $retailerId; ?>">
<input type="hidden" name="retailerEmail" value="<?php echo $retailerEmail; ?>">
StoreName:			<input type="text" name="storeName"><br/>
StoreDescription:	<input type="text" name="storeDescription"><br/>
StoreLocation:		<input type="text" name="storeLocation"><br/>
			<input type="submit" name="submit"><br/>
</form>

<br/>
Check Your Wallet :<br/>
<a href="retailer-wallet.php">MY-WALLET</a><br/>
<body>





