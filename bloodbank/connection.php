<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
		$localhost = "localhost";  // name of the local server
		$username = "root";		// By default username of local server at every PC
		$password = ""; // by default password of local server which is empty
		$database = "blood_bank";  // database name reside at local server
	
		// Establishing database connection
		$conn = mysqli_connect($localhost,$username,$password,$database);
	
	   function conn_close()    // function called to close the connection.
	   {
		   global $conn;
		   mysqli_close($conn);  // this function destroyed already established connection 
	   }
	?>
</body>
</html>