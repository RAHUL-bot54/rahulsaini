	<?php
	if(isset($_POST['submit'])) {
		//retrieve form data
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];

		//send email using SMTP server
		require_once "PHPMailer/PHPMailer.php";
		require_once "PHPMailer/SMTP.php";
		require_once "PHPMailer/Exception.php";

		$mail = new PHPMailer\PHPMailer\PHPMailer();
		$mail->isSMTP();
		$mail->Host = 'smtp.rahulsaini.tech';
		$mail->SMTPAuth = true;
		$mail->Username = 'jai@rahulsaini.tech';
		$mail->Password = 'jDawa%A1';
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;

		$mail->setFrom('jai@rahulsaini.tech', 'Rahul');
		$mail->addAddress($email);
		$mail->isHTML(true);

		$mail->Subject = 'Registration Confirmation';
		$mail->Body = "Dear $name,<br><br>Your registration is confirmed. Thank you for signing up.<br><br>Best regards,<br>Your Name";

		if(!$mail->send()) {
			echo "Error: " . $mail->ErrorInfo;
		} else {
			echo "<p>Registration confirmation email sent to $email.</p>";
		}
	}
	?>
