<?php //not meant to be run normally, just for debugging. delete this file when submitting final output
	session_start();

	define('DATABASE_HOST', 'localhost');
    define('DATABASE_USER', 'root');
    define('DATABASE_PASS', '');
    define('DATABASE_NAME','sublogger');
    
	try {
		$con = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS,DATABASE_NAME);
	    $sql = "DROP DATABASE sublogger;";
	    $con->query($sql);
	    session_destroy();
	    echo "<script>alert('deleted database');</script>";
    }

    catch(Exception $e) {
    	echo "what did you do?";
    }

?>
