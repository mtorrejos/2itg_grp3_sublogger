<?php
	session_start();
	require_once "connection/connection.php";
    $con = connection();

	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
	require 'PHPMailer/src/Exception.php';
	require 'PHPMailer/src/PHPMailer.php';
	require 'PHPMailer/src/SMTP.php';

	$mail = new PHPMailer(true);

	try {
	$mail->isSMTP(); 
	$mail->Host       = 'smtp.gmail.com';                           //Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                       //Enable SMTP authentication
    $mail->Username   = 'reminder.sublogger@gmail.com';             //SMTP username
    $mail->Password   = 'vnmvnjtmrcilqrmh';                         //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            	//Enable implicit TLS encryption
    $mail->Port       = 465;                                    	//TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

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

?>