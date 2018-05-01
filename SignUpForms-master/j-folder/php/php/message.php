<?php
$letter = '
<html>
<head>
	<meta name="viewport" content="width=device-width">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<title>Just Forms - HTML Email Template</title>
</head>
<body bgcolor="#f6f6f6" style="width: 100% !important; height: 100%; font-family: Arial, sans-serif; font-size: 100%; line-height: 1.6; margin: 0; padding: 0;">
	<table style="width: 100%; padding: 20px;"><tr>
<td></td>
			<td bgcolor="#fff" style="display: block !important; max-width: 600px !important; clear: both !important; color: #8c949e; margin: 0 auto; padding: 20px; border: 1px solid #f0f0f0;">
				<div style="max-width: 600px; display: block; margin: 0 auto;">
					<table style="width: 100%;"><tr>
<td style="border-bottom-width: 1px; border-bottom-color: #f0f0f0; border-bottom-style: solid;">
								<h2 style="font-family: Arial, sans-serif; color: #63676d; line-height: 1.2; font-weight: 200; text-align: center; font-size: 28px; margin: 18px 0;" align="center">'.$your_subject.'</h2>
							</td>
						</tr></table>
</div>
				<div style="max-width: 600px; display: block; margin: 0 auto;">
					<table style="width: 100%;"><tr>
<td>
								<p style="margin-bottom: 10px; font-weight: normal; font-size: 14px;"><span style="font-weight: bold; color: #767b82;">Row ID in a database: </span>'.$row_id.'</p>
								<p style="margin-bottom: 10px; font-weight: normal; font-size: 14px;"><span style="font-weight: bold; color: #767b82;">First name: </span>'.$first_name.'</p>
								<p style="margin-bottom: 10px; font-weight: normal; font-size: 14px;"><span style="font-weight: bold; color: #767b82;">Last name: </span>'.$last_name.'</p>
								<p style="margin-bottom: 10px; font-weight: normal; font-size: 14px;"><span style="font-weight: bold; color: #767b82;">Email: </span>'.$email.'</p>
								<p style="margin-bottom: 10px; font-weight: normal; font-size: 14px;"><span style="font-weight: bold; color: #767b82;">Phone: </span>'.$phone.'</p>
								<p style="margin-bottom: 10px; font-weight: normal; font-size: 14px;"><span style="font-weight: bold; color: #767b82;">Country: </span>'.$country.'</p>
								<p style="margin-bottom: 10px; font-weight: normal; font-size: 14px;"><span style="font-weight: bold; color: #767b82;">City: </span>'.$city.'</p>
								<p style="margin-bottom: 10px; font-weight: normal; font-size: 14px;"><span style="font-weight: bold; color: #767b82;">Post code: </span>'.$post.'</p>
								<p style="margin-bottom: 10px; font-weight: normal; font-size: 14px;"><span style="font-weight: bold; color: #767b82;">Address: </span>'.$address.'</p>
								<p style="margin-bottom: 10px; font-weight: normal; font-size: 14px;"><span style="font-weight: bold; color: #767b82;">Info: </span>'.$message.'</p>
								<p style="margin-bottom: 10px; font-weight: normal; font-size: 14px;"><span style="font-weight: bold; color: #767b82;">Payment: </span>'.$payment.'</p>
								<p style="margin-bottom: 10px; font-weight: normal; font-size: 14px;"><span style="font-weight: bold; color: #767b82;">Card name: </span>'.$card_name.'</p>
								<p style="margin-bottom: 10px; font-weight: normal; font-size: 14px;"><span style="font-weight: bold; color: #767b82;">Card number: </span>'.$card_number.'</p>
								<p style="margin-bottom: 10px; font-weight: normal; font-size: 14px;"><span style="font-weight: bold; color: #767b82;">CVV2: </span>'.$cvv2.'</p>
								<p style="margin-bottom: 10px; font-weight: normal; font-size: 14px;"><span style="font-weight: bold; color: #767b82;">Expiry month: </span>'.$card_month.'</p>
								<p style="margin-bottom: 10px; font-weight: normal; font-size: 14px;"><span style="font-weight: bold; color: #767b82;">Expiry year: </span>'.$card_year.'</p>
							</td>
						</tr></table>
</div>
			</td>
			<td></td>
		</tr></table>
<table style="width: 100%; clear: both !important;"><tr>
<td></td>
			<td style="display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;">
				<div style="max-width: 600px; display: block; margin: 0 auto;">
					<table style="width: 100%;"><tr>
<td align="center">
								<p style="font-size: 12px; color: #666; margin-bottom: 10px; font-weight: normal;">Developed by: <a target="_blank" href="http://lazy-coding.com/j-forms-full/" style="color: #999; font-size: 14px;">Just Forms</a>
								</p>
							</td>
						</tr></table>
</div>
			</td>
			<td></td>
		</tr></table>
</body>
</html>';
?>