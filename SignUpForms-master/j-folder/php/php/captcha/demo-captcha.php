<?php

	if (!isset($_SESSION)) session_start();

	// If captcha is correct
	if ($_GET['captcha_code'] == $_SESSION['code']) {
		echo 'true';
	} else {
		echo 'false';
	}