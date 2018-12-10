<body style="background-color:Azure">

<?php
session_start();
$email =$_POST['email'];
$password=$_POST['password'];
$_SESSION['date']=date('Y-m-d');
$date=$_SESSION['date'];

if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^",$email))
{ 
echo "<center><font face='Verdana' size='2' color=red>Invalid email</font></center>";
}else{
echo "<center><font face='Verdana' size='2' color=green>Valid Email</font></center>";
}
$conn=mysqli_connect("localhost","root","","retailershopperdatabase");
$sql="SELECT * FROM retailer WHERE rEmail='$email';";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);

//echo $row['rPassword'];

if($row){
	$pass= $row['rPassword'];
	$id=$row['rId'];
	$email=$row['rEmail'];
	$_SESSION["sessionRetailerId"]=$id;
	$_SESSION['RetailerID']=$id;
}

//echo "password : " . $password;
//echo "result : " . $pass;

if(strcmp($password,$pass)==0)
	echo "Login ok with session id : " . $_SESSION["sessionRetailerId"];
else
	echo "Login Failed";
?>

Please update the details of your store!!!<br/>

Your store is : 

<?php
$sqlQuery="SELECT * FROM store WHERE retailerId='$id' and retailerEmail='$email';";
$resultQ=mysqli_query($conn,$sqlQuery);
$rowQ=mysqli_fetch_array($resultQ);

if($rowQ)
	echo $rowQ['storeName'] ;
else
	echo "No store with this Retailer Id - " . $id;

        header("location: check-for-update-once.php");

?>

Check Your Wallet :<br/>
<a href="retailer-wallet.php">MY-WALLET</a>


<!--
<form method="POST" action="fruitsDisplay.php">
<input type="hidden" name="retailerId" value="<?php echo $id; ?>">
<input type="submit" name="submit" value="Display">
</form>
-->

<?php
/*
$sql="select * from " . $id . "fruits;";
$rs= mysqli_query($conn,$sql);
echo "<html> <body style='text-align:center'>";
echo "<table width=60% align=center text-align=center border='1'><tr><th>FruitName</th><th>Quantity</th><th>Price</th><th>Update Price</th></tr>";


while($row=mysqli_fetch_array($rs))
{
	$fruitName=$row['fruitName'];
	$quantity=$row['quantity'];
	$price=$row['price'];
 echo "<tr><td>" . $fruitName . "</td>"; 
	 echo "<td>" . $row['quantity'] . "</td>";
	     echo "<td>" . $row['price'] . "</td><td>
<form method='POST' action='update.php'>
<input type='hidden' name='retailerId' value='" . $id . "'>
<input type='hidden' name='fruitName' value='" . $fruitName . "'>
<input type='hidden' name='quantity' value='" . $quantity . "'>
<input type='number' step='0.01' name='updatedPrice'>
<input type='submit' name='submit' value='Update'>
</form>
</td></tr>"; 
}
echo "</table>";
if($rs)
	echo "Records displayed successfully";
else
	echo "Error: " . $sql . "<br>" . $conn->error;

echo "</body></html>";
$conn->close();
*/
?>

</body>



	
