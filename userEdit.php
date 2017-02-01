


<?php
    include('session.php');    
               
    $query= "UPDATE users
             SET user_nicename='" . $_POST["nome"] . "', user_mail='" . $_POST["userEmail"] . "', user_adress='" . $_POST["morada"] . "', user_phone='" . $_POST["phone"] . "', user_pw='" . sha1($_POST["password"]) ."'
             WHERE id_user='" . $user_id . "'";


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