<?php 
    session_start();
    require_once "connection/connection.php";
    $con = connection();

    $email = $_SESSION['email'];
        
    if($_SERVER['REQUEST_METHOD'] == 'GET') {
        $_SESSION['sortAccordingTo'] = $_GET['sortAccordingTo'];
        $_SESSION['order'] = $_GET['order'];
        $sortAccordingTo = $_SESSION['sortAccordingTo'];
        $order = $_SESSION['order'];
        $sortAccordingToSQL="";
        $orderSQL="";

        switch($sortAccordingTo) {
            case "Default": $sortAccordingToSQL = ""; break;
            case "Start Date": $sortAccordingToSQL = "sub_StartDate"; break;
            case "End Date": $sortAccordingToSQL = "sub_EndDate"; break;
            case "Last Used": $sortAccordingToSQL = "sub_LastUsed"; break;
            case "Name": $sortAccordingToSQL = "sub_Name"; break;
        }
        
        switch($order) {
            case "None": $orderSQL = ""; break;
            case "Ascending": $orderSQL = "ASC"; break;
            case "Descending": $orderSQL = "DESC"; break;
        }
        //echo '<script>alert("sort1: '; echo $_GET['sortAccordingTo']; echo ' order1: '; echo $_GET['order'];
        //echo ' sort: '; echo $sortAccordingToSQL; echo ' order: '; echo $orderSQL; echo '");</script>';
        if($sortAccordingToSQL!="" && $orderSQL!="") {
            $result = $con->query("SELECT * FROM `$email` ORDER BY $sortAccordingToSQL $orderSQL;") or die($con->error);
        } else {
            $result = $con->query("SELECT * FROM `$email`;") or die($con->error);
        }
    }
    else {
        $result = $con->query("SELECT * FROM `$email`;") or die($con->error);
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
    <!--TITLE & ADD SUBSCRIPTION BUTTON-->
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
    <!--SORT-->
    <?php if($result->num_rows>0) { //!empty($result->num_rows) && $result->num_rows>0 ?>
    <div class="row">
        <form name="sort" id="sort" method="GET" class="center justify-content-start sortform" style="width:40%;">
            <div class="row">
                <div class=col-lg-6>
                    <div class="row" style="padding-top:20px; padding-bottom:10px; padding-left:10px; padding-right:10px;">
                        <label class="homepageSortLabel col-sm-6">Sort according to:</label>
                        <select id="sortAccordingTo" name="sortAccordingTo" class="form-select dropdown-blue col-sm-6" onchange="this.form.submit()">
                            <?php
                            echo '<option value="Default"'; if(isset($sortAccordingTo) && $sortAccordingTo=='Default'){echo ' selected';} echo '>Default</option>';
                            echo '<option value="Start Date"'; if(isset($sortAccordingTo) && $sortAccordingTo=='Start Date'){echo ' selected';} echo '>Start Date</option>';
                            echo '<option value="End Date"'; if(isset($sortAccordingTo) && $sortAccordingTo=='End Date'){echo ' selected';} echo '>End Date</option>';
                            echo '<option value="Last Used"'; if(isset($sortAccordingTo) && $sortAccordingTo=='Last Used'){echo ' selected';} echo '>Last Used</option>';
                            echo '<option value="Name"'; if(isset($sortAccordingTo) && $sortAccordingTo=='Name'){echo ' selected';} echo '>Name</option>';
                            ?>
                        </select>
                    </div>
                </div>
                <div class=col-lg-6>
                    <div class="row" style="padding-top:20px; padding-bottom:10px; padding-left:10px; padding-right:10px;">
                        <label class="homepageSortLabel col-sm-6">In what order:</label>
                        <select id="order" name="order" class="form-select dropdown-blue col-sm-6" onchange="this.form.submit()">
                            <?php
                            echo '<option value="None"'; if(isset($order) && $order=='None'){echo ' selected';} echo '>None</option>';
                            echo '<option value="Ascending"'; if(isset($order) && $order=='Ascending'){echo ' selected';} echo '>Ascending</option>';
                            echo '<option value="Descending"'; if(isset($order) && $order=='Descending'){echo ' selected';} echo '>Descending</option>';
                            ?>
                        </select>
                    </div>
                </div>
            </div><br>
            <div class="contentButton" style="visibility:hidden; width:0; height:0;"> <!--submit form on every change in dropdown-->
                <input type="submit" id="btnSort" name="btnSort" value="Sort"><a href="#" target="_self"></a>
            </div>
        </form>
    </div>
    <!--SUBSCRIPTIONS-->
    <div style="display:flex; width:100% !important; min-height:70vh; border:1 blue; position:relative; z-index:1;" class="d-flex align-content-start flex-wrap justify-content-center"> <!--class="d-flex flex-wrap"-->
    <?php while ($row = $result->fetch_assoc()){ ?>
        <div class="col-3 card-blue">
            <h1 class="homepageSubName"><?php echo $row['sub_Name']; ?></h1>
            <table>
                <tr>
                    <td class="homepageLabel">Type:</td>
                    <td class="homepageValue" id="subType" name="subType"><?php echo $row['sub_Type']; ?></td>
                </tr>
                <tr>
                    <td class="homepageLabel">Start Date:</td>
                    <td class="homepageValue" id="subStartDate" name="subStartDate"><?php echo $row['sub_StartDate']; ?></td>
                </tr>
                <tr>
                    <td class="homepageLabel">End Date:</td>
                    <td class="homepageValue" id="subEndDate" name="subEndDate"><?php echo $row['sub_EndDate']; ?></td>
                </tr>
                <tr>
                    <td class="homepageLabel">Last Used:</td>
                    <td class="homepageValue" id="subLastUsed" name="subLastUsed"><?php echo $row['sub_LastUsed']; ?></td>
                </tr>
            </table>
            <table>
                <tr><td class="homepageValue" id="subAcctName" name="subAcctname"><?php echo $row['sub_AcctName']; ?></td></tr>
                <tr><td class="homepageValue" id="subUsername" name="subUsername"><?php echo $row['sub_Username']; ?></td></tr>
                <tr><td class="homepageValue" id="subEmail" name="subEmail"><?php echo $row['sub_Email']; ?></td></tr>
                <tr><td class="homepageValue" id="subCardName" name="subCardName"><?php echo $row['sub_CardName']; ?></td></tr>
                <tr><td class="homepageValue" id="subCardNumber" name="subCardNumber" value=""><?php if($row['sub_CardNo']>0) {echo $row['sub_CardNo'];}; ?></td></tr>
            </table>
            <div class="d-flex justify-content-end">
                <?php $subName=$row['sub_Name']; $sorted=true;?>
                <button type="submit" style="background:none; color:inherit; border:none; padding:0; font:inherit; outline:inherit;">
                <a href="editSubscription.php?subName=<?php echo $subName;?>&sortAccordingTo=<?php echo $sortAccordingTo;?>&order=<?php echo $order;?>" onclick="document.getElementById('sort').form.submit()"><img src="img/Edit_Icon.png" class="homepageIcon"></a></button>
                
                <button type="button" style="background:none; color:inherit; border:none; padding:0; font:inherit; outline:inherit;">
                <a href="deleteSubscription.php?subName=<?php echo $subName;?>&sortAccordingTo=<?php echo $sortAccordingTo;?>&order=<?php echo $order;?>"><img src="img/Delete_Icon.png" class="homepageIcon"></a></button> <!--data-bs-toggle="modal" data-bs-target="#deleteSubModal"-->
            </div>
        </div>
    <?php }; ?>
    </div>
    <div style="padding-bottom: 90px;"></div>
    <?php } else {?>
    
    <!--If there are no subscriptions-->
    <div class="center homepage-nosubsdiv">
        <img src="img/Empty_Box.png" alt="" class="center homepage-nosubsimage">
        <label class="center homepage-nosubslabel">Uh Oh, you don't have any subscriptions yet. Click the plus buttson to add one!</label>
    </div>
    <?php }?>
    
    <?php require_once("headerAndFooter/footer.php"); ?>

    <!-- Modal -->
    <div class="modal fade" id="deleteSubModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm Deletion</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure you want to delete your subscription?
            </div>
            <div class="modal-footer">
                <a href="homepage.php?subName=<?php echo $subName;?>" target="_self" style="text-decoration:none;"><input type="submit" class="btn btn-primary btn-md btnMid center" style="width:100px !important; padding:10px; font-size:18px; background-color:#0d6efd; margin:0;" id="btnYes" name="btnYes" value="Yes" onclick="deleteSub()"></a>
                <a href="homepage.php" target="_self" style="text-decoration:none;" data-bs-dismiss="modal"><input type="submit" class="btn btn-primary btn-md btnMid center" style="width:100px !important; padding:10px; font-size:18px; background-color:#6c757d; margin:0;" id="btnNo" name="btnNo" value="No"></a>
            </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</body>
</html>