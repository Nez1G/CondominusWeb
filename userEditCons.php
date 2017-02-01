<?php
    include('session.php'); 
    require 'php/PHPMailerAutoload.php';
    include 'php/functions.php';
    $idcookie = $_COOKIE["idcons"];
    
    $mailnome = $_POST["nome"];
    $mailmail = $_POST["userEmail"];
    
    $mail = new PHPMailer;

    //$mail->SMTPDebug = 3;                               // Enable verbose debug output

    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com;smtp-relay.gmail.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'info.condominus@gmail.com';                 // SMTP username
    $mail->Password = 'arkham2016';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                    // TCP port to connect to
    $mail->CharSet = 'UTF-8';
    $mail->setFrom('info.condominus@gmail.com', 'Condominus SA');
    $mail->addAddress($mailmail, $mailnome);     // Add a recipient
    //$mail->addAddress('pedrofilipe_17@hotmail.com', 'Pedro Palha');               // Name is optional
    $mail->addReplyTo('info.condominus@gmail.com', 'Information');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');

    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Informações Alteradas';
    $mail->Body    = 'Foram alteradas as suas informações, caso não tenha pedido essa informação informe-nos';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
               
   $query= "UPDATE users
             SET user_nicename='" . $_POST["nome"] . "', user_mail='" . $_POST["userEmail"] . "', user_adress='" . $_POST["morada"] . "', user_phone='" . $_POST["phone"] . "' WHERE id_user='" . $idcookie . "'";

   
     if ((mysqli_query($connection, $query)) && ($mail->send())) {
         echo    "<script type=\"text/javascript\">".
                     "alert('Atualização feita com sucesso');"
                 .   "window.location = 'menu.php';".
                 "</script>";

     } 
     else {
         echo "<script type=\"text/javascript\">".
                     "alert('Erro');".
					 "window.location = 'menu.php';".
                 "</script>";
         echo "Error: " . $query . "<br>" . mysqli_error($connection);
    }
    $connection->close();
    

?>