<body style="background-color:Bisque">
<?php
session_start();
$retailerId=$_SESSION["sessionRetailerId"];
	echo "Session Id " . $_SESSION["sessionRetailerId"] . "<br/>";
	echo " retailer Id : " . $retailerId . "<br/>";
	
	$conn=mysqli_connect("localhost","root","","retailershopperdatabase");
?>
<pre>
FruitName			Quantity		Price
<form method="POST" action="fruits-entry.php">
<input type="text" name="f1"><input type="number" name="q1"><input type="number" step="0.01" name="p1"><br/>
<input type="text" name="f2"><input type="number" name="q2"><input type="number" step="0.01" name="p2"><br/>
<input type="text" name="f3"><input type="number" name="q3"><input type="number" step="0.01" name="p3"><br/>
<input type="text" name="f4"><input type="number" name="q4"><input type="number" step="0.01" name="p4"><br/>
<input type="text" name="f5"><input type="number" name="q5"><input type="number" step="0.01" name="p5"><br/>
<input type="text" name="f6"><input type="number" name="q6"><input type="number" step="0.01" name="p6"><br/>
<input type="text" name="f7"><input type="number" name="q7"><input type="number" step="0.01" name="p7"><br/>
<input type="text" name="f8"><input type="number" name="q8"><input type="number" step="0.01" name="p8"><br/>
<input type="text" name="f9"><input type="number" name="q9"><input type="number" step="0.01" name="p9"><br/>

<input type="submit" name="submit">


</form>
</pre>
</body>