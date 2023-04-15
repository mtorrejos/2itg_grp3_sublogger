<?php
//database creation
	try { mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME); }
	catch(Exception $e) { 
		$con = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS);
		$sql = "CREATE DATABASE IF NOT EXISTS sublogger";
		$con->query($sql);
	}
//database creation
	
//table creation
	$con = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS,$DATABASE_NAME);
	$sql = ' CREATE TABLE IF NOT EXISTS `users`(
    `user_ID` INT(11) NOT NULL AUTO_INCREMENT,
    `user_FirstName` VARCHAR(50) NOT NULL,
    `user_LastName` VARCHAR(50) NOT NULL,
    `user_Email` VARCHAR(100) NOT NULL,
    `user_Password` VARCHAR(255) NOT NULL,
    `user_EmailReminderTime` INT(12) NOT NULL,
    `user_EmailSurveyTime` INT(12) NOT NULL,
    PRIMARY KEY(`user_ID`)
	) ENGINE = InnoDB AUTO_INCREMENT = 2 DEFAULT CHARSET = utf8;';
	$con->query($sql);
//table creation

//test info
	$sql =' INSERT INTO `users`(`user_ID`,`user_FirstName`,`user_LastName`,`user_Email`,`user_Password`,`user_EmailReminderTime`,`user_EmailSurveyTime`) VALUES (1, "test","name","test@test.com","password_unencrypt",20,30)';
	$con->query($sql);
//test info

?>