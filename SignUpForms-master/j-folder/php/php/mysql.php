<?php

	/* Duplicate information to DB */
	function queryMysqli($mysql_table, $first_name, $last_name, $email, $phone, $country, $city,
									$post, $address, $message, $payment, $card_name, $card_number, $cvv2, $card_month, $card_year) {

		/* Variables */
		$error_exists = false;
		$error_mysql = "";

		/* Connection to DB */
		/* Constants, that defined in action.php, are used */
		$link = mysqli_connect(CHECK_SERVER, CHECK_USER, CHECK_PASSWORD, CHECK_DATABASE);
		if (mysqli_connect_error()) {
			$error_mysql = ("Error connecting to database (" . mysqli_connect_errno() . ") ". mysqli_connect_error());
			return $error_mysql;
		}
		mysqli_set_charset($link, 'utf8');

		/* Query to DB */
		/* Add data to DB */
		$result = mysqli_query($link, "INSERT INTO ".$mysql_table."(`".$mysql_table."_id`,
																	`".$mysql_table."_firstname`,
																	`".$mysql_table."_lastname`,
																	`".$mysql_table."_email`,
																	`".$mysql_table."_phone`,
																	`".$mysql_table."_country`,
																	`".$mysql_table."_city`,
																	`".$mysql_table."_postcode`,
																	`".$mysql_table."_address`,
																	`".$mysql_table."_info`,
																	`".$mysql_table."_payment`,
																	`".$mysql_table."_cardname`,
																	`".$mysql_table."_cardnumber`,
																	`".$mysql_table."_cvv2`,
																	`".$mysql_table."_cardmonth`,
																	`".$mysql_table."_cardyear`)
														VALUES (NULL,	'".mysqli_real_escape_string($link, $first_name)."',
																		'".mysqli_real_escape_string($link, $last_name)."',
																		'".mysqli_real_escape_string($link, $email)."',
																		'".mysqli_real_escape_string($link, $phone)."',
																		'".mysqli_real_escape_string($link, $country)."',
																		'".mysqli_real_escape_string($link, $city)."',
																		'".mysqli_real_escape_string($link, $post)."',
																		'".mysqli_real_escape_string($link, $address)."',
																		'".mysqli_real_escape_string($link, $message)."',
																		'".mysqli_real_escape_string($link, $payment)."',
																		'".mysqli_real_escape_string($link, $card_name)."',
																		'".mysqli_real_escape_string($link, $card_number)."',
																		'".mysqli_real_escape_string($link, $cvv2)."',
																		'".mysqli_real_escape_string($link, $card_month)."',
																		'".mysqli_real_escape_string($link, $card_year)."')");

		/* Get a last row ID to send in message */
		$row_id = mysqli_insert_id($link);

		/* If error occurs */
		if (!$result){
			$error_exists = true;
			$error_mysql = "Error database query: ".mysqli_error($link);
		}

		/* Return result */
		mysqli_close($link);
		return $error_exists ? $error_mysql : $row_id;
	}
?>