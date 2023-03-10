<html>
	<head>
	<title>User List</title>
	
	</head>
	
	<body>
	<!-- User List -->
	<a href="user-list.php">User List</a>
	<a href="user-add.php">Add User</a>
	<a href="logout.php">Log Out</a>
	<br>
	<H1>Users</H1>
	

	</body>
</html>

<?php

$page_roles = array('admin', 'user');

require_once  'login.php';
require_once  'checksession.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

//redirecting to different home pages
        
		$user = $_SESSION['user'];
		$roles = $user->getRoles();
        if($roles[0]=='admin'){
            echo"Welcome Admin";
        }elseif($roles[0]=='user'){
            echo"Welcome User";
        }else{
            header("Location: authenticate.php");
        }


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
	Forename: <a href='user-details.php?id=$row[id]'>$row[forename]</a>
	
	</pre>
	
	
	
_END;

}

$conn->close();



?>