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
                    <label for="subName" class="form-label" style="font-size:18px;">Subscription Name<span style="color:#f04148; padding-left:10px;">*</span><span style="color:#f04148; padding-left: 50px;">Should not be empty</span></label>
                    <input type="text" class="form-control textbox-white" id="subName" name="subName" value="Canva" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xxl-6 gx-5">
                <div class="mb-3">
                    <label for="subType" class="form-label" style="font-size:18px;">Subscription Type<span style="color:#f04148; padding-left:10px;">*</span><span style="color:#f04148; padding-left: 50px;">Should not be empty</span></label>
                    <input type="text" class="form-control textbox-white" id="subType" name="subType" value="Premium" required>
                </div>
                <div class="mb-3">
                    <label for="subStartDate" class="form-label" style="font-size:18px;">Start Date<span style="color:#f04148; padding-left:10px;">*</span><span style="color:#f04148; padding-left: 50px;">Should not be empty</span></label>
                    <input type="text" class="form-control textbox-white" id="subStartDate" name="subStartDate" placeholder="MM/DD/YYYY" value="05/22/23" required>
                </div>
                <div class="mb-3" style="padding-top:15px;">
                    <label for="subEndDate" class="form-label" style="font-size:18px;">End Date<span style="color:#f04148; padding-left:10px;">*</span><span style="color:#f04148; padding-left: 50px;">Should not be empty</span></label>
                    <input type="text" class="form-control textbox-white" id="subEndDate" name="subEndDate" placeholder="MM/DD/YYYY" value="05/22/23" required>
                </div>
                <div class="mb-3" style="padding-top:15px;">
                    <label for="subLastUsed" class="form-label" style="font-size:18px;">Last Used<span style="color:#f04148; padding-left:10px;">*</span><span style="color:#f04148; padding-left: 50px;">Should not be empty</span></label>
                    <input type="text" class="form-control textbox-white" id="subLastUsed" name="subLastUsed" placeholder="MM/DD/YYYY" value="05/22/23" required>
                </div>
            </div>
            <div class="col-xxl-6 gx-5">
                <div class="mb-3">
                    <label for="subAcctName" class="form-label" style="font-size:18px;">Account Name</label>
                    <input type="text" class="form-control textbox-white" id="subAcctName" value="Ira Rayzel S. Ji" name="subAcctName">
                </div>
                <div class="mb-3">
                    <label for="subUsername" class="form-label" style="font-size:18px;">Username</label>
                    <input type="text" class="form-control textbox-white" id="subUsername" value="irarayzelji2002" name="subUsername">
                </div>
                <div class="mb-3" style="padding-top:15px;">
                    <label for="subEmail" class="form-label" style="font-size:18px;">Email Address<span style="color:#f04148; padding-left: 50px;">Not a valid email address</span></label>
                    <input type="subEmail" class="form-control textbox-white" id="subEmail" value="irarayzelji@gmail.com" name="subEmail">
                </div>
                <div class=row>
                    <div class="col-xxl-6">
                        <div class="mb-3" style="padding-top:15px;">
                            <label for="subCardName" class="form-label" style="font-size:18px;">Card Name</label>
                            <input type="text" class="form-control textbox-white" id="subCardName" value="Master Card" name="subCardName">
                        </div>
                    </div>
                    <div class="col-xxl-6">
                        <div class="mb-3" style="padding-top:15px;">
                            <label for="subCardNumber" class="form-label" style="font-size:18px;">Card Number<span style="color:#f04148; padding-left: 30px;">Numbers only</span></label>
                            <input type="password" class="form-control textbox-white" id="subCardNumber" value="1111222233334444" name="subCardNumber">
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="contentButton">
            <a href="homepage.php" target="_self" style="color: rgb(0, 0, 0); text-decoration: none; width: 300px;"><input type="submit" class="btn btn-primary btn-md btnMid center" id="btnReg" name="btnReg" value="Save"></a>
            </div>
            <a href="homepage.php" style="text-align:center; color:#2e3192; text-decoration:none; width:80%;" class="center">Cancel</a>
        </form>
        <div style="padding-bottom:50px;"></div>
    </div>
    <?php require_once("headerAndFooter/footer.php"); ?>

    <!--Turning password into asterisks-->
    <script>
        var pass= document.getElementById("subCardNumber").innerHTML;
        var char = pass.length;
        var password ="";
        for (i=0;i<char;i++) {
            password += "*"; }
        document.getElementById("subCardNumber").innerHTML = password;
    </script>
</body>
</html>