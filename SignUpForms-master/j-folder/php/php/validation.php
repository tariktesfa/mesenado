<?php

/******************************************************/
/* Validation methods */
/******************************************************/
	/* First name */
	function validateFirstName($first_name, $min_length) {
		$error_text = "Enter your first name";
		$len = mb_strlen($first_name, 'UTF-8');
		return ($len < $min_length) ? $error_text : "valid";
	}

	/* Last name */
	function validateLastName($last_name, $min_length) {
		$error_text = "Enter your last name";
		$len = mb_strlen($last_name, 'UTF-8');
		return ($len < $min_length) ? $error_text : "valid";
	}

	/* Email */
	function validateEmail($email){
		$error_text = "Incorrect email format";
		$email_template = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/";
		return (preg_match($email_template, $email) !== 1) ? $error_text : "valid";
	}

	/* Phone */
	function validatePhone($phone) {
		$error_text = "Phone format: (xxx) xxx-xxxx";
		$phone_template = "/^\([0-9]{3}\) [0-9]{3}-[0-9]{4}$/";
		return (preg_match($phone_template, $phone) !== 1) ? $error_text : "valid";
	}

	/* Country */
	function validateCountry($country) {
		$error_text = "Select your country";
		return ($country == "") ? $error_text : "valid";
	}

	/* City */
	function validateCity($city, $min_length) {
		$error_text = "Enter your city";
		$len = mb_strlen($city, 'UTF-8');
		return ($len < $min_length) ? $error_text : "valid";
	}

	/* Post code */
	function validatePostCode($post){
		$error_text = "Enter your post code";
		$item_template = "/^[0-9]{3}-[0-9]{4}+$/";
		return (preg_match($item_template, $post) !== 1) ? $error_text : "valid";
	}

	/* Adrress */
	function validateAddress($address, $min_length) {
		$error_text = "Enter your address";
		$len = mb_strlen($address, 'UTF-8');
		return ($len < $min_length) ? $error_text : "valid";
	}

	/* Message */
	function validateMessage($message, $min_length) {
		$error_text = "The message is too short - min " . $min_length . " characters";
		$len = mb_strlen($message, 'UTF-8');
		return ($len < $min_length) ? $error_text : "valid";
	}

	/* Card name */
	function validateCardName($card_name, $min_length) {
		$error_text = "Enter name on your card";
		$len = mb_strlen($card_name, 'UTF-8');
		return ($len < $min_length) ? $error_text : "valid";
	}

	/* Card number*/
	function validateCardNumber($card_number) {
		$error_text = "Credit card format: xxxx-xxxx-xxxx-xxxx";
		$card_template = "/^[0-9]{4}-[0-9]{4}-[0-9]{4}-[0-9]{4}$/";
		return (preg_match($card_template, $card_number) !== 1) ? $error_text : "valid";
	}

	/* CVV2 */
	function validateCvv2($cvv2) {
		$error_text = "CVV code format: xxx";
		$card_template = "/^[0-9]{3}$/";
		return (preg_match($card_template, $cvv2) !== 1) ? $error_text : "valid";
	}

	/* Month */
	function validateCardMonth($card_month) {
		$error_text = "Select a month";
		return ($card_month == "") ? $error_text : "valid";
	}

	/* Year */
	function validateCardYear($card_year) {
		$error_text = "Select a year";
		return ($card_year == "") ? $error_text : "valid";
	}
?>