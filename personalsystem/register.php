<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Home Page</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1>Personal System</h1>
				<a href="index.html">Return To Login</a>
			</div>
		</nav>
	</body>
</html>

<?php
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'personalsystem';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
//Check 1, data that should have been sent not retrieved
if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
	exit('Please complete the registration form!');
}
// Check 2: one or more values are empty
if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
	exit('Please complete the registration form');
}
//Email check
if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
	exit('Email is not valid!');
}
//Username check
if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['username']) == 0) {
    exit('Username is not valid!');
}
//Password checkdate
if (strlen($_POST['password']) > 20 || strlen($_POST['password']) < 5) {
	exit('Password must be between 5 and 20 characters long!');
}

//Check if the username exists
if ($stmt = $con->prepare('SELECT id, password FROM accounts WHERE username = ?')) {
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
  // Store the result so we can check if the account exists in the database.
	if ($stmt->num_rows > 0) {
		echo 'Username exists, please choose another!';
	} else {
//If username doesn't exist, create a new username
      if ($stmt = $con->prepare('INSERT INTO accounts (username, password, email) VALUES (?, ?, ?)')) {
	       $password = $_POST['password'];
	        $stmt->bind_param('sss', $_POST['username'], $password, $_POST['email']);
	         $stmt->execute();
	          echo 'You have successfully registered, you can now login!';
          } else {
	           echo 'Could not prepare statement!';
           }
	        }
	         $stmt->close();
} else {
	  echo 'Could not prepare statement!';
}
$con->close();
?>
