<?php 
    session_start();
    require_once "connection/connection.php";
    $con = connection();
    $email = $_SESSION['email'];
    $_SESSION['subName']=$_GET['subName'];
    $subName = $_SESSION['subName'];
    $subID = getAccountDetail($email,$subName,'sub_ID');
    $subCardName = getAccountDetail($email,$subName,'sub_CardName');
    $subCardNumber = getAccountDetail($email,$subName,'sub_CardNo');
    $subCardNumberErr = false;
    $newSubCardNumberErr = false;
    $subAcctName = getAccountDetail($email,$subName,'sub_AcctName');
    $subUsername = getAccountDetail($email,$subName,'sub_Username');
    $subEmail = getAccountDetail($email,$subName,'sub_Email');
    $subType = getAccountDetail($email,$subName,'sub_Type');
    $subStartDate = getAccountDetail($email,$subName,'sub_StartDate');
    $subEndDate = getAccountDetail($email,$subName,'sub_EndDate');
    $subLastUsed = getAccountDetail($email,$subName,'sub_LastUsed');

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $typedCardNumber = $_POST['subCardNumber'];
        $newSubCardNumber = password_hash($_POST['newSubCardNumber'], PASSWORD_DEFAULT);
        $typedNewSubCardNumber = $_POST['newSubCardNumber'];
        
        echo '<script>alert("stored in db:'; echo $subCardNumber; echo ':ends here");</script>';
        if($subCardNumber==0 || $subCardNumber=="" || $typedCardNumber==0 || $typedCardNumber=="") {
            $sql = "INSERT INTO `$email` (sub_Name, sub_AcctName, sub_Username, sub_Email, sub_CardName, sub_CardNo, sub_Type, sub_StartDate, sub_EndDate, sub_LastUsed) VALUES (`$subName`, `$subAcctName`, `$subUsername`, `$subEmail`, `$subCardName`, `$newSubCardNumber`, `$subType`, `$subStartDate`,`$subEndDate`, `$subLastUsed`);" or die($con->error);
            $con->query($sql);
            $sql = "DELETE FROM `$email` WHERE sub_Name = '$subName';" or die($con->error);
            $con->query($sql);
            header("Location: homepage.php?subName=$subName&addedtotable");
        }
        else {
            echo '<script>alert("textbox to verify:'; echo $typedCardNumber; echo ':ends here");</script>';
            if(!empty(validateNumber($typedNewSubCardNumber))) {
                echo '<script>alert("Wrong Validation");</script>';
                $newSubCardNumberErr = true;
                $newSubCardNumberErrMsg = "Numbers Only";
            }
            else {
                if(password_verify($typedCardNumber, $subCardNumber)) {
                    $sql = "INSERT INTO `$email` (sub_Name, sub_AcctName, sub_Username, sub_Email, sub_CardName, sub_CardNo, sub_Type, sub_StartDate, sub_EndDate, sub_LastUsed) VALUES (`$subName`, `$subAcctName`, `$subUsername`, `$subEmail`, `$subCardName`, `$newSubCardNumber`, `$subType`, `$subStartDate`,`$subEndDate`, `$subLastUsed`);" or die($con->error);
                    $con->query($sql);
                    $sql = "DELETE FROM `$email` WHERE sub_Name = '$subName';";
                    $con->query($sql);
                    echo '<script>alert("Edited to table");</script>';
                    header("Location: homepage.php?subName=$subName&editedtotable") or die($con->error);
                }
                else {
                    echo '<script>alert("Wrong number match");</script>';
                    $subCardNumberErr = false;
                    $subCardNumberErrMsg = "Incorrect card number";
                }
            }
        }
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
    <title>Edit Subscription</title>
</head>
<body style="background-color:#e1edff;">
<?php require_once("headerAndFooter/navbarWithAccount.php"); ?>
    <div style="padding-top:110px; height:215px;" class="section3">
        <label class="center title" style="filter: drop-shadow(2px 2px 20px rgba(0,0,0,0.3)) drop-shadow(-2px -2px 20px rgba(0,0,0,0.3)); padding:0;">Change Card Details</label>
    </div>
    
    <div style="padding-top:20px; background-color:#e1edff;">
        <form name="changeCardDetails" id="changeCardDetails" method="POST" class="center addSubForms">
            <div class="row justify-content-center">
                <div class="col-xxl-6 gx-5">
                    <div class="mb-3">
                        <label for="subName" class="form-label" style="font-size:18px;">Card Name</label>
                        <input type="text" class="form-control textbox-white" id="subCardName" name="subCardName" value="<?php echo $subCardName;?>" disabled>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xxl-6 gx-5">
                    <div class="mb-3">
                        <label for="subName" class="form-label" style="font-size:18px;">Type your card number<span style="color:#f04148; padding-left:10px;">*</span><span style="color:#f04148; padding-left:10px;">
                        <?php if(isset($subCardNumber) && $subCardNumberErr==true) {echo $subCardNumberErrMsg;} ?></span></label>
                        <input type="password" class="form-control textbox-white" id="subCardNumber" name="subCardNumber">
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-xxl-6 gx-5">
                    <div class="mb-3">
                        <label for="subCardNumber" class="form-label" style="font-size:18px;">New card number<span style="color:#f04148; padding-left:10px;">*</span><span style="color:#f04148; padding-left:10px;">
                        <?php if(isset($newSubCardNumber) && $newSubCardNumberErr==true) {echo $newSubCardNumberErrMsg;} ?></span></label>
                        <input type="password" class="form-control textbox-white" id="newSubCardNumber" name="newSubCardNumber">
                    </div>
                </div>
            </div>
            <div class="contentButton">
            <a href="homepage.php?subName=<?php echo $subName;?>" target="_self" style="color: rgb(0, 0, 0); text-decoration: none; width: 300px;"><input type="submit" class="btn btn-primary btn-md btnMid center" id="btnSave" name="btnSave" value="Save"></a>
            </div>
            <a href="homepage.php?subName=<?php echo $subName;?>" style="text-align:center; color:#2e3192; text-decoration:none; width:80%;" class="center link">Cancel</a>
        </form>
        <div style="padding-bottom:50px;"></div>
    </div>
    <?php require_once("headerAndFooter/footer.php"); ?>
</body>
</html>