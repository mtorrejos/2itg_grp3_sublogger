<?php
	session_start();
	require_once "init.php";

	if($_SERVER['REQUEST_METHOD'] == 'POST') {

		$email = $_POST['email'];
		$password = $_POST['password'];
		$fName = $_POST['fName'];
		$lName = $_POST['lName'];

		//simple validation to check if all fields are filled

		if(empty($email) || empty($password) || empty($fName) || empty($lName)) { 
			echo 'One or more fields are empty!';
			exit;
		}

		$sql = $con->'SELECT COUNT(*) FROM `users` WHERE user_Email = '.$email.';';
		$sql->bind_result($count);
		$sql->fetch();

		//input basic user data into table
		$sql =  'INSERT INTO ' .$email. ' (user_FirstName, user_LastName, user_Email, user_Password, user_EmailReminderTime, user_EmailSurveyTime) VALUES ('.$fName.', '.$lName.', '.$email.', '.$password.', 1, 1);';
		$con->query($sql);


		echo 'Account successfully created! Redirecting to home page...';
		header('Location: index.php');
		}
?>

<html>
	<head>
	    <meta charset="UTF-8">
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	    <title>sublogger</title>
	    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">
	    <link rel="stylesheet" href="style.css" type="text/css">
	</head>

	<body>

	<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
	Email: <input type="text" name="email"><br>
	Password: <input type="password" name="password"><br>
	First Name: <input type="text" name="fName"><br>
	Last Name: <input type="text" name="lName"><br>
	<input type="submit" value="Register" name="submit">
	</form>

	</body>
</html>