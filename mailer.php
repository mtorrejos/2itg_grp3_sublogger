<?php //Note: This will not work as of right now. I still need to add the account details, but adding them on git is too dangerous
    require_once "connection/connection.php";

    $conDatabase = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS,DATABASE_NAME);
    $nAccount = $conDatabase->query("SELECT MAX(user_ID) AS max_ID FROM users;");
    $row = $nAccount->fetch_assoc();
    $maxID = $row['max_ID'];

    $fromMail = $conDatabase->query()
    

    $dateToday = date("m-d-Y");

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require 'PHPMailer/src/Exception.php';
	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';

/*
    $mail = new PHPMailer(true);
    $mail->isSMTP(); 
    $mail->Host       = '';                           
    $mail->SMTPAuth   = true;                                      
    $mail->Username   = '';            
    $mail->Password   = '';                         
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;                
    $mail->Port       = ;      
    $mail->setFrom('reminder.sublogger@gmail.com', 'Sublogger Reminders');                                 

	
    $count = 0;

	try {
	$mail->isSMTP(); 
	$mail->Host       = '';                           //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                       //Enable SMTP authentication
    $mail->Username   = '';             //SMTP username
    $mail->Password   = '';                         //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            	//Enable implicit TLS encryption
    $mail->Port       = ;                                    	//TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    $mail->setFrom('sublogger@gmail.com', 'Sublogger Reminders');
    $mail->addAddress($_SESSION['email']);

    $mail->isHTML(true);                                  
    $mail->Subject = 'Test Email - Sublogger';
    $mail->Body    = '<b>Hello World!</b>';
    $mail->AltBody = 'Hello World, but not bold.';

    $mail->send();
    echo 'Message has been sent'; }

    catch (Exception $e) {
    	echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
	}
*/
?>
