<?php

	session_start();

	/* $link = msqli_connect("shareddb-u.hosting.stackcp.net", "turnip-313333c155", "1lh5op5uiq", "turnip-313333c155");

	if (mysqli_connect_errno()) {

		print_r(mysqli_connect_error());
		exit();
	}



 */

$link = mysqli_connect("localhost", "root", "", "turnip");

	if (mysqli_connect_errno()) {

		print_r(mysqli_connect_error());
		exit();
	}

	if ($_GET['function'] == "logout") {

		session_unset();
	}




?>

<!--
pass 1lh5op5uiq

server shareddb-u.hosting.stackcp.net

un turnip-313333c155
-->