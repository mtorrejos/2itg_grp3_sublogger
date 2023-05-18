<?php
    define('DATABASE_HOST', 'localhost');
    define('DATABASE_USER', 'root');
    define('DATABASE_PASS', '');
    define('DATABASE_NAME','sublogger');

    function connection() {
        $e = 'mysqli_sql_exception';

        //database creation
        try { mysqli_connect(DATABASE_HOST, DATABASE_USER, DATABASE_PASS, DATABASE_NAME); }
        catch(Exception $e) { 
            $con = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS);
            $sql = "CREATE DATABASE IF NOT EXISTS sublogger";
            $con->query($sql);
        }

        //users table
        $con = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS,DATABASE_NAME);
        $sql = ' CREATE TABLE IF NOT EXISTS `users`(
        `user_ID` INT(11) NOT NULL AUTO_INCREMENT,
        `user_FirstName` VARCHAR(50) NOT NULL,
        `user_LastName` VARCHAR(50) NOT NULL,
        `user_Email` VARCHAR(100) NOT NULL,
        `user_Password` VARCHAR(255) NOT NULL,
        `user_EmailReminderTime` INT(12) NOT NULL,
        `user_EmailSurveyTime` INT(12) NOT NULL,
        PRIMARY KEY(`user_ID`)
        ) ENGINE = InnoDB AUTO_INCREMENT = 1 DEFAULT CHARSET = utf8;';
        $con->query($sql);
        //users table

        if($con->connect_error) {
            echo $con->connect_error;
        } else {
            return $con;
        }
    }


    function checkAccount($email) {
        $con = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS,DATABASE_NAME);
        $sql = $con->prepare("SELECT COUNT(*) FROM users WHERE user_Email = '$email';");
        $sql->execute();
        $sql->bind_result($count);
        $sql->fetch();
        $sql->close();
        return $count;

    }

    function checkSubName($email,$name) {
        $con = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS,DATABASE_NAME);
        $sql = $con->prepare("SELECT COUNT(*) FROM `$email` WHERE sub_Name = '$name';");
        $sql->execute();
        $sql->bind_result($count);
        $sql->fetch();
        $sql->close();
        return $count;
    }

    function createSubTable($email) {
        //user subscriptions table
        $con = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS,DATABASE_NAME);

        $sql = "CREATE TABLE IF NOT EXISTS `$email` (
        `sub_ID` INT(11) NOT NULL AUTO_INCREMENT,
        `sub_Name` VARCHAR(50) NOT NULL,
        `sub_AcctName` VARCHAR(50),
        `sub_Username` VARCHAR(50),
        `sub_Email` VARCHAR(100),
        `sub_CardName` VARCHAR(100),
        `sub_CardNo` VARCHAR(255) NOT NULL,
        `sub_Type` VARCHAR(20) NOT NULL,
        `sub_StartDate` DATE NOT NULL,
        `sub_EndDate` DATE,
        `sub_LastUsed` DATE NOT NULL,
        PRIMARY KEY(`sub_ID`)
        ) ENGINE = InnoDB AUTO_INCREMENT = 1 DEFAULT CHARSET = utf8;";
        $con->query($sql);
        //user subscriptions table
    }

    function validateName($name) {
        $nameErr="";
        if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
            $nameErr = "Only letters and white space allowed";
        }
        return $nameErr;
    }

    function validateEmail($email) {
        $emailErr="";
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Not a valid email address";
        }
        return $emailErr;
    }

    function validateNumber($num) {
        $numErr="";
        if(!is_numeric($num) && ($num!=0 || $num!="")) {
            $numErr = "Numbers only";
        }
        return $numErr;
    }

    function getFirstName($email) {
        $con = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS,DATABASE_NAME);
        $sql = $con->prepare("SELECT user_FirstName FROM users WHERE user_Email = '$email';") or die($con->error);
        $sql->execute();
        $sql->bind_result($dbpass);
        $sql->fetch();
        $sql->close();
        return $dbpass;
    }

    function getLastName($email) {
        $con = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS,DATABASE_NAME);
        $sql = $con->prepare("SELECT user_LastName FROM users WHERE user_Email = '$email';") or die($con->error);
        $sql->execute();
        $sql->bind_result($dbpass);
        $sql->fetch();
        $sql->close();
        return $dbpass;
    }

    function getPassword($email) { //hashed password
        $con = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS,DATABASE_NAME);
        $sql = $con->prepare("SELECT user_Password FROM users WHERE user_Email = '$email';") or die($con->error);
        $sql->execute();
        $sql->bind_result($dbpass);
        $sql->fetch();
        $sql->close();
        return $dbpass;
    }

    function getFrequency($email) {
        $con = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS,DATABASE_NAME);
        $sql = $con->prepare("SELECT user_EmailReminderTime FROM users WHERE user_Email = '$email';") or die($con->error);
        $sql->execute();
        $sql->bind_result($time);
        $sql->fetch();
        $sql->close();
        return $time;
    }

    function getFrequencyText($email) {
        switch (getFrequency($email)){
            case 1:
                return "Every 5 minutes"; //might be a bit too much lmao
                break;
            case 2:
                return "Every hour";
                break;
            case 3:
                return "Once a month"; 
                break;
            case 4:
                return "Twice a month"; 
                break;
            case 5:
                return "Once every two months"; 
                break;
            case 6:
                return "Once every six months"; 
                break;
            case 7:
                return "Once a year";
                break;
            default:
                return "Error - Contact help if you get this.";
                break;
        }
    }

    function getSurvey($email) {
        $con = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS,DATABASE_NAME);
        $sql = $con->prepare("SELECT user_EmailSurveyTime FROM users WHERE user_Email = '$email';") or die($con->error);
        $sql->execute();
        $sql->bind_result($time);
        $sql->fetch();
        $sql->close();
        return $time;
    }

    function getSurveyText($email) {
        switch (getSurvey($email)){
            case 1:
                return "Every 5 minutes"; //might be a bit too much lmao
                break;
            case 2:
                return "Every hour";
                break;
            case 3:
                return "Once a month"; 
                break;
            case 4:
                return "Twice a month"; 
                break;
            case 5:
                return "Once every two months"; 
                break;
            case 6:
                return "Once every six months"; 
                break;
            case 7:
                return "Once a year";
                break;
            default:
                return "Error - Contact help if you get this.";
                break;
        }
    }

    function getAccountDetail($email,$sub,$detail){
        $con = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS,DATABASE_NAME);
        $sql = $con->prepare("SELECT `$detail` FROM `$email` WHERE sub_Name = '$sub';") or die($con->error);
        $sql->execute();
        $sql->bind_result($detail);
        $sql->fetch();
        $sql->close();
        return $detail;
    }

    function getMailerDetail($detail) {
        $con = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS,DATABASE_NAME);
        $sql = $con->prepare("SELECT `$detail` FROM mailer WHERE mailer_ID = 1;") or die($con->error);
        $sql->execute();
        $sql->bind_result($detail);
        $sql->fetch();
        $sql->close();
        return $detail;
    }

    function updateCardNo($email,$subName,$subAcctName,$subUsername,$subEmail,$subCardName,$newSubCardNumber,$subType,$subStartDate,$subEndDate,$subLastUsed,$subCardNumber) {
        $con = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS,DATABASE_NAME);
        //$sql = "UPDATE `$email` SET `sub_CardNo` = '$num' WHERE `sub_Name` = '$subName';" or die($con->error);
        $old = $subCardNumber;
        $sql = "INSERT INTO `$email` (sub_Name, sub_AcctName, sub_Username, sub_Email, sub_CardName, sub_CardNo, sub_Type, sub_StartDate, sub_EndDate, sub_LastUsed) VALUES ('$subName', '$subAcctName', '$subUsername', '$subEmail', '$subCardName', '$newSubCardNumber', '$subType', '$subStartDate','$subEndDate', '$subLastUsed');" or die($con->error);
        $con->query($sql);
        $sql = "DELETE FROM `$email` WHERE sub_Name = '$subName' AND sub_CardNo = '$old';" or die($con->error);
        $con->query($sql);
    }
    
    function difference($date){
        $date1 = new DateTime("now");
        $date2 = new DateTime($date);
        $interval = $date1->diff($date2);
        //Divided
        $diff = $interval->y . " years, " . $interval->m." months, ".$interval->d." days"; 
        return $diff;
        //Days Only
        //return $interval->days . " days "; 
    }
?>