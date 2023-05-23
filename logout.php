<?php
	session_start();
	if(isset($_GET['email'])) {
		$sourceEmail = $_GET['email'];
		if($_GET['redirect']=='editProfile') {
			header("Location: indexAndLogin.php?redirect=editProfile");
		} elseif($_GET['redirect']=='editProfile') {
			header("Location: indexAndLogin.php?redirect=survey");
		}
	} else {
		header("Location: indexAndLogin.php");
	}
	session_destroy();
?>