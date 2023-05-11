<?php 
    session_start();
    require_once "connection/connection.php";
    $con = connection();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        $email = $_POST['email'];
        $password = $_POST['password'];
        $fName = $_POST['firstname'];
        $lName = $_POST['lastname'];
        $emailtime = $_POST['emailReminderFrequency'];
        $emailsurvey = $_POST['emailSurveyFrequency'];

        //if email is changed
        if($_SESSION['email'] != $email) {
            $sql =  "INSERT INTO users (user_FirstName, user_LastName, user_Email, user_Password, user_EmailReminderTime, user_EmailSurveyTime) VALUES ('$fName', '$lName', '$email', '$password', '.$emailtime.', '.$emailsurvey.');";
            $con->query($sql);
            $sql = "DELETE FROM users WHERE user_Email = '{$_SESSION['email']}';";
            $con->query($sql);

            //move subscriptions into new table
            $sql = "CREATE TABLE `$email` LIKE `{$_SESSION['email']}`;";
            $con->query($sql);
            $sql = "INSERT INTO `$email` SELECT * FROM `{$_SESSION['email']}`;";
             $con->query($sql);

            $sql = "DROP TABLE `{$_SESSION['email']}`;";
            $con->query($sql);
            $_SESSION['email'] = $email;
        }

        //otherwise, just change everything else
        else {
            $sql = "UPDATE users SET user_FirstName = '$fName', user_LastName = '$lName', user_Password = '$password', user_EmailReminderTime = '$emailtime', user_EmailSurveyTime = '$emailsurvey' WHERE user_Email = '{$_SESSION['email']}';";
            $con->query($sql);
        }

        echo '<script>alert("Account Modified! Directing to homepage...")</script>';
        session_destroy();
        header("Location: indexAndLogin.php");
    }
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
    <title>Edit Profile</title>
</head>
<body>
    <?php require_once("headerAndFooter/navbarWithAccount.php"); ?>

    <div style="padding-top:110px; height:215px;" class="section3">
        <label class="center title profileTitle" style="filter: drop-shadow(2px 2px 20px rgba(0,0,0,0.3)) drop-shadow(-2px -2px 20px rgba(0,0,0,0.3)); padding:0;">Edit Profile</label>
    </div>
    <form name="editProfile" id="editProfile" method="POST">
    <div class="profileDetails editProfileDetails" style="display:block; margin-left:auto; margin-right:auto; width:auto; position:relative; top:0px; width:50%;">
        <div class="row" style="margin-top:5px; margin-bottom:5px;">
            <div class="col-lg-5">
                <label for="firstname" class="form-label profileLabel" style="padding:0; margin-top:15px; margin-bottom:0;">First Name:</label>
                <span class="editProfileSpan">No numbers allowed</span>
            </div>
            <div class="col-lg-7">
                <input type="text" class="form-control textbox-blue editProfileTextbox" style="margin-top:8px;" id="firstname" name="firstname" value="" required>
            </div>
        </div>
        <div class="row" style="margin-top:5px; margin-bottom:5px;">
            <div class="col-lg-5">
                <label for="lastname" class="form-label profileLabel" style="padding:0; margin-top:15px; margin-bottom:0;">Last Name:</label>
                <span class="editProfileSpan">No numbers allowed</span>
            </div>
            <div class="col-lg-7">
                <input type="text" class="form-control textbox-blue editProfileTextbox" style="margin-top:8px;" id="lastname" name="lastname" value="" required>
            </div>
        </div>
        <div class="row" style="margin-top:5px; margin-bottom:5px;">
            <div class="col-lg-5">
                <label for="email" class="form-label profileLabel" style="padding:0; margin-top:15px; margin-bottom:0;">Email Address:</label>
                <span class="editProfileSpan">Not a valid email address</span>
            </div>
            <div class="col-lg-7">
                <input type="email" class="form-control textbox-blue editProfileTextbox" style="margin-top:8px;" id="email" name="email" value="" required>
            </div>
        </div>
        <div class="row" style="margin-top:5px; margin-bottom:5px;">
            <div class="col-lg-5">
                <label for="password" class="form-label profileLabel" style="padding:0; margin-top:15px; margin-bottom:0;">Password:</label>
                <span class="editProfileSpan">Must contain atleast 8 characters</span>
            </div>
            <div class="col-lg-7">
                <input type="password" class="form-control textbox-blue editProfileTextbox" style="margin-top:8px;" id="password" name="password" value="" required>
            </div>
        </div>
        <div class="row" style="margin-top:5px; margin-bottom:5px;">
            <div class="col-lg-5">
                <label for="emailReminderFrequency" class="form-label profileLabel" style="padding:0; margin-top:15px; margin-bottom:0;">Email Reminder Frequency:</label>
            </div>
            <div class="col-lg-7">
                <select id="emailReminderFrequency" name="emailReminderFrequency" class="form-select dropdown-blue" required>
                    <option value="1" selected>every 5 minutes</option>
                    <option value="2">every hour</option>
                    <option value="3">once a month</option>
                    <option value="4">twice a month</option>
                    <option value="5">once every two months</option>
                    <option value="6">once every six months</option>
                    <option value="7">once a year</option>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5">
                <label for="emailSurveyFrequency" class="form-label profileLabel" style="padding:0; margin-top:15px; margin-bottom:0;">Email Survey Frequency:</label>
            </div>
            <div class="col-lg-7">
                <select id="emailSurveyFrequency" name="emailSurveyFrequency" class="form-select dropdown-blue" required>
                    <option value="1" selected>every 5 minutes</option>
                    <option value="2">every hour</option>
                    <option value="3">once a month</option>
                    <option value="4">twice a month</option>
                    <option value="5">once every two months</option>
                    <option value="6">once every six months</option>
                    <option value="7">once a year</option>
                </select>
            </div>
        </div>

        <div class="contentButton" style="padding-top:30px;">
            <a href="profile.php" target="_self" style="color: rgb(0, 0, 0); text-decoration: none; width: 300px;"><input type="submit" class="btn btn-primary btn-md btnMid btnProfile center" id="btnReg" name="btnReg" value="Save"></a>
        </div>
        <a href="profile.php" style="text-align:center; color:#2e3192; text-decoration:none; width:80%;" class="center">Cancel</a>
    </div>
    </form>
    <?php require_once("headerAndFooter/footer.php"); ?>

    <!--Turning password into asterisks-->
    <script>
        var pass= document.getElementById("password").innerHTML;
        var char = pass.length;
        var password ="";
        for (i=0;i<char;i++) {
            password += "*"; }
        document.getElementById("password").innerHTML = password;
    </script>
</body>
</html>