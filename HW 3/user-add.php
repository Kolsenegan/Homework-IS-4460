<html>
	<head>
	<title>User add</title>
	
	</head>
	
	<body>
	<!-- User Add -->
	<a href="user-list.php">User List</a>
	<a href="user-details.php">User Details</a>
	<a href="user-add.php">Add User</a>
	<br>
	<H1>Add User</H1>
	
		<form method='post' action='user-add.php'>
			<pre>
				ID: <input type='text' name='id'>
				Username: <input type='text' name='username'>
				Forename: <input type='text' name='forename'>
				Surname: <input type='text' name='surname'>
				Password: <input type='text' name='password'>
				<input type='submit' value='Add User'>
			</pre>
		</form>
	</body>
</html>

<?php

require_once  'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

//check if ID exists
if(isset($_POST['id'])) 
{
	//Get data from POST object
	$id = $_POST['id'];
	$username = $_POST['username'];
	$forename = $_POST['forename'];
	$surname = $_POST['surname'];
	$password = $_POST['password'];
	
	//echo $isbn.'<br>';
	
	$query = "INSERT INTO users (id, username, forename, surname, password) VALUES ('$id', '$username','$forename', '$surname', '$password')";
	
	//echo $query.'<br>';
	$result = $conn->query($query); 
	if(!$result) die($conn->error);
	
	header("Location: user-list.php");//this will return you to the view all page
	
	
	
	
}









?>
