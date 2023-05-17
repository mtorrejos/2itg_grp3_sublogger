<?php //Note: This will not work as of right now. I still need to add the account details, but adding them on git is too dangerous
    session_start();
    require_once "connection/connection.php";
    $con = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS,DATABASE_NAME);
    $nAccount = $con->query("SELECT MAX(user_ID) AS max_ID FROM users;");
    $row = $nAccount->fetch_assoc();
    $maxID = $row['max_ID'];
    $cntID = 1;
    $dateToday = date("m-d-Y");
    $mailTo = $_SESSION['email'];

	//use PHPMailer\PHPMailer\PHPMailer;
	//use PHPMailer\PHPMailer\Exception;
	require 'PHPMailer/src/Exception.php';
	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->Host       = 'mail.smtp2go.com'; //add when ready                           
    $mail->SMTPAuth   = true;                                      
    $mail->Username   = 'SubLogger'; //add when ready
    $mail->Password   = 'ustcicssublogger'; //add when ready
    $mail->SMTPSecure = 'tls';                
    $mail->Port       = 2525; //add when ready
    //$mail->setFrom('reminder.sublogger@gmail.com', 'Sublogger Reminders');
    $mail->isHTML(true);
    $mail->From       = 'irarayzel.ji.cics@ust.edu.ph';
    $mail->FromName  = 'SubLogger Reminders';
    $mail->isSMTP();
    
    sendMail($mailTo,"It's Me, Hi!",$mail);

    // while($cntID <= $maxID) {
    //     //get the value of EmailReminderTime
    //     $emailCode = $con->query("SELECT user_EmailReminderTime FROM users WHERE user_ID = $cntID;");   
    //     $row = $emailCode->fetch_assoc();
    //     $emailDate = $row['user_EmailReminderTime'];

    //     $username = $con->query("SELECT user_Email FROM users WHERE user_ID = $cntID;");   
    //     $rowEmail = $username->fetch_assoc();
    //     $email = $rowEmail['user_EmailReminderTime'];

    //     if(checkSend($emailDate) == true) { 
    //         sendMail($email,createBody($email),$mail);
    //     }
    //     $cntID++;
    // }
    
    
    // try {
    //     $mail->addAddress($email);                              
    //     $mail->Body    = '<b>Hello World!</b>';

    //     $mail->send();
    //     echo 'Message has been sent';
    // }

    // catch (Exception $e) {
    // 	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	// }


    function checkSend($emailDate) {
        $dateToday = date("m-d-Y");
        $day = date('d');
        $month = date('m');
        $dateTodayNum = date('n'); //raw numeric month, no leading zeroes

        //first of the month, once a month
        if ($emailDate == 3 && $day == 1) { 
            return true; }
        //first and fourteenth, twice a month
        else if ($emailDate == 4 && ($day == 1 || $day == 14)){ 
            return true; }
        //if month is even, first day, once every two months
        else if ($emailDate == 5 && ($dateTodayNum % 2 == 0 && $day == 1)) { 
            return true; }
        //if month is jan or july, first day, once every six months
        else if ($emailDate == 6 && (($month == 1 || $month == 7) && $day == 1)) {
            return true; }
        //if month is january, first day, once a year
        else if ($emailDate == 7 && ($month == 1 && $day == 1)) {
            return true; }

        else { return false; }
    }

    function createBody($email) {

    }

    function sendMail($email,$body,$mail) {
        $mail->addAddress($email);  
        $mail->Subject = 'Sublogger Subscription Reminders';                            
        $mail->Body    = $body;
        $mail->AltBody = "Plain text ver of email content.";
        $mail->send();

        if(!$mail->send()) {
            echo "Message could not be sent. Mailer Error: $mail->ErrorInfo";
        } else {
            echo 'Message has been sent';
        }
    }
?>
