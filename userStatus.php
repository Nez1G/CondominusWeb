<?php
    include('session.php');

    if (isset($_POST['eliminar'])) {
            if(isset($_POST['selecionado'])){
                $id_off = $_POST['selecionado'];
                $query_sql = "UPDATE users SET user_status = 0 WHERE id_user='" . $id_off . "'";
                if (mysqli_query($connection, $query_sql)){
                    echo    "<script type=\"text/javascript\">".
                    "alert('Desativação efetuada com sucesso');"
                    .   "window.location = 'menu.php';".
                    "</script>";
                }
            }
    }
    elseif (isset($_POST['ativar'])) {
        if(isset($_POST['selecionado'])){
                    $id_off = $_POST['selecionado'];
                    $query_sql = "UPDATE users SET user_status = 1 WHERE id_user='" . $id_off . "'";
                    if (mysqli_query($connection, $query_sql)){
                        echo    "<script type=\"text/javascript\">".
                        "alert('Ativação efetuada com sucesso');"
                        .   "window.location = 'menu.php';".
                        "</script>";
                }
        }
    }
?>