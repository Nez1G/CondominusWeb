<?php
    include('session.php');

    if (isset($_POST['cancelar'])) {
            if(isset($_POST['selecionado'])){
                $id_off = $_POST['selecionado'];
                $query_sql = "DELETE FROM pedidos WHERE id_pedido='" . $id_off . "'";
                
            }
    }
?>