<?php
include_once ('session.php');
    
if (isset($_GET['id_frac'])) {
        $sql = "SELECT id_condo, id_proprietario, andar_frac, num_porta, area_frac, pagante_nome, pagante_nif"
        . "  FROM fracoes WHERE id_frac=$idFracaoSelec";
        $resquery = efetuar_query($sql, array($_GET['id_frac']));         
        if (count($resquery) == 1) {
            $idProprietario = $resquery[0]['id_proprietario'];
            $numPorta= $resquery[0]['num_porta'];
            $numAndar= $resquery[0]['andar_frac'];
            $area= $resquery[0]['area_frac'];
            $idCondominio= $resquery[0]['id_condo'];
            $nome= $resquery[0]['pagante_nome'];
            $nif_resp= $resquery[0]['pagante_nif'];
        }
        if(isset($_POST['idCondominio'])){
            $sql1 = "UPDATE fracoes SET id_condo='{0}', andar_frac='{1}', num_porta='{2}',"
                . "id_proprietario='{3}', area_frac='{4}', pagante_nome='{5}', pagante_nif='{6}' WHERE id_frac=$idFracaoSelec";
            $valores1 = array($_POST['idCondominio'], $_POST['numAndar'], $_POST['numPorta']
                , $_POST['idProprietario'], $_POST['area'], $_POST['nome'], $_POST['nif']);
        efetuar_insert_update($sql1, $valores1);
        }
        }elseif(isset($_POST['idCondominio'])){
            $sql = "INSERT INTO fracoes (id_condo, andar_frac,"
                    . "num_porta, id_proprietario, area_frac, pagante_nome, pagante_nif) VALUES ('{0}','{1}','{2}','{3}','{4}','{5}','{6}')";
            $valores = array(filter_input(INPUT_POST, 'idCondominio'), filter_input(INPUT_POST, 'numAndar'), filter_input(INPUT_POST, 'numPorta')
                    , filter_input(INPUT_POST, 'idProprietario'), filter_input(INPUT_POST, 'area'), filter_input(INPUT_POST, 'nome'), filter_input(INPUT_POST, 'nif'));
            efetuar_insert_update($sql, $valores);
        }
        
    if (isset($_POST['idCondominio'])) {
        echo    "<script type=\"text/javascript\">".
                    "alert('Registo feito com sucesso');"
                .   "window.location = 'menu.php';".
                "</script>";

    } 
    else {
        echo "<script type=\"text/javascript\">".
                    "alert('Erro');".
             "</script>";
    }
    $connection->close();
