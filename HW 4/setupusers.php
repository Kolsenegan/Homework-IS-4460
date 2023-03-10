<html>
	<head></head>
	
	<body>
		<form method='post' action='setupusers.php'>
			Forename: <input type='text' name='forename'><br>
			Surname: <input type='text' name='surname'><br>
			Username: <input type='text' name='username'><br>
			Password: <input type='text' name='password'><br>
			<input type='submit'>
		</form>
	</body>

</html>



<?php

require_once 'login.php';

$conn = new mysqli($hn, $un, $pw, $db);
if($conn->connect_error) die($conn->connect_error);

if(isset($_POST['username'])){

	$forename = $_POST['forename'];
	$surname = $_POST['surname'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$token = password_hash($password,PASSWORD_DEFAULT); 

	//code to add user here
	$query = "insert into users(forename, surname, username, password) values ('$forename', '$surname', '$username', '$token')";
	$result = $conn->query($query);
	if(!$result) die($conn->error);
}

$conn->close();


?>