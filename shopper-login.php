<?php
session_start();
$_SESSION['count']=0;
$_SESSION['totalPrice']=0;
echo "Shopper Logged in <br/>";
$email=$_POST['email'];
$password=$_POST['password'];

echo $email . "<br/>";

	$conn= mysqli_connect("localhost","root","","retailershopperdatabase");
	if($conn)
	{
		echo "Connected <br/>";
		$sql= "INSERT INTO shopper(sEmail,sPassword) values ('$email','$password');";
		$insert=mysqli_query($conn,$sql);
		
		if($insert)
			echo "Details added successfully<br/>";
		else 
			echo "Details already added!<br/><br/>";
		
		$sqlQ="select sId from shopper where sEmail='$email';";
		$resQ=mysqli_query($conn,$sqlQ);
		
		if($row=mysqli_fetch_array($resQ))
		$_SESSION['SID']=$row['sId'];
		
		
	}
	else
		echo "Not Connected";
	
	header("location: select-store.php");
	?>
	<!--
	
	echo "Available Stores are :-<br/>";
	$storeSql= "select retailerId,retailerEmail,storeName from store;";
	$storeRes=mysqli_query($conn,$storeSql);
	
	echo "<html> <body style='text-align:center'>";
echo "<table width=60% align=center text-align=center border='1'><tr><th>RetailerId</th><th>RetailerEmail</th><th>StoreName</th></tr>";

while($row=mysqli_fetch_array($storeRes))
	{
			echo "<tr><td>" . $row['retailerId'] . "</td>";
			echo "<td>" . $row['retailerEmail'] . "</td>";
			echo "<td>" . $row['storeName'] . "</td></tr>";
	}	
	

echo "</body></html>";

?>
<h4>
Enter the RetailerId of the StoreName you want to purchase fruits from :</hr>  
<form method="POST" action="selection-page.php">
<input type="number" name="retailerId" placeholder="RetailerId">
<input type="submit" name="submit">
</form>
</pre>

-->

