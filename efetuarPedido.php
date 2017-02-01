<?php
include ('session.php');
?>
<section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Efetuar Pedido</h3>
        <div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                      
            <form class="form-horizontal style-form" method="post" name="adduserForm" action="pedidoReg.php" onsubmit="return checkForm(this);">
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Motivo de contacto</label>
                    <div class="col-sm-10">
                        <input name="motivo" type="text" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Problemas e Aspetos a melhorar</label>
                    <div class="col-sm-10">
                        <textarea name="problemas" rows="4" cols="50" class="form-control" required ></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                        <input name="email" type="email" class="form-control" required>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-theme">Enviar</button> &nbsp; &nbsp;
                <button type="reset" name="limpar" class="btn btn-theme">Limpar</button>
            </form>
                  </div>
                        </div>
        </div>
</section>