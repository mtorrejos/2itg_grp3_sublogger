<?php
	session_start();
	
	$DATABASE_HOST = 'localhost';
	$DATABASE_USER = 'root';
	$DATABASE_PASS = '';
	$DATABASE_NAME = 'sublogger';
	$e = 'mysqli_sql_exception';

	try { mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME); }
	catch(Exception $e) {
		$con = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS);
		$sql = "CREATE DATABASE sublogger";
		$con->query($sql);
	}



?>