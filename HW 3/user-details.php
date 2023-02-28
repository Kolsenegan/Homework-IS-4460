<html>
	<head>
	<title>User Details</title>
	
	</head>
	
	<body>
	<!-- User Details -->
	<a href="user-list.php">User List</a>
	<a href="user-details.php">User Details</a>
	<a href="user-add.php">Add User</a>
	<br>
	<H1>User Details</H1>

	</body>
	
</html>

<?php

require_once  'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

$query = "SELECT * FROM users";

$result = $conn->query($query); 
if(!$result) die($conn->error);

$rows = $result->num_rows;

for($j=0; $j<$rows; $j++)
{
	//$result->data_seek($j); 
	$row = $result->fetch_array(MYSQLI_ASSOC); 

echo <<<_END
	<pre>
	Username: $row[username]
	Forename: $row[forename]
	Surname: $row[surname]
	Password: $row[password]
	ID: $row[id]	
	</pre>
	
_END;

}
$conn->close();

?>
