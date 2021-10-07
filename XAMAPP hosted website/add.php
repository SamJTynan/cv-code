 <!DOCTYPE HTML>
<html>
<head>

</head>
<body>

 <?php
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

$user = $_POST['username'];  //Gets the names from the create account html page
$pass = $_POST['pass']; 
$email = $_POST['mail']; 
$type = $_POST['radio'];

$sql = "SELECT * FROM  userdatabase"; //Selects the amount of rows already in the table
$result=mysqli_query($conn,$sql); //Executes the query
$rowcount=mysqli_num_rows($result); //Counts the number of rows with a SQLI function 
$rowcount=$rowcount+1; //Adds one to it to act as a unique identifier for the table enrty that will make it easier to delete or edit when multiple entries are involves or certain parts share the some of the same info
$sql = "INSERT INTO userdatabase (UserID,Username, Password, Email,Level) VALUES ($rowcount,'$user','$pass','$email','$type')"; //Inserts The account information into the userdatabase
if (mysqli_query($conn, $sql)) {

  echo "Account succesfully created";
  header("refresh:2;url=createaccount.html"); //Signifies to the user that their account has been successfully created and brings them back to the create account tab
} else {
  echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);

?> 



</body>
</html>


