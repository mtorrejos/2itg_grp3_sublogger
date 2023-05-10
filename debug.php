<?php
	//delete entire sublogger database, not meant to be run unless debugging
	$DATABASE_HOST = 'localhost';
    $DATABASE_USER = 'root';
    $DATABASE_PASS = '';
    $DATABASE_NAME = 'sublogger';

    $con = new mysqli($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS,$DATABASE_NAME);
    $sql = 'DELETE DATABASE sublogger';
    $con->query($sql);

?>