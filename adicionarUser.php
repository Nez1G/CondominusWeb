<?php
include ('session.php');

if($user_rank == 'C'){
        header('Location: menu.php'); 
}
?>
<section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Adicionar Utilizador</h3>
        <div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                      
            <form class="form-horizontal style-form" method="post" name="adduserForm" action="userReg.php" onsubmit="return checkForm(this);">
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Estatuto</label>
                    <div class="radio">
                    		<?php if($user_rank == 'A'){ ?>
                        <label> &nbsp &nbsp
                            <input type="radio" name="estatuto" value="A">
                            Administrador &nbsp
                        </label>
                        <label>
                            <input type="radio" name="estatuto" value="F">
                            Funcionario &nbsp
                        </label>
                        <?php } ?>
                        <label>
                            <input type="radio" name="estatuto" value="C">
                            Condómino &nbsp
                        </label>
                    </div>
                </div>          
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Username</label>
                    <div class="col-sm-10">
                        <input name="userName" type="text" class="form-control" required 
                               value="<?php if(isset($_POST['userName'])) echo $_POST['userName']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Nome</label>
                    <div class="col-sm-10">
                        <input name="nome" type="text" class="form-control" required 
                               value="<?php if(isset($_POST['firstName'])) echo $_POST['firstName']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Morada</label>
                    <div class="col-sm-10">
                        <input name="morada" type="text" class="form-control" required
                               value="<?php if(isset($_POST['morada'])) echo $_POST['morada']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Nº Identificação Fiscal</label>
                    <div class="col-sm-10">
                        <input name="nif" type="text" pattern="[0-9]{9}" title="NIF tem de conter 9 dígitos" class="form-control" required
                               value="<?php if(isset($_POST['nif'])) echo $_POST['nif']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input name="userEmail" type="email" class="form-control" required
                               value="<?php if(isset($_POST['userEmail'])) echo $_POST['userEmail']; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Contacto</label>
                    <div class="col-sm-10">
                        <input name="phone" type="text" pattern="[0-9]{9}" title="Contacto tem de conter 9 dígitos" class="form-control" required
                               value="<?php if(isset($_POST['phone'])) echo $_POST['phone']; ?>">
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-theme">Adicionar</button> &nbsp; &nbsp;
                <button type="reset" name="limpar" class="btn btn-theme">Reset</button>
            </form>
            </div>
        </div>
    </div>
</section>
