<?php
    include('session.php');
    include 'php/PHPMailerAutoload.php';
    include 'php/functions.php';
    
    $allcondos = 'all';
    $ncondominio = $_POST["condominios"];
    $dataevento = $_POST["dataevento"];
    $tipoevento = $_POST["tipo_evento"];
    $descevento = $_POST["descevento"];
    $horaevento = $_POST["horaevento"];
    
    $ncondominio = stripslashes($ncondominio);
    $ncondominio = mysqli_real_escape_string($connection, $ncondominio);
    
    $dataevento = stripslashes($dataevento);
    $dataevento = mysqli_real_escape_string($connection, $dataevento);
    
    $tipoevento = stripslashes($tipoevento);
    $tipoevento = mysqli_real_escape_string($connection, $tipoevento);
    
    $descevento = stripslashes($descevento);
    $descevento = mysqli_real_escape_string($connection, $descevento);
    
    $horaevento = stripslashes($horaevento);
    $horaevento = mysqli_real_escape_string($connection, $horaevento);
    
    if($ncondominio != 'all'){
        $query_consulta = "SELECT DISTINCT id_proprietario FROM fracoes WHERE id_condo ='" . $ncondominio . "'";
        $query = mysqli_query($connection, $query_consulta);
        
        
        while ($row = mysqli_fetch_assoc($query)) {
            $query_users = "SELECT * FROM users WHERE id_user= '" . $row["id_proprietario"] . "'";
            $query = mysqli_query($connection, $query_users);
            $row = mysqli_fetch_assoc($query);
            $usermail = $row["user_mail"];
            $username = $row["user_nicename"];
            
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
            $mail->addAddress($usermail, $username);
            $mail->addReplyTo('info.condominus@gmail.com', 'Information');

            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            $mail->isHTML(true);
            
            if($tipoevento == 'R'){
                $tipoeventotxt = 'Reunião';
            }
            
            elseif($tipoevento == 'L'){
                $tipoeventotxt = 'Limpeza';
            }
            
            elseif($tipoevento == 'M'){
                $tipoeventotxt = 'Manutenção';
            }
            
            $mail->Subject = 'Novo Evento no seu Condomínio';
            $mail->Body    = 'Foi feita a marcação de uma ' . $tipoeventotxt . ' que irá ser realizada a : ' . $dataevento . ' pelas ' . $horaevento;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            
            $query_insert = "INSERT INTO eventos ( id_frac, id_condo, tipo_evento, data_ini, descricao, hora_ini) VALUES ( null, '" . $ncondominio . "', '" . $tipoevento . "',  '" . $dataevento . "','" . $descevento . "', '" . $horaevento . "')";
            
            
            if ((mysqli_query($connection, $query_insert)) && ($mail->send())) {
                echo    "<script type=\"text/javascript\">".
                            "alert('Novo evento criado com sucesso');"
                        .   "window.location = 'menu.php';".
                        "</script>";

            } 
            else {
                echo "<script type=\"text/javascript\">".
                            "alert('Erro ao criar evento!');"
                        .   "window.location = 'menu.php';".
                        "</script>";
           }
           $connection->close();
            
        }
    }
     /*
    elseif($ncondominio == $allcondos){
       
            $query_consultas = "SELECT DISTINCT id_proprietario FROM fracoes";
            $query = mysqli_query($connection, $query_consultas);
        
        
        while ($row = mysqli_fetch_assoc($query)) {
            $query_user = "SELECT * FROM users WHERE id_user= '" . $row["id_proprietario"] . "'";
            $query = mysqli_query($connection, $query_user);
            $rows = mysqli_fetch_assoc($query);
            $usermail = $rows["user_mail"];
            $username = $rows["user_nicename"];
            
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
            $mail->addAddress($usermail, $username);
            $mail->addReplyTo('info.condominus@gmail.com', 'Information');

            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
            $mail->isHTML(true);
            
            if($tipoevento == 'R'){
                $tipoeventotxt = 'Reunião';
            }
            
            elseif($tipoevento == 'L'){
                $tipoeventotxt = 'Limpeza';
            }
            
            elseif($tipoevento == 'M'){
                $tipoeventotxt = 'Manutenção';
            }
            
            $mail->Subject = 'Novo Evento no seu Condomínio';
            $mail->Body    = 'Foi feita a marcação de uma ' . $tipoeventotxt . ' que irá ser realizada a : ' . $dataevento . ' pelas ' . $horaevento;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            
            $query_insert = "INSERT INTO eventos ( id_frac, id_condo, tipo_evento, data_ini, descricao, hora_ini) VALUES ( null, '" . $ncondominio . "', '" . $tipoevento . "',  '" . $dataevento . "','" . $descevento . "', '" . $horaevento . "')";
            
            
            if ((mysqli_query($connection, $query_insert)) && ($mail->send())) {
                echo    "<script type=\"text/javascript\">".
                            "alert('Novo evento criado com sucesso');"
                        .   "window.location = 'painel.php';".
                        "</script>";

            } 
            else {
                echo "<script type=\"text/javascript\">".
                            "alert('Erro ao criar evento em todos os condominios!');"
                        .   
                        "</script>";
                echo $query_insert;
           }
         
           $connection->close();
          
        }
          
    }
     */
         
    
?>
