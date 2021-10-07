<!DOCTYPE HTML>
<html>
<body>
<head>
<link rel="stylesheet" href="mystyle.css">
</head>
<div class= "overview">
 <h1> Pharma Online <img src="cross.jpg" width="35" height="35" style="vertical-align:middle;"> </h1>
 <div class="topnav">
  <a href="homepage.html">Home</a>
  <a href="createaccount.html">Create Account</a>
  <a href="loginpage.html">Login</a>
  <a href = "orderpage.html">Order</a>
  <a href="logout.php">Logout</a>
  <a href="contact.html">Contact</a>
</div>
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
echo"<h1> Account database </h1> ";
$sql = "SELECT  OrderID, Customer,Address,Medication,PhoneNumber FROM customers";
$result = $conn->query($sql);
if($result->num_rows > 0)
{
	echo "<table border='1'>";
	while ($row = $result -> fetch_assoc()){
		echo"<tr><td>";
		
		echo(htmlentities($row["Customer"]));
		echo("</td><td>");
		echo(htmlentities($row["Address"]));
		echo("</td><td>");
		echo(htmlentities($row["Medication"]));
		echo("</td><td>");
		echo(htmlentities($row["PhoneNumber"]));
		echo("</td><td>");
		echo('<a href="editorder.php?id='.htmlentities($row["OrderID"]).'">Edit /</a> ');
		echo('<a href="deleteorder.php?id='.htmlentities($row["OrderID"]).'">Delete</a>');
		
	}
	echo "</table>";
	echo '<a href="createaccount.html">Add new</a>';
}
	else
	{
		echo "Error";
	}
	$conn->close();
 }
 else 
 {
	 header("refresh:2;url=orderpage.html");
	 echo "You must be an admin to view order database";
	 
 }
	?>
	

</body>
</html>


