 <!DOCTYPE HTML>
<html>
<body>
<?php
session_start();
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

$user = $_POST['username'];  //Gets users info from login table
$pass = $_POST['pass']; 
$email = $_POST['mail']; 



$sql = "SELECT * FROM  userdatabase WHERE Username = '$user' AND Password = '$pass' AND Email = '$email'"; //Checks to see if users info has an entry in the table
$result=mysqli_query($conn,$sql);
$rowcount=mysqli_num_rows($result);
  
if($rowcount < 1) { //If users table has more than one entry error message appears
header("refresh:2;url=loginpage.html");
	echo("Error credentials wrong");
}
else
{
	$_SESSION['loggedin'] = true; //Loggedin variable is set to true so user can access pieces of website that require them to be logged in
	$_SESSION['username'] = $user; //Users session username is set to thier account username to be used in adding orders
	$sql = "SELECT Level FROM  userdatabase WHERE Username = '$user' AND Password = '$pass' AND Email = '$email'"; //Gets the users respective level from database
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_array($result);      
	$_SESSION['level'] = $row["Level"]; //Sets their level according, this makes sure regular users cant access database
	header("refresh:2;url=homepage.html");
	echo("Log in Succesful");
	exit;
}

mysqli_close($conn);
 
?> 



</body>
</html>