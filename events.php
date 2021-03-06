<?php
include ('session.php');
?>

<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    
<script>
$(document).ready(function(){
    $( function() {
        $('input#timepicker').timepicker({});
});
	
    $( "#timepicker" ).click(function() {
		//alert( "Handler for .click() called." );
	});
	
    $( function() {
        $( "#datepicker" ).datepicker();
    } );
});
</script>
    </head>
<section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Criar Evento</h3>
        <div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                      
            <form class="form-horizontal style-form" method="post" action="eventReg.php" onsubmit="return checkForm(this);">
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Condomínio</label>
                    <div class="col-sm-10">
                        <select name="condominios" type="text" class="form-control" required>
                             <?php
                            $query = "SELECT * FROM condominios WHERE estado='1'";
                            $results =  mysqli_query($connection, $query);
                            while($row = mysqli_fetch_assoc($results)) {
                            ?>
                            <option value="<?php echo $row['id_condo']?>"><?php echo $row['condo_morada'];?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Notas sobre o evento</label>
                    <div class="col-sm-10">
                        <textarea name="descevento" rows="4" cols="50" class="form-control" required ></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Data</label>
                    <div class="col-sm-10">
                        <input name="dataevento" type="text" onclick="loadPicker()" id="datepicker" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Hora</label>
                    <div class="col-sm-10">
                        <input name="horaevento" type="text" onmoouseover="loadTimePicker()" id="timepicker" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Tipo de Evento</label>
                    <div class="radio">
                        <?php if(($user_rank == 'A') ||($user_rank == 'F')){ ?>
                        <label> &nbsp &nbsp
                            <input type="radio" name="tipo_evento" value="Reunião">
                            Reunião &nbsp
                        </label>
                        <label>
                            <input type="radio" name="tipo_evento" value="Limpeza">
                            Limpeza &nbsp
                        </label>
                        <label>
                            <input type="radio" name="tipo_evento" value="Manutenção">
                            Manutenção &nbsp
                        </label>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <button type="submit" name="submit" class="btn btn-theme">Adicionar</button> &nbsp; &nbsp;
                <button type="reset" name="limpar" class="btn btn-theme">Reset</button>
            </form>
            </div>
        </div>
    </div>
</section>

