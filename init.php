<?php
//database creation
	try { mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME); }
	catch(Exception $e) { 
		$con = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS);
		$sql = "CREATE DATABASE IF NOT EXISTS sublogger";
		$con->query($sql);
	}
//database creation

	$con = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS,$DATABASE_NAME);

//table creation
	
	//users table
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
	//users table

	//user subscriptions table

	$sql = ' CREATE TABLE IF NOT EXISTS `user_subscriptions`(
	`sub_ID` INT(11) NOT NULL AUTO_INCREMENT,
	`sub_Name` VARCHAR(50) NOT NULL,
	`sub_AcctName` VARCHAR(50),
	`sub_Username` VARCHAR(50),
	`sub_Email` VARCHAR(100),
	`sub_CardName` VARCHAR(100),
	`sub_CardNo` INT(20),
	`sub_Type` VARCHAR(20) NOT NULL,
	`sub_StartDate` DATE NOT NULL,
	`sub_EndDate` DATE NOT NULL,
	`sub_LastUsed` DATE NOT NULL,
	PRIMARY KEY(`sub_ID`)
	) ENGINE = InnoDB AUTO_INCREMENT = 2 DEFAULT CHARSET = utf8;';
	$con->query($sql);
	//user subscriptions table

//table creation

//test info
	//this WILL keep adding to the table if you keep running this file
	$sql =' INSERT INTO `users`(`user_ID`,`user_FirstName`,`user_LastName`,`user_Email`,`user_Password`,`user_EmailReminderTime`,`user_EmailSurveyTime`) VALUES ("", "test","name","test@test.com","password_unencrypt",20,30)';
	$con->query($sql);
//test info

?>