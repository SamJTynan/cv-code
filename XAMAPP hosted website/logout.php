<html>
<body>
<head>
<link rel="stylesheet" href="mystyle.css">
</head>

<?php
session_start();
header("refresh:1;url=homepage.html"); //Tells user their session has been terminated
echo("Logging out");

session_destroy();
?>
</body>
</html>


