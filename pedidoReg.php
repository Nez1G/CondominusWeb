<?php
    include('session.php');
    @include 'php/PHPMailerAutoload.php';
    @include 'php/functions.php';
    
    $motivo = $_POST["motivo"];
    $problemas = $_POST["problemas"];
    $email = $_POST["email"];
    
    $motivo = stripslashes($motivo);
    $motivo = mysqli_real_escape_string($connection, $motivo);

    $problemas = stripslashes($problemas);
    $problemas = mysqli_real_escape_string($connection, $problemas);
    
    $email = stripslashes($email);
    $email = mysqli_real_escape_string($connection, $email);
    
        
            $query_pedido = "INSERT INTO pedidos (titulo_pedido, descricao_pedido, mail_pedido) 
                VALUES ('$motivo', '$problemas', '$email')";
            
            
            $mail = new PHPMailer;
            $mail->isSMTP();                                      
            $mail->Host = 'smtp.gmail.com;smtp-relay.gmail.com';  
            $mail->SMTPAuth = true;                               
            $mail->Username = 'info.condominus@gmail.com';                 
            $mail->Password = 'arkham2016';                           
            $mail->SMTPSecure = 'tls';           
            $mail->Port = 587;
            $mail->CharSet = 'UTF-8';

            $mail->setFrom('info.condominus@gmail.com', 'Condominus SA');
            $mail->addAddress($email);
            $mail->addReplyTo('info.condominus@gmail.com', 'Information');

            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            $mail->isHTML(true);
            
            
            $mail->Subject = 'Novo Pedido';
            $mail->Body    = 'Foi feito um novo pedido de intervenção/comunicação com o seguinte motivo: ' . $motivo . ' e com a seguinte descrição : ' . $problemas;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';


            if ((mysqli_query($connection, $query_pedido)) && ($mail->send())) {
                echo    "<script type=\"text/javascript\">".
                            "alert('Pedido enviado com sucesso');"
                        .   "window.location = 'menu.php';".
                        "</script>";

            } 
            else {
                echo "<script type=\"text/javascript\">".
                            "alert('Erro ao enviar pedido!');"
                        .   "window.location = 'menu.php';".
                        "</script>";
           }
           $connection->close();
            
        
    