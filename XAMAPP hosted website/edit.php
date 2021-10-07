 <!DOCTYPE HTML>
<html>
<body>
<head>
<link rel="stylesheet" href="mystyle.css">
</head>
<div class = "overview">

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

if( isset($_POST['usernameupdate']) && isset($_POST['passwordupdate'])&&isset($_POST['emailupdate'])&&isset($_POST['levelupdate'])) //Makes sure all variables are set before editing
{
	$id =  $_POST['id'];
	$u =  $_POST['usernameupdate']; 
	$p = $_POST['passwordupdate'];
	$e = $_POST['emailupdate'];
	$l = $_POST['levelupdate'];
	$sql ="UPDATE userdatabase SET Username = '$u', Password='$p', Email = '$e'  ,Level ='$l' WHERE  UserID='$id'";
	mysqli_query($conn,$sql);
	echo "Record changed";
	header("refresh:2;url=index.php");
	
}

$id  = $conn ->real_escape_string($_GET['id']);


$sql="SELECT UserID, Username, Password, Email ,Level FROM userdatabase WHERE UserID= '$id' ";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);      
$u = $row["Username"];
$p = $row["Password"];
$e = $row["Email"];
$l = $row["Level"];



echo "
<form method ='post' >
<p> Username: <input name='usernameupdate' type='text' value='$u' /></p>

<p> Password: <input name='passwordupdate' type='text' value='$p' /></p>
<p> Email: <input name='emailupdate' type='text' value='$e' /></p>
<input type='hidden' name ='id' value = '$id'/> 
<p> Account type:  Regular<input name='levelupdate' type='radio'  value='regular'/> Admin<input name='levelupdate' type='radio'  value='admin'/></p>
<p><input type = 'submit' value='Update'/>
</form> ";


mysqli_close($conn);
 }
 else
 {
	  header("refresh:2;url=createaccount.html");
	 echo "You must be an admin to edit records ";
 }
	 
?> 
</div>
</body>
</html>


