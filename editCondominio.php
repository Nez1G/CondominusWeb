<?php
    include('session.php');
    $idcookie = $_COOKIE["idcondo"];
?>
<section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Editar Utilizador</h3>
        <div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                      
            <form class="form-horizontal style-form" method="post" name="adduserForm" action="condominioEdit.php" onsubmit="return checkForm(this);">
                <?php 
                $query = "SELECT * FROM condominios where id_condo=" . $idcookie;
                $results =  mysqli_query($connection, $query);
                $dados = mysqli_fetch_assoc($results);
                ?>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Total de Despesas (€)</label>
                    <div class="col-sm-10">
                        <input type="number" name="despesas"  min="0" class="form-control" required value="<?php if(!empty($dados['condo_despesas'])){
                                echo $dados['condo_despesas'];}                                 
                                elseif(isset($_POST['despesas'])) echo $_POST['despesas']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Juros de Mora (%)</label>
                    <div class="col-sm-10">
                        <input type="number" name="juros"  min="1" max="100" class="form-control" required 
                                value="<?php if(!empty($dados['juros_mora'])){
                                echo $dados['juros_mora'];}                                 
                                elseif(isset($_POST['juros'])) echo $_POST['juros']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Dia de Pagamento</label>
                    <div class="col-sm-10">
                        <input name="diaPagamento" type="number" min="1" max="31" class="form-control" required value="<?php if(!empty($dados['condo_prazo_limite'])){
                                echo $dados['condo_prazo_limite'];}                                 
                                elseif(isset($_POST['diaPagamento'])) echo $_POST['diaPagamento']; ?>">
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-theme">Editar</button> &nbsp; &nbsp;
                <button type="reset" name="limpar" class="btn btn-theme">Reset</button>
            </form>
            </div>
        </div>
    </div>
</section>
