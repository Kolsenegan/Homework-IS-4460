<html>
	<head>
	<title>User Details</title>
	
	</head>
	
	<body>
	<!-- User Details -->
	<a href="user-list.php">User List</a>
	<a href="user-add.php">Add User</a>
	<a href="logout.php">Log Out</a>
	<br>
	<H1>User Details</H1>

	</body>
	
</html>

<?php

$page_roles = array('admin');

require_once 'login.php';
require_once  'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);
if ($conn->connect_error) die($conn->connect_error);

$id = $_GET['id'];
$query = "SELECT * FROM users where id = $id";

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
