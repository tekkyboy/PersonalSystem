<?php
$comments= $_POST['comments'];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
    <link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class = "loggedin">
		<nav class="navtop">
			<div>
				<h1><a href = "home.php">Personal System</a></h1>
				<a href="post.php">Feed</a>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
		<div class="newpost">
			<h1>Personal Note Maker</h1>
			<form action="post.php" method="post">
			<textarea cols="35" rows="12" name="comments" id="text1">Input Text Here...</textarea><br>
			<input type="submit" name="submit_button" value="Submit"/>
		</form>
		</div>
	</body>
</html>
