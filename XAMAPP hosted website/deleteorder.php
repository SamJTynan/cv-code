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
$id =$_GET['id']; //Gets the order ID from the table 

$sql="DELETE FROM customers WHERE OrderID= '$id'"; //Deletes the entry with unique order id from the table and database
mysqli_query($conn,$sql);
	header("refresh:1;url=orderindex.php"); //Sends the user back to the order index
	echo("Record deleted");
	exit;

mysqli_close($conn);
 }
else
 {
	  header("refresh:2;url=orderpage.html"); //Error message in case user inst logged in
	  echo "You must be an admin to edit orders ";
 }
?> 

</body>
</html>
