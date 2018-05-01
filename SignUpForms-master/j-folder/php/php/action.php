<?php
	header("Content-Type: text/html; charset=utf-8");

	if (!$_POST) exit;

	require dirname(__FILE__)."/validation.php";
	require dirname(__FILE__)."/csrf.php";

/************************************************/
/* Your data */
/************************************************/
	/* Your email goes here */
	$your_email = "your_email@domain.com";

	/* Your name or your company name goes here */
	$your_name = "Your name";

	/* Message subject */
	$your_subject = "J-forms: Checkout form";

	/* Define your data to access MySQL database */
	define("CHECK_USER", "username");					// your username
	define("CHECK_SERVER", "host");						// your host
	define("CHECK_PASSWORD", "password");				// your password
	define("CHECK_DATABASE", "database");				// your database

	/* Your database table goes here */
	$mysql_table = "checkout";

/************************************************/
/* Settings */
/************************************************/
	/* Select validation for fields */
	/* If you want to validate field - true, if you don't - false */
	$validate_first_name	= true;
	$validate_last_name		= true;
	$validate_email			= true;
	$validate_phone			= true;
	$validate_country		= true;
	$validate_city			= true;
	$validate_post_code		= true;
	$validate_address		= true;
	$validate_message		= true;
	$validate_card_name		= true;
	$validate_card_number	= true;
	$validate_cvv2			= true;
	$validate_card_month	= true;
	$validate_card_year		= true;

	/* Select the action */
	/* If you want to do the action - true, if you don't - false */
	$send_letter 			= true;
	$duplicate_to_database	= true;

/************************************************/
/* Variables */
/************************************************/
	/* Error variables */
	$error_text		= array();
	$error_message	= '';

	/* Last row ID */
	/* In case, if data will not be duplicated to a database */
	$row_id = "No data in a database";

	/* POST data */
	$first_name  = (isset($_POST["first_name"]))	 ? strip_tags(trim($_POST["first_name"])) 		: false;
	$last_name	 = (isset($_POST["last_name"]))		 ? strip_tags(trim($_POST["last_name"]))		: false;
	$email		 = (isset($_POST["email"]))			 ? strip_tags(trim($_POST["email"]))			: false;
	$phone		 = (isset($_POST["phone"]))			 ? strip_tags(trim($_POST["phone"]))			: false;
	$country	 = (isset($_POST["country"]))		 ? strip_tags(trim($_POST["country"]))			: false;
	$city		 = (isset($_POST["city"]))			 ? strip_tags(trim($_POST["city"]))				: false;
	$post		 = (isset($_POST["post"]))			 ? strip_tags(trim($_POST["post"]))				: false;
	$address	 = (isset($_POST["address"]))		 ? strip_tags(trim($_POST["address"]))			: false;
	$message	 = (isset($_POST["message"]))		 ? strip_tags(trim($_POST["message"]))			: false;
	$payment	 = (isset($_POST["payment"]))		 ? strip_tags(trim($_POST["payment"]))			: false;
	$card_name	 = (isset($_POST["card_name"]))		 ? strip_tags(trim($_POST["card_name"]))		: false;
	$card_number = (isset($_POST["card_number"]))	 ? strip_tags(trim($_POST["card_number"]))		: false;
	$cvv2		 = (isset($_POST["cvv2"]))			 ? strip_tags(trim($_POST["cvv2"]))				: false;
	$card_month	 = (isset($_POST["card_month"]))	 ? strip_tags(trim($_POST["card_month"]))		: false;
	$card_year	 = (isset($_POST["card_year"]))		 ? strip_tags(trim($_POST["card_year"]))		: false;
	$token 		 = (isset($_POST["token_checkout"])) ? strip_tags(trim($_POST["token_checkout"]))	: false;

	$first_name  = htmlspecialchars($first_name, ENT_QUOTES, 'UTF-8');
	$last_name	 = htmlspecialchars($last_name, ENT_QUOTES, 'UTF-8');
	$email		 = htmlspecialchars($email, ENT_QUOTES, 'UTF-8');
	$phone		 = htmlspecialchars($phone, ENT_QUOTES, 'UTF-8');
	$country	 = htmlspecialchars($country, ENT_QUOTES, 'UTF-8');
	$city		 = htmlspecialchars($city, ENT_QUOTES, 'UTF-8');
	$address	 = htmlspecialchars($address, ENT_QUOTES, 'UTF-8');
	$post		 = htmlspecialchars($post, ENT_QUOTES, 'UTF-8');
	$message	 = htmlspecialchars($message, ENT_QUOTES, 'UTF-8');
	$payment	 = htmlspecialchars($payment, ENT_QUOTES, 'UTF-8');
	$card_name	 = htmlspecialchars($card_name, ENT_QUOTES, 'UTF-8');
	$card_number = htmlspecialchars($card_number, ENT_QUOTES, 'UTF-8');
	$cvv2		 = htmlspecialchars($cvv2, ENT_QUOTES, 'UTF-8');
	$card_month	 = htmlspecialchars($card_month, ENT_QUOTES, 'UTF-8');
	$card_year	 = htmlspecialchars($card_year, ENT_QUOTES, 'UTF-8');
	$token 		 = htmlspecialchars($token, ENT_QUOTES, 'UTF-8');

	$first_name  = substr($first_name, 0, 20);
	$last_name	 = substr($last_name, 0, 20);
	$email		 = substr($email, 0, 30);
	$phone		 = substr($phone, 0, 20);
	$country	 = substr($country, 0, 70);
	$city		 = substr($city, 0, 30);
	$address	 = substr($address, 0, 60);
	$post		 = substr($post, 0, 10);
	$message	 = substr($message, 0, 1500);
	$card_name	 = substr($card_name, 0, 40);
	$card_number = substr($card_number, 0, 25);
	$cvv2		 = substr($cvv2, 0, 5);
	$payment	 = substr($payment, 0, 30);
	$card_month	 = substr($card_month, 0, 20);
	$card_year	 = substr($card_year, 0, 8);

/************************************************/
/* CSRF protection */
/************************************************/
	$new_token = new CSRF('checkout');
	if (!$new_token->check_token($token)) {
		echo '<div class="error-message unit"><i class="fa fa-close"></i>Incorrect token. Please reload this webpage</div>';
		exit;
	}

/************************************************/
/* Validation */
/************************************************/
	/* First name */
	if ($validate_first_name){
		$result = validateFirstName($first_name, 1);
		if ($result !== "valid") {
			$error_text[] = $result;
		}
	}

	/* Last name */
	if ($validate_last_name){
		$result = validateLastName($last_name, 1);
		if ($result !== "valid") {
			$error_text[] = $result;
		}
	}

	/* Email */
	if ($validate_email){
		$result = validateEmail($email);
		if ($result !== "valid") {
			$error_text[] = $result;
		}
	}

	/* Phone */
	if ($validate_phone){
		$result = validatePhone($phone);
		if ($result !== "valid") {
			$error_text[] = $result;
		}
	}

	/* Country */
	if ($validate_country){
		$result = validateCountry($country);
		if ($result !== "valid") {
			$error_text[] = $result;
		}
	}

	/* City */
	if ($validate_city){
		$result = validateCity($city, 1);
		if ($result !== "valid") {
			$error_text[] = $result;
		}
	}

	/* Post code */
	if ($validate_post_code){
		$result = validatePostCode($post);
		if ($result !== "valid") {
			$error_text[] = $result;
		}
	}

	/* Address */
	if ($validate_address){
		$result = validateAddress($address, 1);
		if ($result !== "valid") {
			$error_text[] = $result;
		}
	}

	/* Info */
	if ($validate_message){
		$result = validateMessage($message, 20);
		if ($result !== "valid") {
			$error_text[] = $result;
		}
	}

	/* Card name */
	if ($validate_card_name){
		$result = validateCardName($card_name, 1);
		if ($result !== "valid") {
			$error_text[] = $result;
		}
	}

	/* Card number */
	if ($validate_card_number){
		$result = validateCardnumber($card_number);
		if ($result !== "valid") {
			$error_text[] = $result;
		}
	}

	/* CVV2 */
	if ($validate_cvv2){
		$result = validateCvv2($cvv2);
		if ($result !== "valid") {
			$error_text[] = $result;
		}
	}

	/* Month */
	if ($validate_card_month){
		$result = validateCardMonth($card_month);
		if ($result !== "valid") {
			$error_text[] = $result;
		}
	}

	/* Year */
	if ($validate_card_year){
		$result = validateCardYear($card_year);
		if ($result !== "valid") {
			$error_text[] = $result;
		}
	}

	/* If validation error occurs */
	if ($error_text) {
		foreach ($error_text as $val) {
			$error_message .= '<li>' . $val . '</li>';
		}
		echo '<div class="error-message unit"><i class="fa fa-close"></i>Oops! The following errors occurred:<ul>' . $error_message . '</ul></div>';
		exit;
	}

/************************************************/
/* Duplicate info to a database */
/************************************************/
	if ($duplicate_to_database) {

		/* Select type of connection to a database */
		/* If you want to use connection - true, if you don't - false */
		/* For proper work you have to select only one type of connection */

		/* Mysqli connection to DB */
		$mysqli_connect = true;
		if ($mysqli_connect) {
			require dirname(__FILE__)."/mysql.php";
			$row_id = queryMysqli($mysql_table, $first_name, $last_name, $email, $phone, $country, $city,
									$post, $address, $message, $payment, $card_name, $card_number, $cvv2, $card_month, $card_year);
		}
		/* PDO connection to DB */
		$pdo_connect = false;
		if ($pdo_connect) {
			require dirname(__FILE__)."/pdo.php";
			$row_id = queryPdo($mysql_table, $first_name, $last_name, $email, $phone, $country, $city,
									$post, $address, $message, $payment, $card_name, $card_number, $cvv2, $card_month, $card_year);
		}
	}

/************************************************/
/* Sending email */
/************************************************/
	if ($send_letter) {

		/* Send email using sendmail function */
		/* If you want to use sendmail - true, if you don't - false */
		/* If you will use sendmail function - do not forget to set '$smtp' variable to 'false' */
		$sendmail = true;
		if ($sendmail) {
			require dirname(__FILE__)."/phpmailer/PHPMailerAutoload.php";
			require dirname(__FILE__)."/message.php";
			$mail = new PHPMailer;
			$mail->isSendmail();
			$mail->IsHTML(true);
			$mail->From = $email;
			$mail->CharSet = "UTF-8";
			$mail->FromName = "J-forms";
			$mail->Encoding = "base64";
			$mail->ContentType = "text/html";
			$mail->addAddress($your_email, $your_name);
			$mail->Subject = $your_subject;
			$mail->Body = $letter;
			$mail->AltBody = "Use an HTML compatible email client";
		}

		/* Send email using smtp function */
		/* If you want to use smtp - true, if you don't - false */
		/* If you will use smtp function - do not forget to set '$sendmail' variable to 'false' */
		$smtp = false;
		if ($smtp) {
			require dirname(__FILE__)."/phpmailer/PHPMailerAutoload.php";
			require dirname(__FILE__)."/message.php";
			$mail = new PHPMailer;
			$mail->isSMTP();											// Set mailer to use SMTP
			$mail->Host = "smtp1.example.com;smtp2.example.com";		// Specify main and backup server
			$mail->SMTPAuth = true;										// Enable SMTP authentication
			$mail->Username = "your-username";							// SMTP username
			$mail->Password = "your-password";							// SMTP password
			$mail->SMTPSecure = "tls";									// Enable encryption, 'ssl' also accepted
			$mail->Port = 465;											// SMTP Port number e.g. smtp.gmail.com uses port 465
			$mail->IsHTML(true);
			$mail->From = $email;
			$mail->CharSet = "UTF-8";
			$mail->FromName = "J-forms";
			$mail->Encoding = "base64";
			$mail->Timeout = 200;
			$mail->SMTPDebug = 0;
			$mail->ContentType = "text/html";
			$mail->addAddress($your_email, $your_name);
			$mail->Subject = $your_subject;
			$mail->Body = $letter;
			$mail->AltBody = "Use an HTML compatible email client";
		}

		/* Multiple email recepients */
		/* If you want to add multiple email recepients - true, if you don't - false */
		/* Enter email and name of the recipients */
		$recipients = false;
		if ($recipients) {
			$recipients = array("email@domain.com" => "name of recipient",
								"email@domain.com" => "name of recipient",
								"email@domain.com" => "name of recipient"
								);
			foreach ($recipients as $email => $name) {
				$mail->AddBCC($email, $name);
			}
		}

		/* if error occurs while email sending */
		if(!$mail->send()) {
			echo '<div class="error-message unit"><i class="fa fa-close"></i>Mailer Error: ' . $mail->ErrorInfo . '</div>';
			exit;
		}
	}

/************************************************/
/* Success message */
/************************************************/
	echo '<div class="success-message unit"><i class="fa fa-check"></i>Your information has been sent successfully</div>';
?>