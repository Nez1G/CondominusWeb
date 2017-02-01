<?php 
    include ('session.php');
    $user_rank=$_SESSION['user_rank'];
    $user_id=$_SESSION['user_id'];
    $user_nicename=$login_session;
    $idResponsavel = "";
    $morada = "";
    $codigoPostal = "";
    $numAndares = "";
    $diaPagamento = "";
    $modalidade = "";
    $despesas = "";
    $juros= "";
    $idCondoSelec = $_GET['id_condo'];

    if($user_rank == 'C'){
        header('Location: menu.php');
    }
    /*
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
            
            $valores = array($_POST['idResponsavel'], $_POST['morada'], $_POST['codigoPostal']
                    , $_POST['despesas'], $_POST['modalidade'],  $_POST['diaPagamento'], $_POST['numAndares'], $_POST['juros']);
            efetuar_insert_update($sql, $valores);
    }

?>
        <script>
            function validateForm() {
                    var morada = document.forms["form"]["morada"].value;
         
                    if (morada == "") {
                        document.getElementById("moradaERR").innerHTML = "Introduza uma morada válida";
                        return false;
                    } else {
                        document.getElementById("moradaERR").innerHTML = "";
                    }
            
                }
        </script>
 */
?>
<section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Criar Condomínio</h3>
        <div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                      
                      <form class="form-horizontal style-form" method="post" name="form" action="condoRegistar.php" onsubmit="return checkForm(this);">
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Responsável</label>
                    <div class="col-sm-10">
                        <select name="idResponsavel" type="text" class="form-control" required>
                             <?php
                            $query = "SELECT * FROM users WHERE user_rank = 'F' OR user_rank = 'A'";
                            $results =  mysqli_query($connection, $query);
                            while($row = mysqli_fetch_assoc($results)) {
                            ?>
                            <option value="<?php echo $row['id_user']?>"><?php echo $row['user_nicename']; echo ' - '; echo $row['user_rank']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Morada</label>
                    <div class="col-sm-10">
                        <input name="morada" value="<?php echo $morada;?>" type="text" class="form-control" required>
                        <span id="moradaERR"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Código Postal</label>
                    <div class="col-sm-10">
                        <input name="codPostal" type="text" pattern="[0-9]{4}-[0-9]{3}" title="O cód. Postal deve ter o seguinte formato: 4775-894" class="form-control" required
                               value="<?php $codigoPostal;?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Modalidade de Pagamento</label>
                    <div class="radio">
                        <label> &nbsp; &nbsp;
                            <input type="radio" name="modalidade" value="Permilagem" onchange="resetField()" 
                                <?php if(isset($modalidade) || $modalidade=="Permilagem"){ echo "checked";}?>>
                            Permilagem &nbsp;
                        </label>
                        <label>
                            <input type="radio" name="modalidade" value="Equitativa" onchange="criarTextField()"
                                <?php if(isset($modalidade) || $modalidade=="Equitativa"){ echo "checked";}?>>
                            Equitativa &nbsp;
                        </label>
                         <label>
                            <input type="radio" name="modalidade" value="Exata" onchange="resetField()" 
                                <?php if(isset($modalidade) || $modalidade=="Exata"){ echo "checked";}?>>
                            Exata &nbsp;
                        </label>
                        <label>
                            <input type="radio" name="modalidade" value="Manual" onchange="resetField()" 
                                <?php if(isset($modalidade) || $modalidade=="Manual"){ echo "checked";}?>>
                            Manual &nbsp;
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Número de Andares</label>
                    <div class="col-sm-10">
                        <input name="numAndares" value="<?php echo $numAndares;?>" type="number" min="0" class="form-control bfh-number" required>
                        <span id="myForm"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Total de Despesas (€)</label>
                    <div class="col-sm-10">
                        <input type="number" name="despesas" value="<?php echo $despesas;?>" min="0" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Juros de Mora (%)</label>
                    <div class="col-sm-10">
                        <input type="number" name="juros" value="<?php echo $juros;?>" min="1" max="100" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Dia de Pagamento</label>
                    <div class="col-sm-10">
                        <input name="diaPagamento" value="<?php echo $diaPagamento;?>" type="number" min="1" max="31" class="form-control" required>
                    </div>
                </div>
                <button type="submit"  class="btn btn-theme">Criar</button> &nbsp; &nbsp;
                <button type="reset" name="limpar" class="btn btn-theme">Reset</button>
            </form>
            </div>
        </div>
    </div>
</section>
