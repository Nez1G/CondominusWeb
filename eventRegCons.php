<?php

include 'session.php';

$idcookie = $_COOKIE["idevento"];

$query= "UPDATE eventos
             SET tipo_evento='" . $_POST["tipo_evento"] . "', data_ini='" . $_POST["dataevento"] . "', hora_ini='" . $_POST["horaevento"] . "', descricao='" . $_POST["descevento"] . "' WHERE id_evento='" . $idcookie . "'";

   
     if ((mysqli_query($connection, $query))) {
         echo    "<script type=\"text/javascript\">".
                     "alert('Atualização feita com sucesso');"
                 .   "window.location = 'menu.php';".
                 "</script>";

     } 
     else {
         echo "<script type=\"text/javascript\">".
                     "alert('Erro');".
                 "</script>";
         echo "Error: " . $query . "<br>" . mysqli_error($connection);
    }
    $connection->close();
	
	?>