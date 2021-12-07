<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Profile Page</title>
		<link href="style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	</head>
	<body class="loggedin">
		<nav class="navtop">
			<div>
				<h1><a href = "home.php">Personal System</a></h1>
        <a href="post.php">Feed</a>
				<a href="profile.php"><i class="fas fa-user-circle"></i>Profile</a>
				<a href="logout.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
			</div>
		</nav>
    <div class="content">
      <?php
      $DATABASE_HOST = 'localhost';
      $DATABASE_USER = 'root';
      $DATABASE_PASS = '';
      $DATABASE_NAME = 'personalsystem';
      $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
      if (mysqli_connect_errno()) {
      	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
      }
      if (!$_POST['comments']) {
      	exit('Form is Empty!');
      }
      if (empty($_POST['comments'])) {
        exit('Form is Empty!');
      }
      if (isset($_POST['submit_button'])){
        $notes = $_POST['comments'];
        echo "You Wrote: " . $notes;
      } else {
        header('Location: create.php?invalidRequest');
        exit();
      }
      ?>
    </div>
	</body>
</html>
