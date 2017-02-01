<?php
    include('session.php');

    if (isset($_POST['eliminar'])) {
            if(isset($_POST['selecionado'])){
                $id_off1 = $_POST['selecionado'];
                $query_sql = "UPDATE condominios SET estado = 0 WHERE id_condo='" . $id_off1 . "'";
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
                    $id_off1 = $_POST['selecionado'];
                    $query_sql = "UPDATE condominios SET estado = 1 WHERE id_condo='" . $id_off1 . "'";
                    if (mysqli_query($connection, $query_sql)){
                        echo    "<script type=\"text/javascript\">".
                        "alert('Ativação efetuada com sucesso');"
                        .   "window.location = 'menu.php';".
                        "</script>";
                }
        }
    }
?>