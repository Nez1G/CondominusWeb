<?php
	include('session.php');
	require 'php/PHPMailerAutoload.php';
	include 'php/functions.php';
	
	$mail = new PHPMailer;

	//$mail->SMTPDebug = 3;                               // Enable verbose debug output

	$mail->isSMTP();                                      // Set mailer to use SMTP
	$mail->Host = 'smtp.gmail.com;smtp-relay.gmail.com';  // Specify main and backup SMTP servers
	$mail->SMTPAuth = true;                               // Enable SMTP authentication
	$mail->Username = 'info.condominus@gmail.com';                 // SMTP username
	$mail->Password = 'arkham2016';                           // SMTP password
	$mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, `ssl` also accepted
	$mail->Port = 465;                                    // TCP port to connect to

	$mail->setFrom('info.condominus@gmail.com', 'Condominus SA');
	$mail->addAddress('pedrofilipe_17@hotmail', 'Pedro Palha');     // Add a recipient
	//$mail->addAddress('pedrofilipe_17@hotmail.com', 'Pedro Palha');               // Name is optional
	$mail->addReplyTo('info.condominus@gmail.com', 'Information');
	//$mail->addCC('cc@example.com');
	//$mail->addBCC('bcc@example.com');

	//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
	//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
	$mail->isHTML(true);                                  // Set email format to HTML

	$mail->Subject = 'Novo Registo';
	$mail->Body    = 'This is the HTML message body <b>in bold!</b> and your password is:' . $mailpw;
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		if ($mail->send()) {
			echo    "<script type=\"text/javascript\">".
						"alert('Enviado com sucesso');"
					.   "window.location = 'menu.php';".
					"</script>";

		}
		
		else{
			echo 'ERROR';
		}
		$connection->close();


?>