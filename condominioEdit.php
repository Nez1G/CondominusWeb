<?php
    include('session.php');  
    $idcookie = $_COOKIE["idcondo"];
               
    $query= "UPDATE condominios
             SET condo_despesas='" . $_POST["despesas"] . "', juros_mora='" . $_POST["juros"] . "', condo_prazo_limite='" . $_POST["diaPagamento"]."'
             WHERE id_condo='" . $idcookie. "'";


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