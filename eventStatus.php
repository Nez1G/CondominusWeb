<?php
    include('session.php');

    if (isset($_POST['cancelar'])) {
            if(isset($_POST['selecionado'])){
                $id_off = $_POST['selecionado'];
                $query_sql = "DELETE FROM eventos WHERE id_evento='" . $id_off . "'";
                if (mysqli_query($connection, $query_sql)){
                    echo    "<script type=\"text/javascript\">".
                    "alert('Desativação efetuada com sucesso');"
                    .   "window.location = 'menu.php';".
                    "</script>";
                }
            }
    }
?>