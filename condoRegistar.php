<?php 
    include_once ('session.php');

    if (isset($_GET['id_condo'])) {
        $sql = "SELECT id_condo_resp, condo_morada, "
        . "condo_cod_postal, condo_despesas, condo_modalidade, condo_prazo_limite, condo_andares, juros_mora FROM condominios WHERE id_condo =$idCondoSelec";
        $resquery = efetuar_query($sql, array($_GET['id_condo']));         
            if (count($resquery) == 1) {
                $idResponsavel = $resquery[0]['id_condo_resp'];
                $morada = $resquery[0]['condo_morada'];
                $codigoPostal = $resquery[0]['condo_cod_postal'];
                $numAndares = $resquery[0]['condo_andares'];
                $diaPagamento = $resquery[0]['condo_prazo_limite'];
                $modalidade = $resquery[0]['condo_modalidade'];
                $despesas = $resquery[0]['condo_despesas'];
                $juros = $resquery[0]['juros_mora'];
            }
            if(isset($_POST['idResponsavel'])){
        $sql1 = "UPDATE condominios SET id_condo_resp='{0}', condo_morada='{1}', condo_cod_postal='{2}',"
                . "condo_despesas='{3}', condo_modalidade='{4}', condo_prazo_limite='{5}', condo_andares='{6}', juros_mora='{7}' WHERE id_condo=$idCondoSelec";
        $valores1 = array($_POST['idResponsavel'], $_POST['morada'], $_POST['codigoPostal']
                , $_POST['despesas'], $_POST['modalidade'],  $_POST['diaPagamento'], $_POST['numAndares'], $_POST['juros']);
        efetuar_insert_update($sql1, $valores1);
            }
        }elseif(isset($_POST['idResponsavel'])){
            $sql = "INSERT INTO condominios (id_condo_resp, condo_morada,"
                    . " condo_cod_postal, condo_despesas, condo_modalidade, condo_prazo_limite, condo_andares, juros_mora) VALUES ('{0}','{1}','{2}','{3}','{4}','{5}','{6}','{7}')";
            
            $valores = array(filter_input(INPUT_POST, 'idResponsavel'), filter_input(INPUT_POST, 'morada'), filter_input(INPUT_POST, 'codigoPostal'),
                     filter_input(INPUT_POST, 'despesas'), filter_input(INPUT_POST, 'modalidade'), filter_input(INPUT_POST, 'diaPagamento'), filter_input(INPUT_POST, 'numAndares'), filter_input(INPUT_POST, 'juros'));
                    efetuar_insert_update($sql, $valores);
    }
    
    if (isset($_POST['idResponsavel'])) {
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
