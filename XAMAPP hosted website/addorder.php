 <!DOCTYPE HTML>
<html>
<head>

</head>
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
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { //Checks if user is logged in regardless of account type
    $customer = $_SESSION['username']; //Gets the users data from the order.html page and sets the users current logged in name to their customer name in the database
	$address = $_POST['address']; 
	$med = $_POST['medication']; 
	$number = $_POST['phone']; 
	$sql = "SELECT * FROM  customers";  //Selects amount of rows in customers
	$result=mysqli_query($conn,$sql); //Executes query 
	$rowcount=mysqli_num_rows($result); //Counts amount of rows using built in sqli function
	$rowcount=$rowcount+1;  //Adds one to it to act as a unique identifier for the table enrty that will make it easier to delete or edit when multiple entries are involves or certain parts share the some of the same info
	$sql = "INSERT INTO customers (OrderId,Customer,Address,Medication,PhoneNumber) VALUES ('$rowcount','$customer','$address','$med','$number')"; //Inserts data into customer database
	mysqli_query($conn, $sql);
	header("refresh:2;url=orderpage.html");  //Tells the user their order has been placed 
	echo"Order placed for ". $_SESSION['username'];
}
else{
	header("refresh:2;url=loginpage.html"); //Error message to bring user back to loginpage 
	echo("Please log in to place order");
}



mysqli_close($conn);

?> 



</body>
</html>
