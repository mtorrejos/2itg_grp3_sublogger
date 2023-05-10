<<<<<<< HEAD
<?php 
//include_once("connection/connection.php");
//$con = connection();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Bootstrap CSS & JS CDN-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <!--Google Fonts-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.1/css/all.css">
    <!-- FAVICON -->
    <link rel="icon" href="img/SubLogger_Logo.png" type="image/gif" sizes="16x16">
    <!--CSS-->
    <link rel="stylesheet" type="text/css" href="css/mainStyle.css">
    <title>Document</title>
</head>
<body>
    <?php require_once("headerAndFooter/navbarWithLogin.php"); ?>
    <div style="padding-top:160px;" class="section2">
        <img src="img/SubLogger_Logo.png" class="center" style="width: 150px; height: 150px;">
        <label class="center title" style="filter: drop-shadow(2px 2px 20px rgba(0,0,0,0.3)) drop-shadow(-2px -2px 20px rgba(0,0,0,0.3));">Register to SubLogger</label>
        <form name="login" id="login" method="POST" class="center regforms">
        <div class="row">
            <div class="col-xxl-6 gx-5">
                <div class="mb-3">
                    <label for="firstname" class="form-label" style="font-size:18px;">First Name<span style="color:#f04148; padding-left:10px;">*</span><span style="color:#f04148; padding-left: 50px;">No numbers allowed</span></label>
                    <input type="text" class="form-control textbox-blue" id="firstname" name="firstname" required>
                </div>
                <div class="mb-3" style="padding-top:15px;">
                    <label for="lastname" class="form-label" style="font-size:18px;">Last Name<span style="color:#f04148; padding-left:10px;">*</span><span style="color:#f04148; padding-left: 50px;">No numbers allowed</span></label>
                    <input type="text" class="form-control textbox-blue" id="lastname" name="lastname" required>
                </div>
                <div class="mb-3" style="padding-top:15px;">
                    <label for="email" class="form-label" style="font-size:18px;">Email Address<span style="color:#f04148; padding-left:10px;">*</span><span style="color:#f04148; padding-left: 50px;">Not a valid email address</span></label>
                    <input type="text" class="form-control textbox-blue" id="email" name="email" required>
                </div>
            </div>
            <div class="col-xxl-6 gx-5">
                <div class="mb-3">
                    <label for="password" class="form-label" style="font-size:18px;">Password<span style="color:#f04148; padding-left:10px;">*</span><span style="color:#f04148; padding-left: 50px;">No numbers allowed</span></label>
                    <input type="password" class="form-control textbox-blue" id="password" name="password" required>
                </div>
                <div class="mb-3" style="padding-top:15px; margin:0 !important;">
                    <label for="retypepassword" class="form-label" style="font-size:18px;">Retype Password<span style="color:#f04148; padding-left:10px;">*</span><span style="color:#f04148; padding-left: 50px;">No numbers allowed</span></label>
                    <input type="password" class="form-control textbox-blue" id="retypepassword" name="retypepassword" required>
                </div>
                <div class=row>
                    <div class="col-xxl-6">
                        <div class="mb-3" style="padding-top:10px;">
                            <label for="emailReminderFrequency" class="form-label" style="font-size:18px; margin:0; height:15px;">Email Reminder Frequency<span style="color:#f04148; padding-left:10px;">*</label>
                            <br><span style="color:#fff; font-size:10px;">This is to reminder you of your subscription dues</span>
                            <select id="emailReminderFrequency" name="emailReminderFrequency" class="form-select dropdown-blue" required>
                                <option value="every 5 minutes" selected>every 5 minutes</option>
                                <option value="every hour">every hour</option>
                                <option value="once a month">once a month</option>
                                <option value="twice a month">twice a month</option>
                                <option value="once every two months">once every two months</option>
                                <option value="once every six months">once every six months</option>
                                <option value="once a year">once a year</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xxl-6">
                        <div class="mb-3" style="padding-top:10px;">
                            <label for="emailSurveyFrequency" class="form-label" style="font-size:18px; margin:0; height:15px;">Email Survey Frequency<span style="color:#f04148; padding-left:10px;">*</span></label>
                            <br><span style="color:#fff; font-size:10px;">This is to record the last time you used your subscription</span>
                            <select id="emailSurveyFrequency" name="emailSurveyFrequency" class="form-select dropdown-blue" required>
                                <option value="every 5 minutes" selected>every 5 minutes</option>
                                <option value="every hour">every hour</option>
                                <option value="once a month">once a month</option>
                                <option value="twice a month">twice a month</option>
                                <option value="once every two months">once every two months</option>
                                <option value="once every six months">once every six months</option>
                                <option value="once a year">once a year</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="contentButton">
                <input type="submit" class="btn btn-primary btn-md btnMid center" id="btnReg" name="btnReg" value="Create Account"><a href="#" target="_self" style="color: rgb(0, 0, 0); text-decoration: none; width: 300px;"></a>
            </div>
            <a href="indexAndLogin.php" style="text-align:center; color:#fff; text-decoration:none; width:80%;" class="center">Cancel</a>
        </form>
        <div style="padding-bottom: 90px;"></div>
    </div>
    <?php require_once("headerAndFooter/footer.php"); ?>
</body>
=======
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
>>>>>>> 1dd1e214cc7378ffeea1ed7631a0ee0466d7c6bd
</html>