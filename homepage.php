<?php 
    session_start();
    require_once "connection/connection.php";
    $con = connection();
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
    <title>Homepage</title>
</head>
<body>
    <?php require_once("headerAndFooter/navbarWithAccount.php"); ?>
    <div style="padding-top:110px;" class="section3">
        <label class="center title" style="filter: drop-shadow(2px 2px 20px rgba(0,0,0,0.3)) drop-shadow(-2px -2px 20px rgba(0,0,0,0.3)); padding:0;">Subscriptions</label>
        <div style="position:fixed; z-index:8; display: flex; width:100%; justify-content: flex-end">
            <div style="position:absolute; top:-95px; padding-top:30px; padding-right:40px; padding-left:40px;">
                <a href="addSubscription.php" class="addSubCircle" style="height:60px; width:60px; border-radius:30px; background-color:#0d6efd; filter: drop-shadow(1px 1px 3px rgba(0,0,0,0.3)); z-index:8; right:20px; display:block; text-decoration:none;">
                    <a href="addSubscription.php" style="color:white; font-size: 55px; font-weight:400; margin-left: 14px; line-height:57px; position:absolute; top:30px; text-decoration:none;" class="center">+</a>
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <form name="login" id="login" method="GET" class="center justify-content-start sortform" style="width:40%;">
            <div class="row">
                <div class=col-lg-6>
                    <div class="row" style="padding-top:20px; padding-bottom:10px; padding-left:10px; padding-right:10px;">
                        <label class="homepageSortLabel col-sm-6">Sort according to:</label>
                        <select id="sortAccordingTo" name="sortAccordingTo" class="form-select dropdown-blue col-sm-6">
                            <option value="Default" selected>Default</option>
                            <option value="Start Date">Start Date</option>
                            <option value="End Date">End Date</option>
                            <option value="Last Used">Last Used</option>
                            <option value="Name">Name</option>
                        </select>
                    </div>
                </div>
                <div class=col-lg-6>
                    <div class="row" style="padding-top:20px; padding-bottom:10px; padding-left:10px; padding-right:10px;">
                        <label class="homepageSortLabel col-sm-6">In what order:</label>
                        <select id="order" name="order" class="form-select dropdown-blue col-sm-6">
                            <option value="None" selected>None</option>
                            <option value="Ascending">Ascending</option>
                            <option value="Descending">Descending</option>
                        </select>
                    </div>
                </div>
            </div><br>
            <div class="contentButton" style="visibility:hidden; width:0; height:0;"> <!--submit form on every change in dropdown-->
                <input type="submit" id="btnSort" name="btnSort" value="Sort"><a href="#" target="_self"></a>
            </div>
        </form>
    </div>
    <div style="display:flex; width:100% !important; min-height:70vh; border:1 blue; position:relative; z-index:1;" class="d-flex align-content-start flex-wrap justify-content-center"> <!--class="d-flex flex-wrap"-->
        <div class="col-3 card-blue">
            <h1 class="homepageSubName">Canva</h1>
            <table>
                <tr>
                    <td class="homepageLabel">Type:</td>
                    <td class="homepageValue" id="subType" name="subType">Premium</td>
                </tr>
                <tr>
                    <td class="homepageLabel">Start Date:</td>
                    <td class="homepageValue" id="subStartDate" name="subStartDate">March 20, 2023</td>
                </tr>
                <tr>
                    <td class="homepageLabel">End Date:</td>
                    <td class="homepageValue" id="subEndDate" name="subEndDate">April 20, 2023</td>
                </tr>
                <tr>
                    <td class="homepageLabel">Last Used:</td>
                    <td class="homepageValue" id="subLastUsed" name="subLastUsed">March 20, 2023</td>
                </tr>
            </table>
            <table>
                <tr><td class="homepageValue" id="subAcctName" name="subAcctname">Ira Rayzel S. Ji</td></tr>
                <tr><td class="homepageValue" id="subUsername" name="subUsername">irarayzelji2002</td></tr>
                <tr><td class="homepageValue" id="subEmail" name="subEmail">irarayzelji@gmail.com</td></tr>
                <tr><td class="homepageValue" id="subCardName" name="subCardName">MasterCard</td></tr>
                <tr><td class="homepageValue" id="subCardNumber" name="subCardNumber">**** **** **** ****</td></tr>
            </table>
            <div class="d-flex justify-content-end">
                <a href="editSubscription.php"><img src="img/Edit_Icon.png" class="homepageIcon"></a>
                <a href="deleteSubscription.php"><img src="img/Delete_Icon.png" class="homepageIcon"></a>
            </div>
        </div>
        <div class="col-3 card-blue">
            <h1 class="homepageSubName">Canva</h1>
            <table>
                <tr>
                    <td class="homepageLabel">Type:</td>
                    <td class="homepageValue" id="subType" name="subType">Premium</td>
                </tr>
                <tr>
                    <td class="homepageLabel">Start Date:</td>
                    <td class="homepageValue" id="subStartDate" name="subStartDate">March 20, 2023</td>
                </tr>
                <tr>
                    <td class="homepageLabel">End Date:</td>
                    <td class="homepageValue" id="subEndDate" name="subEndDate">April 20, 2023</td>
                </tr>
                <tr>
                    <td class="homepageLabel">Last Used:</td>
                    <td class="homepageValue" id="subLastUsed" name="subLastUsed">March 20, 2023</td>
                </tr>
            </table>
            <table>
                <tr><td class="homepageValue" id="subAcctName" name="subAcctname">Ira Rayzel S. Ji</td></tr>
                <tr><td class="homepageValue" id="subUsername" name="subUsername">irarayzelji2002</td></tr>
                <tr><td class="homepageValue" id="subEmail" name="subEmail">irarayzelji@gmail.com</td></tr>
                <tr><td class="homepageValue" id="subCardName" name="subCardName">MasterCard</td></tr>
                <tr><td class="homepageValue" id="subCardNumber" name="subCardNumber">**** **** **** ****</td></tr>
            </table>
            <div class="d-flex justify-content-end">
                <a href="editSubscription.php"><img src="img/Edit_Icon.png" class="homepageIcon"></a>
                <a href="deleteSubscription.php"><img src="img/Delete_Icon.png" class="homepageIcon"></a>
            </div>
        </div>
        <div class="col-3 card-blue">
            <h1 class="homepageSubName">Canva</h1>
            <table>
                <tr>
                    <td class="homepageLabel">Type:</td>
                    <td class="homepageValue" id="subType" name="subType">Premium</td>
                </tr>
                <tr>
                    <td class="homepageLabel">Start Date:</td>
                    <td class="homepageValue" id="subStartDate" name="subStartDate">March 20, 2023</td>
                </tr>
                <tr>
                    <td class="homepageLabel">End Date:</td>
                    <td class="homepageValue" id="subEndDate" name="subEndDate">April 20, 2023</td>
                </tr>
                <tr>
                    <td class="homepageLabel">Last Used:</td>
                    <td class="homepageValue" id="subLastUsed" name="subLastUsed">March 20, 2023</td>
                </tr>
            </table>
            <table>
                <tr><td class="homepageValue" id="subAcctName" name="subAcctname">Ira Rayzel S. Ji</td></tr>
                <tr><td class="homepageValue" id="subUsername" name="subUsername">irarayzelji2002</td></tr>
                <tr><td class="homepageValue" id="subEmail" name="subEmail">irarayzelji@gmail.com</td></tr>
                <tr><td class="homepageValue" id="subCardName" name="subCardName">MasterCard</td></tr>
                <tr><td class="homepageValue" id="subCardNumber" name="subCardNumber">**** **** **** ****</td></tr>
            </table>
            <div class="d-flex justify-content-end">
                <a href="editSubscription.php"><img src="img/Edit_Icon.png" class="homepageIcon"></a>
                <a href="deleteSubscription.php"><img src="img/Delete_Icon.png" class="homepageIcon"></a>
            </div>
        </div>
        <div class="col-3 card-blue">
            <h1 class="homepageSubName">Canva</h1>
            <table>
                <tr>
                    <td class="homepageLabel">Type:</td>
                    <td class="homepageValue" id="subType" name="subType">Premium</td>
                </tr>
                <tr>
                    <td class="homepageLabel">Start Date:</td>
                    <td class="homepageValue" id="subStartDate" name="subStartDate">March 20, 2023</td>
                </tr>
                <tr>
                    <td class="homepageLabel">End Date:</td>
                    <td class="homepageValue" id="subEndDate" name="subEndDate">April 20, 2023</td>
                </tr>
                <tr>
                    <td class="homepageLabel">Last Used:</td>
                    <td class="homepageValue" id="subLastUsed" name="subLastUsed">March 20, 2023</td>
                </tr>
            </table>
            <table>
                <tr><td class="homepageValue" id="subAcctName" name="subAcctname">Ira Rayzel S. Ji</td></tr>
                <tr><td class="homepageValue" id="subUsername" name="subUsername">irarayzelji2002</td></tr>
                <tr><td class="homepageValue" id="subEmail" name="subEmail">irarayzelji@gmail.com</td></tr>
                <tr><td class="homepageValue" id="subCardName" name="subCardName">MasterCard</td></tr>
                <tr><td class="homepageValue" id="subCardNumber" name="subCardNumber">**** **** **** ****</td></tr>
            </table>
            <div class="d-flex justify-content-end">
                <a href="editSubscription.php"><img src="img/Edit_Icon.png" class="homepageIcon"></a>
                <a href="deleteSubscription.php"><img src="img/Delete_Icon.png" class="homepageIcon"></a>
            </div>
        </div>
        <div class="col-3 card-blue">
            <h1 class="homepageSubName">Canva</h1>
            <table>
                <tr>
                    <td class="homepageLabel">Type:</td>
                    <td class="homepageValue" id="subType" name="subType">Premium</td>
                </tr>
                <tr>
                    <td class="homepageLabel">Start Date:</td>
                    <td class="homepageValue" id="subStartDate" name="subStartDate">March 20, 2023</td>
                </tr>
                <tr>
                    <td class="homepageLabel">End Date:</td>
                    <td class="homepageValue" id="subEndDate" name="subEndDate">April 20, 2023</td>
                </tr>
                <tr>
                    <td class="homepageLabel">Last Used:</td>
                    <td class="homepageValue" id="subLastUsed" name="subLastUsed">March 20, 2023</td>
                </tr>
            </table>
            <table>
                <tr><td class="homepageValue" id="subAcctName" name="subAcctname">Ira Rayzel S. Ji</td></tr>
                <tr><td class="homepageValue" id="subUsername" name="subUsername">irarayzelji2002</td></tr>
                <tr><td class="homepageValue" id="subEmail" name="subEmail">irarayzelji@gmail.com</td></tr>
                <tr><td class="homepageValue" id="subCardName" name="subCardName">MasterCard</td></tr>
                <tr><td class="homepageValue" id="subCardNumber" name="subCardNumber">**** **** **** ****</td></tr>
            </table>
            <div class="d-flex justify-content-end">
                <a href="editSubscription.php"><img src="img/Edit_Icon.png" class="homepageIcon"></a>
                <a href="deleteSubscription.php"><img src="img/Delete_Icon.png" class="homepageIcon"></a>
            </div>
        </div>
        <div class="col-3 card-blue">
            <h1 class="homepageSubName">Canva</h1>
            <table>
                <tr>
                    <td class="homepageLabel">Type:</td>
                    <td class="homepageValue" id="subType" name="subType">Premium</td>
                </tr>
                <tr>
                    <td class="homepageLabel">Start Date:</td>
                    <td class="homepageValue" id="subStartDate" name="subStartDate">March 20, 2023</td>
                </tr>
                <tr>
                    <td class="homepageLabel">End Date:</td>
                    <td class="homepageValue" id="subEndDate" name="subEndDate">April 20, 2023</td>
                </tr>
                <tr>
                    <td class="homepageLabel">Last Used:</td>
                    <td class="homepageValue" id="subLastUsed" name="subLastUsed">March 20, 2023</td>
                </tr>
            </table>
            <table>
                <tr><td class="homepageValue" id="subAcctName" name="subAcctname">Ira Rayzel S. Ji</td></tr>
                <tr><td class="homepageValue" id="subUsername" name="subUsername">irarayzelji2002</td></tr>
                <tr><td class="homepageValue" id="subEmail" name="subEmail">irarayzelji@gmail.com</td></tr>
                <tr><td class="homepageValue" id="subCardName" name="subCardName">MasterCard</td></tr>
                <tr><td class="homepageValue" id="subCardNumber" name="subCardNumber">**** **** **** ****</td></tr>
            </table>
            <div class="d-flex justify-content-end">
                <a href="editSubscription.php"><img src="img/Edit_Icon.png" class="homepageIcon"></a>
                <a href="deleteSubscription.php"><img src="img/Delete_Icon.png" class="homepageIcon"></a>
            </div>
        </div>
    </div>
    <div style="padding-bottom: 90px;"></div>

    <!--If there are no subscriptions
    <div class="center homepage-nosubsdiv">
        <img src="img/Empty_Box.png" alt="" class="center homepage-nosubsimage">
        <label class="center homepage-nosubslabel">Uh Oh, you don't have any subscriptions yet. Click the plus button to add one!</label>
    </div>
    -->
    
    <?php require_once("headerAndFooter/footer.php"); ?>

    <!--Turning card number into asterisks (Not Working)-->
    <script>
        var pass= document.getElementById("subCardNumber").innerHTML;
        var char = pass.length;
        var hidden ="";
        for (i=0;i<char;i++) {
            hidden += "*"; }
        document.getElementById("subCardNumber").innerHTML = subCardNumber;
    </script>
</body>
</html>