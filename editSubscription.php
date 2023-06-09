<?php 
    session_start();
    require_once "connection/connection.php";
    $con = connection();

    if(isset($_GET['subName'])){
        $email = $_SESSION['email'];
        $_SESSION['subName']=$_GET['subName'];
        $subName = $_SESSION['subName'];
        $subID = getAccountDetail($email,$subName,'sub_ID');
    } else {
        header("Location: indexAndLogin.php?redirect=homepage");
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $subName = $_POST['subName'];
        $subType = $_POST['subType'];
        $subStartDate = $_POST['subStartDate'];
        $subEndDate = $_POST['subEndDate'];
        $subLastUsed = $_POST['subLastUsed'];
        $subAcctName = $_POST['subAcctName'];
        $subUsername = $_POST['subUsername'];
        $subEmail = $_POST['subEmail'];
        $subCardName = $_POST['subCardName'];
        
        if(isset($_POST['btnSave'])) {
            $sql = "UPDATE `$email` SET sub_Name='$subName', sub_AcctName='$subAcctName', sub_Username='$subUsername', sub_Email='$subEmail', sub_CardName='$subCardName', sub_Type='$subType', sub_StartDate='$subStartDate', sub_EndDate='$subEndDate', sub_LastUsed='$subLastUsed' WHERE sub_ID = '$subID';";
            $con->query($sql);
            $_SESSION['email'] = $email;
            if(isset($_GET['sortAccordingTo']) && isset($_GET['order'])) {
                $link = 'homepageSorted.php?sortAccordingTo='.$_GET['sortAccordingTo'].'&order='.$_GET['order'];
            } else {
                $link = 'homepage.php';}
            header("Location: $link");
            //header("Location: homepage.php");
        }
    }

    if($_SERVER['REQUEST_METHOD'] == 'GET') {
        if(isset($_GET['sortAccordingTo']) && isset($_GET['order'])) {
            $_SESSION['sortAccordingTo'] = $_GET['sortAccordingTo'];
            $_SESSION['order'] = $_GET['order'];
            $sortAccordingTo = $_SESSION['sortAccordingTo'];
            $order = $_SESSION['order'];
            //echo '<script>alert("sort1: '.$_GET['sortAccordingTo'].' order1: '.$_GET['order'].'</script>';
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
<body>
    <?php require_once("headerAndFooter/navbarWithAccount.php"); ?>
    <div style="padding-top:110px; height:215px;" class="section3">
        <label class="center title" style="filter: drop-shadow(2px 2px 20px rgba(0,0,0,0.3)) drop-shadow(-2px -2px 20px rgba(0,0,0,0.3)); padding:0;">Edit Subscription</label>
    </div>

    <div style="padding-top:20px; background-color:#e1edff;">
        <form name="editSubscription" id="editSubscription" method="POST" class="center addSubForms">
        <div class="row justify-content-center">
            <div class="col-xxl-6 gx-5">
                <div class="mb-3">
                    <label for="subName" class="form-label" style="font-size:18px;">Subscription Name<span style="color:#f04148; padding-left:10px;">*</span></label>
                    <input type="text" class="form-control textbox-white" id="subName" name="subName" value="<?php echo getAccountDetail($email,$subName,'sub_Name'); ?>"  required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xxl-6 gx-5">
                <div class="mb-3">
                    <label for="subType" class="form-label" style="font-size:18px;">Subscription Type<span style="color:#f04148; padding-left:10px;">*</span></label>
                    <input type="text" class="form-control textbox-white" id="subType" name="subType" value="<?php echo getAccountDetail($email,$subName,'sub_Type'); ?>" required>
                </div>
                <div class="mb-3">
                    <label for="subStartDate" class="form-label" style="font-size:18px;">Start Date<span style="color:#f04148; padding-left:10px;">*</span></label>
                    <input type="date" class="form-control textbox-white" id="subStartDate" name="subStartDate" placeholder="MM/DD/YYYY" value="<?php echo getAccountDetail($email,$subName,'sub_StartDate'); ?>" required>
                </div>
                <div class="mb-3" style="padding-top:15px;">
                    <label for="subEndDate" class="form-label" style="font-size:18px;">End Date</label>
                    <input type="date" class="form-control textbox-white" id="subEndDate" name="subEndDate" placeholder="MM/DD/YYYY" value="<?php echo getAccountDetail($email,$subName,'sub_EndDate'); ?>" required>
                </div>
                <div class="mb-3" style="padding-top:15px;">
                    <label for="subLastUsed" class="form-label" style="font-size:18px;">Last Used<span style="color:#f04148; padding-left:10px;">*</span></label>
                    <input type="date" class="form-control textbox-white" id="subLastUsed" name="subLastUsed" placeholder="MM/DD/YYYY" value="<?php echo getAccountDetail($email,$subName,'sub_LastUsed'); ?>" required>
                </div>
            </div>
            <div class="col-xxl-6 gx-5">
                <div class="mb-3">
                    <label for="subAcctName" class="form-label" style="font-size:18px;">Account Name</label>
                    <input type="text" class="form-control textbox-white" id="subAcctName" value="<?php echo getAccountDetail($email,$subName,'sub_AcctName'); ?>" name="subAcctName">
                </div>
                <div class="mb-3">
                    <label for="subUsername" class="form-label" style="font-size:18px;">Username</label>
                    <input type="text" class="form-control textbox-white" id="subUsername" value="<?php echo getAccountDetail($email,$subName,'sub_Username'); ?>" name="subUsername">
                </div>
                <div class="mb-3" style="padding-top:15px;">
                    <label for="subEmail" class="form-label" style="font-size:18px;">Email Address</label>
                    <input type="subEmail" class="form-control textbox-white" id="subEmail" value="<?php echo getAccountDetail($email,$subName,'sub_Email'); ?>" name="subEmail">
                </div>
                <div class="mb-3" style="padding-top:15px;">
                    <label for="subCardName" class="form-label" style="font-size:18px;">Card Name</label>
                    <input type="text" class="form-control textbox-white" id="subCardName" value="<?php echo getAccountDetail($email,$subName,'sub_CardName'); ?>" name="subCardName">
                </div>
            </div>
        </div>
            <div class="contentButton">
            <a href="<?php if(isset($sortAccordingTo) && isset($order)){echo 'homepageSorted.php?sortAccordingTo='.$sortAccordingTo.'&order='.$order;} else{echo 'homepage.php';}?>" target="_self" style="color: rgb(0, 0, 0); text-decoration: none; width: 300px;"><input type="submit" class="btn btn-primary btn-md btnMid center" style="margin-bottom:10px;" id="btnSave" name="btnSave" value="Save"></a>
            <a href="<?php if(isset($sortAccordingTo) && isset($order)){echo 'changeCardDetails.php?subName='.$subName.'&sortAccordingTo='.$sortAccordingTo.'&order='; echo $order;} else{echo 'changeCardDetails.php?subName='.$subName;}?>" target="_self" style="color: rgb(0, 0, 0); text-decoration: none; width: 300px;"><input type="button" class="btn btn-primary btn-md btnMid center" style="margin-top:10px;" id="btnEditCardNo" name="btnEditCardNo" value="Change Card Details"></a>
            </div>
            <a href="<?php if(isset($sortAccordingTo) && isset($order)){echo 'homepageSorted.php?sortAccordingTo='; echo $sortAccordingTo; echo '&order='; echo $order;} else{echo 'homepage.php';}?>" style="text-align:center; color:#2e3192; text-decoration:none; width:80%;" class="center link">Cancel</a>
        </form>
        <div style="padding-bottom:50px;"></div>
    </div>
    <?php require_once("headerAndFooter/footer.php"); ?>
</body>
</html>