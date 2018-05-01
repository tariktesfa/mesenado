<?php

	/* Duplicate information to DB */
	function queryPdo($mysql_table, $first_name, $last_name, $email, $phone, $country, $city,
									$post, $address, $message, $payment, $card_name, $card_number, $cvv2, $card_month, $card_year) {

		/* Variables */
		$error_exists = false;
		$error_pdo = "";

		try {
			/* Connection to DB */
			/* Constants, that defined in action.php, are used */
			$pdo = new PDO("mysql:host=".CHECK_SERVER.";dbname=".CHECK_DATABASE."", CHECK_USER, CHECK_PASSWORD,
							array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
			$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			/* Query to DB */
			/* Add data to DB */
			$smt = $pdo->prepare("INSERT INTO ".$mysql_table." (".$mysql_table."_firstname,
																".$mysql_table."_lastname,
																".$mysql_table."_email,
																".$mysql_table."_phone,
																".$mysql_table."_country,
																".$mysql_table."_city,
																".$mysql_table."_postcode,
																".$mysql_table."_address,
																".$mysql_table."_info,
																".$mysql_table."_payment,
																".$mysql_table."_cardname,
																".$mysql_table."_cardnumber,
																".$mysql_table."_cvv2,
																".$mysql_table."_cardmonth,
																".$mysql_table."_cardyear)
														VALUES (:firstname,
																:lastname,
																:email,
																:phone,
																:country,
																:city,
																:postcode,
																:address,
																:info,
																:payment,
																:cardname,
																:cardnumber,
																:cvv2,
																:cardmonth,
																:cardyear)");

			$smt -> bindParam(":firstname", $first_name, PDO::PARAM_STR);
			$smt -> bindParam(":lastname", $last_name, PDO::PARAM_STR);
			$smt -> bindParam(":email", $email, PDO::PARAM_STR);
			$smt -> bindParam(":phone", $phone, PDO::PARAM_STR);
			$smt -> bindParam(":country", $country, PDO::PARAM_STR);
			$smt -> bindParam(":city", $city, PDO::PARAM_STR);
			$smt -> bindParam(":postcode", $post, PDO::PARAM_INT);
			$smt -> bindParam(":address", $address, PDO::PARAM_STR);
			$smt -> bindParam(":info", $message, PDO::PARAM_STR);
			$smt -> bindParam(":payment", $payment, PDO::PARAM_STR);
			$smt -> bindParam(":cardname", $card_name, PDO::PARAM_STR);
			$smt -> bindParam(":cardnumber", $card_number, PDO::PARAM_STR);
			$smt -> bindParam(":cvv2", $cvv2, PDO::PARAM_INT);
			$smt -> bindParam(":cardmonth", $card_month, PDO::PARAM_STR);
			$smt -> bindParam(":cardyear", $card_year, PDO::PARAM_STR);
			$smt -> execute();

			/* Get a last row ID to send in message */
			$row_id = $pdo->lastInsertId();

			/* Close connection */
			$pdo = null;

			/* If error occurs */
			} catch (PDOException $e) {
				$error_exists = true;
				$error_pdo =  "Database error: " . $e->getMessage();
			}

		/* Return result */
		return $error_exists ? $error_pdo : $row_id;
	}
?>