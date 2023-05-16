<?php //not meant to be run normally, just for debugging. delete this file when submitting final output
	session_start();
	require_once "connection/connection.php";
	$con = connection();
    $email = $_SESSION['email'];
    $subName = "Youtube";
	try {
		$con = new mysqli(DATABASE_HOST, DATABASE_USER, DATABASE_PASS,DATABASE_NAME);
	    //$sql = "DROP DATABASE sublogger;";
	    //$con->query($sql);
	    //session_destroy();
	    //echo "<script>alert('deleted database');</script>";
		$subCardNumber = getAccountDetail($email,$subName,'sub_CardNo');
		if($subCardNumber==0 || $subCardNumber=="") {
			echo 'it is 0 or null';
		}
    }

    catch(Exception $e) {
    	echo $e;
    }

?>
