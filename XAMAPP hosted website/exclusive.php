<html>
<body>
<?php
session_start();
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['level']=="regular") {
    echo "Welcome to the member's area, " . $_SESSION['username'] . "!";
}
else if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && $_SESSION['level']=="admin") {
    echo "admin.";
}
else{
	header("refresh:2;url=homepage.html");
	echo("Please log in to view this page");
}
?>
</body>
</html>