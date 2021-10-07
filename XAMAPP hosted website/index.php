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
echo"<h2> Account database </h2> ";
$sql = "SELECT UserID ,Username, Password, Email ,Level FROM userdatabase";
$result = $conn->query($sql);
if($result->num_rows > 0)
{
	echo "<table border='1'>";
	while ($row = $result -> fetch_assoc()){
		echo"<tr><td>";
		
		echo(htmlentities($row["Username"]));
		echo("</td><td>");
		echo(htmlentities($row["Password"]));
		echo("</td><td>");
		echo(htmlentities($row["Email"]));
		echo("</td><td>");
		echo(htmlentities($row["Level"]));
		echo("</td><td>");
		echo('<a href="edit.php?id='.htmlentities($row["UserID"]).'">Edit /</a> ');
		echo('<a href="delete.php?id='.htmlentities($row["UserID"]).'">Delete</a>');
		
		
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
	 
	 header("refresh:2;url=createaccount.html");
	 echo "You must be an admin to view user database";
 }
	?>
	
	
	
	</div>
</body>
</html>


