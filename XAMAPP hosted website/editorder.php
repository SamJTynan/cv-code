 <!DOCTYPE HTML>
<html>
<body>

 
 <?php
 session_start();
 if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['level']=="admin") {
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "dt211c";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

if( isset($_POST['addressupdate'])&&isset($_POST['medupdate'])&&isset($_POST['phoneupdate'])&&isset($_POST['id']))
{
	
	$id =  $_POST['id'];
	$add =  $_POST['addressupdate']; 
	$med = $_POST['medupdate'];
	$num = $_POST['phoneupdate'];
	
	$sql ="UPDATE customers SET Address = '$add', Medication='$med', PhoneNumber = '$num' WHERE  OrderID='$id'";
	mysqli_query($conn,$sql);
	echo "Record changed";
	header("refresh:2;url=orderindex.php");
	

}

$id  = $conn ->real_escape_string($_GET['id']);


$sql="SELECT Address, Medication,PhoneNumber FROM customers WHERE OrderID= '$id' ";

$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);      

$add = $row["Address"];
$med = $row["Medication"];
$num = $row["PhoneNumber"];


echo "
<form method ='post' >

<p>Address <input name='addressupdate' type='text' value='$add' /></p>
<p> Medication: <input name='medupdate' type='text' value='$med' /></p>
<p> PhoneNumber: <input name='phoneupdate' type='tel' value='$num' /></p>
<input type='hidden' name ='id' value = '$id'/> 
<p><input type = 'submit' value='Update'/>
</form> ";


mysqli_close($conn);
 }
 else
 {
	 header("refresh:2;url=orderpage.html");
	 echo "You must be an admin to edit records ";
 }
?> 

</body>
</html>