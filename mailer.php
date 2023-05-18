<?php //Note: This will not work as of right now. I still need to add the account details, but adding them on git is too dangerous
    require_once "connection/connection.php";

    $con = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS,DATABASE_NAME);
    $nAccount = $con->query("SELECT * FROM users;");
    $dateToday = date("m-d-Y");

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require 'PHPMailer/src/Exception.php';
	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';

    $mail = new PHPMailer(true);
    $mail->Host       = '';                             //add when ready                           
    $mail->SMTPAuth   = true;                                      
    $mail->Username   = '';                             //add when ready
    $mail->Password   = '';                             //add when ready
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;                
    $mail->Port       = 256;                               //add when ready
    $mail->setFrom('reminder.sublogger@gmail.com', 'Sublogger Reminders');
    $mail->isHTML(true);
    $mail->Subject = 'Sublogger Subscription Reminders';

    if ($nAccount->num_rows > 0) {
        while($row = $nAccount->fetch_assoc()) {
            $email = $row['user_Email'];
            $username = $row['user_FirstName'];
            $emailDate = $row['user_EmailReminderTime'];

            //if(checkSend($emailDate)){ sendMail($email,createBody($email),$mail,$username); }
            sendMail($email,createBody($email),$mail,$username);
        }
    }

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
        $con = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS,DATABASE_NAME);
        $nSubs = $con->query("SELECT * FROM `$email`;");
        $subDetailsFull = '';
        if ($nSubs->num_rows > 0) {
            while($row = $nSubs->fetch_assoc()) {
                $subName = $row['sub_Name'];
                $subDueDate = $row['sub_EndDate'];

                $subDetails = '<tr>
                <td class="homepageValue" id="subAcctName" name="subAcctname">' .$subName. '</td>
                <td class="homepageValue" id="subEndDate" name="subEndDate">'.$subDueDate.'</td>
                </tr>';

                $subDetailsFull .= $subDetails;
            }
        }
        return $subDetailsFull;


    }

    function sendMail($email,$body,$mail,$username) {
        $emailTemplate = file_get_contents('updateDueDateMail.php');

        try {
            $mail->addAddress($email);

            if(empty($body)) { $email_body = str_replace('{SUBSCRIPTIONS}', 'No subscriptions found!',$emailTemplate); }
            else { $email_body = str_replace(['{SUBSCRIPTIONS}', '{NAME}'], [$body, $username],$emailTemplate); }

            $mail->Body    = $email_body;
            $mail->send();
        }

        catch (Exception $e) { echo "<br>Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; }
    }
?>
