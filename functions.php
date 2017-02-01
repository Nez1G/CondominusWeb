<?php

include 'mysql_connect.php';
define('DEBUG_MODE', FALSE);
    
function redirect($url){
    header("Location: $url");
}


function dbconnect(){

    $connection = mysqli_connect(MYSQL_SERVER, MYSQL_USERNAME, MYSQL_PASSWORD, 
            MYSQL_DATABASE, MYSQL_PORT) or die('Erro ao ligar ao servidor...');
    
    return $connection;
}


function user_auth($username, $password){
    $connection = dbconnect();   
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);
    $query = "SELECT * FROM utilizador WHERE user_name='$username' AND user_pw='$password'";
    $query_result = mysqli_query($connection, $query);
    $value = false;      
    
    if (mysqli_num_rows($query_result) >0){
        $user_data = mysqli_fetch_assoc($query_result);           
        $value = ($user_data['Password'] == $password);               
    }
    
    mysqli_free_result($query_result);
    mysqli_close($connection);              
    
    return $value;
}

function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

function proteger_query($sql, $filtros, $ligacao) {                
    $query = $sql;    
    for ($i=0; $i<count($filtros); $i++) {
        $query = str_replace('{' . $i . '}', mysqli_escape_string($ligacao, $filtros[$i]), $query);
    }
    return $query;
}

function efetuar_query($sql, $filtros = array()) {
    $ligacao = dbconnect();                   
    $dados = array();
    $query = proteger_query($sql, $filtros, $ligacao);
    $resultado = mysqli_query($ligacao, $query);   
    
    if (DEBUG_MODE) {
        echo "SQL: $sql <br/>";
        echo "SQL protegida: $query <br/>";
        $erro = mysqli_error($ligacao);        
        if ($erro) {
            echo '<span style="color:red;">Erro: ' . $erro . '</span><br/>';
        }      
    }
    
    while ($linha = mysqli_fetch_assoc($resultado)) {
        array_push($dados, $linha);
    }

    mysqli_free_result($resultado);
    mysqli_close($ligacao);
    return $dados;

}

function efetuar_insert_update($sql, $filtros) {
    $ligacao = dbconnect();                   
    $query = proteger_query($sql, $filtros, $ligacao);    
    $sucesso = (mysqli_query($ligacao, $query) === TRUE);         
    
    if (DEBUG_MODE) {
        echo "SQL: $sql <br/>";
        echo "SQL protegida: $query <br/>";
        echo "Sucesso: $sucesso <br/>";
        $erro = mysqli_error($ligacao);        
        if ($erro) {
            echo '<span style="color:red;">Erro: ' . $erro . '</span><br/>';
        }      
    }

    mysqli_close($ligacao);
    return $sucesso;
}

function desenhar_linhas_tabela(array $dados, array $colunas, $colunachave="", $linkeditor="") {
    for ($l=0; $l<count($dados); $l++) {
        echo '<tr>';
        for ($c=0; $c<count($colunas); $c++) {
            $k = $colunas[$c];
            $v = $dados[$l][$k];
            if ($colunachave != "" && $k == $colunachave) {
                echo '<td align="center"><a href="' . str_replace("{id}", $v, $linkeditor) . '" target="_blank">' . $v . '</a></td>';
            }else{
                echo "<td>$v</td>";
            }                                   
        }
        echo '<td><input type="checkbox"></td>
               </tr>';        
    }           
}

function desenhar_linhas_combo(array $dados, $campoTexto, $campoValue="") {
	if ($campoValue == "") {
		$campoValue = $campoTexto;
	}
	for ($l=0; $l<count($dados); $l++) {
		echo '<option value="' . $dados[$l][$campoValue] . '">' . $dados[$l][$campoTexto] . '</option>';
	}	
}


function areaCondominio($id_condominio){
    $connection = dbconnect();
    $areaCondominio = 0;
    $id_condominio = mysqli_real_escape_string($connection, $id_condominio);
    $areaFrac = "SELECT area_frac FROM fracoes WHERE id_condo ='$id_condominio'"; 
    $resFracoesCondominio = mysqli_query($connection, $areaFrac);
    while ($row = mysqli_fetch_assoc($resFracoesCondominio)){
        $areaCondominio += $row['area_frac'];
    }
    return $areaCondominio;
    mysqli_close($connection);
}

function areaAndar($id_condominio, $andar){
    $connection = dbconnect();
    $id_condominio = mysqli_escape_string($connection, $id_condominio);
    $andar = mysqli_escape_string($connection, $andar);
    $fracoes = "SELECT * FROM fracoes WHERE id_condo = '$id_condominio' AND andar_frac = '$andar'";
    $resFracoes = mysqli_query($connection, $fracoes);
    $areaAndar = 0;
    $areaFracao = 0;
    while ($row = mysqli_fetch_assoc($resFracoes)){
        $areaFracao = $row['area_frac'];
        $areaAndar += $areaFracao;
    }
    return $areaAndar;
    mysqli_close($connection);
}

function numFracoesAndar($idcondominio, $andar){
    $connection = dbconnect();
    $idcondominio = mysqli_real_escape_string($connection, $idcondominio);
    $andar = mysqli_real_escape_string($connection, $andar);
    $fracoes = "SELECT * FROM fracoes WHERE id_condo = '$idcondominio' AND andar_frac = '$andar'";
    $resFracoes = mysqli_query($connection, $fracoes);
    $fracoesAndar = 0;
    while ($row = mysqli_fetch_assoc($resFracoes)) {
        $fracoesAndar += 1;
    }
    return $fracoesAndar;
    mysqli_close($connection);
}

function numFracoesCondominio($id_condominio){
    $connection = dbconnect();
    $id_condominio = mysqli_real_escape_string($connection, $id_condominio);
    $fracoes = "SELECT * FROM fracoes WHERE id_condo = '$id_condominio'";
    $resFracoes = mysqli_query($connection, $fracoes);
    $fracoesTotal = 0;
    while (mysqli_fetch_assoc($resFracoes)){
        $fracoesTotal += 1;
    }
    return $fracoesTotal;
    mysqli_close($connection);
}

function calcularPermilagem($id_condominio){
    $connection = dbconnect();
    $id_condominio = mysqli_real_escape_string($connection, $id_condominio);
    $area = areaCondominio($id_condominio);
    $despesasCondominio = "SELECT condo_despesas FROM condominios WHERE id_condo ='$id_condominio'" ;
    $resDespesasCondominio = mysqli_query($connection, $despesasCondominio);
    $despesaTotal = mysqli_fetch_assoc($resDespesasCondominio);
    $DespesaTotalRow = $despesaTotal['condo_despesas'];
    $despMes =  $DespesaTotalRow / 12;
    $fator = ($despMes / $area);
    $fracoesCondo = "SELECT * FROM fracoes WHERE id_condo ='$id_condominio'" ;
    $resFracoesCondo = mysqli_query($connection, $fracoesCondo);
    foreach ($resFracoesCondo as $row) {
                $idFracao = $row['id_frac'];
                $permilagem = $row['area_frac'];
                $resultado = $fator * $permilagem;
                $expressao = "UPDATE fracoes SET despesas_frac = '$resultado' WHERE id_frac = '$idFracao';";
                mysqli_query($connection, $expressao);
    }
    mysqli_close($connection);  
}

function calcularEquitativa($id_condominio, $imputacao, $andar) {
    $connection = dbconnect();
    $id_condominio = mysqli_real_escape_string($connection, $id_condominio);
    $imputacao = mysqli_real_escape_string($imputacao);
    $andar = mysqli_real_escape_string($andar);
    $despesasCondominio = "SELECT condo_despesas FROM condominios WHERE id_condo ='$id_condominio'" ;
    $resDespesasCondominio = mysqli_query($connection, $despesasCondominio);
    $despesaAnual = mysqli_fetch_assoc($resDespesasCondominio);
    $despesaAnualRow = $despesaAnual['condo_despesas'];
    $despesaMensal = $despesaAnualRow / 12;
    $imputacaoCondo = $imputacao / 100;
    $despesaAndar = $despesaMensal * $imputacaoCondo;
    $areaAndar = areaAndar($id_condominio, $andar);
    $fator = $despesaAndar / $areaAndar;
    $fracoes = "SELECT * FROM fracoes WHERE id_condo = '$id_condominio' AND andar_frac = '$andar'";
    $resFracoes = mysqli_query($connection, $fracoes);
    while ($row = mysqli_fetch_assoc($resFracoes)){
        $idFracao = $row['id_frac'];
        $areaFracao = $row['area_frac'];
        $despesasFracao = $fator * $areaFracao;
        $updateValor = "UPDATE fracoes SET despesas_frac = '$despesasFracao' WHERE id_frac = '$idFracao'";
        $resUpdateValor = mysqli_query($connection, $updateValor);
    }
    mysqli_close($connection);
}

function calcularExata($id_condominio){
    $connection = dbconnect(); 
    $id_condominio = mysqli_real_escape_string($connection, $id_condominio);
    $despesasCondominio = "SELECT condo_despesas FROM condominios WHERE id_condo ='$id_condominio'" ;
    $resDespesasCondominio = mysqli_query($connection, $despesasCondominio);
    $idFracao = "SELECT id_frac FROM fracoes WHERE id_condo = '$id_condominio'";
    $resIDFracao = mysqli_query($connection, $idFracao);
    $despesaAnual = mysqli_fetch_assoc($resDespesasCondominio);
    $despesaAnualRow = $despesaAnual['condo_despesas'];
    $despesaMensal = $despesaAnualRow / 12;
    $numFracoes = numFracoesCondominio($id_condominio);
    $despesasFracao = $despesaMensal / $numFracoes;
    while ($row = mysqli_fetch_assoc($resIDFracao)){
        $idFracaoCond = $row['id_frac'];
        $updateCond = "UPDATE fracoes SET despesas_frac = "
                . "'$despesasFracao' WHERE id_frac = '$idFracaoCond'";
        $updateCondRes = mysqli_query($connection, $updateCond);
    }
    
    mysqli_close($connection);
}

function calcularManual($valor, $fracao){
    $connection = dbconnect();
    $valor = mysqli_real_escape_string($connection, $valor);
    $fracao = mysqli_real_escape_string($connection, $fracao);
    $idFracao = "SELECT * FROM fracoes WHERE id_frac = '$fracao'";
    $resIDFracao = mysqli_query($connection, $idFracao);
    while ($row = mysqli_fetch_assoc($resIDFracao)){
        $idFrac = $row['id_frac'];
        $valorAPagar = "UPDATE fracoes SET despesas_frac = '$valor' WHERE id_frac = '$idFrac'";
        $resValorAPagar = mysqli_query($connection, $valorAPagar);
    }
    mysqli_close($connection);
    }

function atualizarModalidade(){
    $connection = dbconnect();
    $idcondominio = $_POST["idCondominio"];
    $query = "SELECT * FROM condominios WHERE id_condo = '$idcondominio'";
    $resQuery = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($resQuery);
    $modalidade = $row['condo_modalidade'];
    if($modalidade == "permilagem"){
        calcularPermilagem($idcondominio);
    } elseif ($modalidade == "equitativa") {
        calcularEquitativa($idcondominio, 0, 0);
    } elseif ($modalidade == "exata") {
        calcularExata($idcondominio);
    } elseif ($modalidade == "manual") {
        calcularManual(0, $idcondominio);
    }
    mysqli_close($connection);
}
    
function liquidarDivida($id_doc){
    $connection = dbconnect();
    $id_doc = mysqli_escape_string($connection, $id_doc);
    $documentos = "SELECT * FROM documentos WHERE id_doc = '$id_doc'";
    $resDocumentos = mysqli_query($connection, $documentos);
    $row = mysqli_fetch_assoc($resDocumentos);
    $idCond = $row['id_condo'];
    $dataEmissao = $row['data_emissao'];
    $idFrac = $row['id_frac'];
    $condominios = "SELECT * FROM condominios WHERE id_condo = '$idCond'";
    $resCondominios = mysqli_query($connection, $condominios);
    $row1 = mysqli_fetch_assoc($resCondominios);
    $diaLimite = $row1['condo_prazo_limite'];
    $jurosMora = $row1['juros_mora'];
    $dataLimite = date('Y-m-d', strtotime($dataEmissao));
    $fracoes = "SELECT * FROM fracoes WHERE id_frac = '$idFrac'";
    $resFracoes = mysqli_query($connection, $fracoes);
    $row2 = mysqli_fetch_assoc($connection, $resFracoes);
    $despesaMensal = $row2['despesas_frac'];
    $idProprietario = $row2['id_proprietario'];
    $data = date('Y-m-d');
    if($dataLimite < $data){
        $jurosMora = $jurosMora / 100;
        $despesasCJuro = $despesaMensal * $jurosMora;
        $valor = $despesaMensal + $despesasCJuro;
        $update1 = "UPDATE documentos SET estado_pagamento = 1, despesas_frac = '$valor', data_pagamento = '$data' WHERE id_frac = '$idFrac'";
        mysqli_query($connection, $update1);
        $users = "SELECT * FROM users WHERE id_user = $idProprietario";
        $resUsers = mysqli_query($connection, $users);
        $row3 = mysqli_fetch_assoc($resUsers);
        $incumpricoes = $row3['user_multas'];
        $atrasos = $incumpricoes + 1;
        $updateAtrasos = "UPDATE users SET user_multas = '$atrasos' WHERE id_user = '$idProprietario'";
        $resUpdateAtrasos = mysqli_query($connection, $updateAtrasos);
    } elseif($dataLimite >= $data) {
        $updateEstado = "UPDATE documentos SET estado_pagamento = 1, despesas_frac = '$valor', data_pagamento = '$data' WHERE id_frac = '$idFrac'";
        mysqli_query($connection, $updateEstado);
    }
    mysqli_close($connection);
}

function listarAtrasos($id_fracao){
    $connection = dbconnect();
    $id_fracao = mysqli_escape_string($connection, $id_fracao);
    $fracoes = "SELECT * FROM fracoes WHERE id_frac = '$id_fracao'";
    $resFracoes = mysqli_query($connection, $fracoes);
    while ($row = mysqli_fetch_assoc($resFracoes)){
        $idFracao = $row['id_frac'];
        $documentos = "SELECT * FROM documentos WHERE id_frac = '$idFracao' AND estado_pagamento = 0";
        $resDocumentos = mysqli_query($connection, $documentos);
        while ($row2 = mysqli_fetch_assoc($resDocumentos)){
            echo "  <tr>
                        <td> {$row2['id_condo']} </td>
                        <td> {$row2['id_frac']} </td>
                        <td> {$row2['data_emissao']} </td>
                        <td> {$row2['motante']} </td> 
                    </tr>"; 
        }
    }
    mysqli_close($connection);
}

function maisIncumpridores(){
    $connection = dbconnect();
    $users = "SELECT * FROM users ORDER BY user_multas DESC";
    $resUsers = mysqli_query($connection, $users);
    while ($row = mysqli_fetch_assoc($resUsers)){
        echo "  <tr>
                    <td> {$row['id_user']} </td>
                    <td> {$row['user_name']} </td>
                    <td> {$row['user_nicename']} </td>
                    <td> {$row['user_multas']} </td> 
                </tr>"; 
    }
    mysqli_close($connection);
}

function listarPagos($id_fracao){
    $connection = dbconnect();
    $id_fracao = mysqli_escape_string($connection, $id_fracao);
    $fracoes = "SELECT * FROM fracoes WHERE id_frac = '$id_fracao'";
    $resFracoes = mysqli_query($connection, $fracoes);
    while ($row = mysqli_fetch_assoc($resFracoes)){
        $idFracao = $row['id_frac'];
        $documentos = "SELECT * FROM documentos WHERE id_frac = '$idFracao' AND estado_pagamento = 1";
        $resDocumentos = mysqli_query($connection, $documentos);
        while ($row2 = mysqli_fetch_assoc($resDocumentos)){
            echo "  <tr>
                        <td> {$row2['id_condo']} </td>
                        <td> {$row2['id_frac']} </td>
                        <td> {$row2['data_emissao']} </td>
                        <td> {$row2['motante']} </td> 
                    </tr>"; 
        }
    }
    mysqli_close($connection);
}

?>