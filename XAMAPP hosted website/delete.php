 <!DOCTYPE HTML>
<html>
<body>
<h1> Pharma Online <img src="cross.jpg" width="35" height="35" style="vertical-align:middle;"> </h1>
 <?php
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
$id =$_GET['id']; //Gets the user ID from the table 
$sql="DELETE FROM userdatabase WHERE UserID = '$id'"; //Deletes the entry with unique user id from the table and database
mysqli_query($conn,$sql);
	header("refresh:1;url=index.php"); //Send user back to the index
	echo("Record deleted");
	exit;


mysqli_close($conn);
 }
 else
 {
	 header("refresh:2;url=creataccount.html"); //Error message
	 echo "You must be an admin to delete records ";
 }
 
?> 

</body>
</html>
