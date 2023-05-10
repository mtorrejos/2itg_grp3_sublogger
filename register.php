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

		$con = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS,$DATABASE_NAME);
		$sql = 'CREATE TABLE IF NOT EXISTS ' .$email.'(
		`user_ID` INT(11) NOT NULL AUTO_INCREMENT,
		`user_FirstName` VARCHAR(50) NOT NULL,
		`user_LastName` VARCHAR(50) NOT NULL,
		`user_Email` VARCHAR(100) NOT NULL,
		`user_Password` VARCHAR(255) NOT NULL,
		`user_EmailReminderTime` INT(12) NOT NULL,
		`user_EmailSurveyTime` INT(12) NOT NULL,
		PRIMARY KEY(`user_ID`)
		) ENGINE = InnoDB AUTO_INCREMENT = 2 DEFAULT CHARSET = utf8;';
		$con->query($sql);

		$sql =  'prepare("INSERT INTO ' .$email. ' (user_FirstName, user_LastName, user_Email, user_Password) VALUES ('.$fName.', '.$lName.', '.$email.', '.$password.')");';


		//input basic user data into table


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