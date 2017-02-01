<?php
    include('session.php');  
    $idcookie = $_COOKIE["idfrac"];
               
    $query= "UPDATE fracoes
             SET pagante_nome='" . $_POST["nome"] . "', pagante_nif='" . $_POST["nif"] . "'
             WHERE id_frac='" . $idcookie. "'";


     if (mysqli_query($connection, $query)) {
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