<?php
    include('session.php');
    $idcookie = $_COOKIE["idfrac"];
?>
<section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Editar Fracão</h3>
        <div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                      
            <form class="form-horizontal style-form" method="post" name="adduserForm" action="fracaoEdit.php" onsubmit="return checkForm(this);">
                <?php 
                $query = "SELECT * FROM fracoes WHERE id_frac=" . $idcookie;
                $results =  mysqli_query($connection, $query);
                $dados = mysqli_fetch_assoc($results);
                ?>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Proprietário</label>
                    <div class="col-sm-10">
                        <select name="idProprietario" type="text" class="form-control" required>
                             <?php
                            $query = "SELECT * FROM users WHERE user_status = '1'";
                            $results =  mysqli_query($connection, $query);
                            while($row = mysqli_fetch_assoc($results)) {
                            ?>
                            <option value="<?php if(!empty($dados['id_proprietario'])){
                                echo $dados['id_proprietario'];}                                 
                                elseif(isset($_POST['idProprietario'])) echo $_POST['idProprietario']; ?>"> <?php echo $row['user_nicename']; echo ' - '; echo $row['user_nif']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Nome do responsável pelo pagamento</label>
                    <div class="col-sm-10">
                        <input name="nome" type="text" value="<?php if(!empty($dados['pagante_nome'])){
                                echo $dados['pagante_nome'];}                                 
                                elseif(isset($_POST['nome'])) echo $_POST['nome']; ?>" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">NIF do responsável pelo pagamento</label>
                    <div class="col-sm-10">
                        <input name="nif" type="text" pattern="[0-9]{9}" title="NIF tem de conter 9 dígitos" class="form-control" required
                                value="<?php if(!empty($dados['pagante_nif'])){
                                echo $dados['pagante_nif'];}                                 
                                elseif(isset($_POST['nif'])) echo $_POST['nif']; ?>">
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-theme">Editar</button> &nbsp; &nbsp;
                <button type="reset" name="limpar" class="btn btn-theme">Reset</button>
            </form>
            </div>
        </div>
    </div>
</section>
