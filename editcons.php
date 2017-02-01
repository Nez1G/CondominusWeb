<?php
    include('session.php');
    $idcookie = $_COOKIE["idcons"];
?>
<section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Editar Utilizador</h3>
        <div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                      
            <form class="form-horizontal style-form" method="post" name="adduserForm" action="userEditCons.php">
                <?php 
                $query = "SELECT * FROM users where id_user=" . $idcookie;
                $results =  mysqli_query($connection, $query);
                $dados = mysqli_fetch_assoc($results);
                ?>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Nome</label>
                    <div class="col-sm-10">
                        <input name="nome" type="text" class="form-control" required 
                               value="<?php echo $dados['user_nicename'];?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Morada</label>
                    <div class="col-sm-10">
                        <input name="morada" type="text" class="form-control" required
                                value="<?php if(!empty($dados['user_adress'])){
                                echo $dados['user_adress'];}                                 
                                elseif(isset($_POST['morada'])) echo $_POST['morada']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Nº Identificação Fiscal</label>
                    <div class="col-sm-10">
                        <input name="nif" type="text" pattern="[0-9]{9}" title="NIF tem de conter 9 dígitos" class="form-control" required
                                value="<?php if(!empty($dados['user_nif'])){
                                echo $dados['user_nif'];}
                                elseif(isset($_POST['nif'])) echo $_POST['nif']; ?>" disabled>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input name="userEmail" type="email" class="form-control" required
                                value="<?php if(!empty($dados['user_mail'])){
                                echo $dados['user_mail'];}                                 
                                elseif(isset($_POST['userEmail'])) echo $_POST['userEmail']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Contacto</label>
                    <div class="col-sm-10">
                        <input name="phone" type="text" pattern="[0-9]{9}" title="Contacto tem de conter 9 dígitos" class="form-control" required
                                value="<?php if(!empty($dados['user_phone'])){
                                echo $dados['user_phone'];}
                                elseif(isset($_POST['phone'])) echo $_POST['phone']; ?>">
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-theme">Editar</button> &nbsp; &nbsp;
                <button type="reset" name="limpar" class="btn btn-theme">Reset</button>
            </form>
            </div>
        </div>
    </div>
</section>
