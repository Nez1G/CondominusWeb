<?php
include ('session.php');
?>
    <head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $('#password1, #password2').on('keyup', function () {
        if ($('#password1').val() == $('#password2').val()) {
			document.getElementById("myBtn").disable = false;
			$( "#myBtn" ).prop( "disabled", false );
            $('#errorpw').html('Matching').css('color', 'green');
            
        } else if($('#password1').val() !== $('#password2').val()){
            $('#errorpw').html('Not Matching').css('color', 'red');
            document.getElementById("myBtn").disabled = true;
		}
    });
});
</script>
    </head>
<div class="message"><?php if(isset($message)) {echo $message;} ?></div>
          <section class="wrapper">
          	<h3><i class="fa fa-angle-right"></i> O meu perfil</h3>
          	
          	<!-- BASIC FORM ELELEMNTS -->
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                      <form class="form-horizontal style-form" method="post" name="frmCons" action="userEdit.php">
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Nome</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="nome" id="nome" 
                                        value="<?php if(!empty($row['user_nicename'])){
                                    echo $row['user_nicename'];} 
                                    elseif(isset($_POST['firstName'])) echo $_POST['firstName']; ?>" 
                                    required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Morada</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" id="morada" name="morada" 
                                        value="<?php if(!empty($row['user_adress'])){
                                        echo $row['user_adress'];}                                 
                                        elseif(isset($_POST['morada'])) echo $_POST['morada']; ?>" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">NIF</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="nif" value="<?php if(!empty($row['user_nif'])){
                                        echo $row['user_nif'];}
                                        elseif(isset($_POST['nif'])) echo $_POST['nif']; ?>" disabled>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Email</label>
                              <div class="col-sm-10">
                                  <input name="userEmail" type="email" class="form-control" id="email"
                                         value="<?php if(!empty($row['user_mail'])){
                                        echo $row['user_mail'];}                                 
                                        elseif(isset($_POST['userEmail'])) echo $_POST['userEmail'];?>" required>
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Contacto</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="phone" value="<?php if(!empty($row['user_phone'])){
                                        echo $row['user_phone'];}
                                        elseif(isset($_POST['phone'])) echo $_POST['phone']; ?>" 
                                        required pattern="[0-9]{9}" title="Contacto tem de conter 9 dígitos">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Password</label>
                              <div class="col-sm-10">
                                  <input type="password" class="form-control" name="password" value="" id="password1" required
                                         pattern=".{6,}" title="A sua password tem de conter mais do que 6 ou mais caracteres">
                              </div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label">Confirmar Password</label>
                              <div class="col-sm-10">
                                  <input type="password"  class="form-control" name="confirm_password" value="" id="password2" required
                                         pattern=".{6,}" onkeyup="pwCheck()" title="A sua password tem de conter mais do que 6 ou mais caracteres"><span id='errorpw'></span>
                              </div>
                          </div>
                          <button type="submit" name="submit" id ="myBtn" class="btn btn-theme">Actualizar</button> &nbsp; &nbsp;
                          <button type="reset" name="limpar"class="btn btn-theme">Reset</button>
                      </form>
                  </div>
          		</div><!-- col-lg-12-->      	
          	</div><!-- /row -->

            </section><! --/wrapper -->
