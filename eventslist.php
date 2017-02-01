<?php
include('session.php');

if($user_rank == 'C'){
        header('Location: painel.php'); 
}
?>
<section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Lista de Eventos</h3>
    <form class="form-horizontal style-form" method="post" action="eventStatus.php" onsubmit="return checkForm(this);">
                <div class="row mt"> 
                    <div class="col-lg-12">
                        <div class="input-group stylish-input-group">
                            <input type="text" id="texto" class="form-control"  placeholder="Procurar Eventos" >
                            <span class="input-group-addon">
                                <button type="submit" onclick="doIt()" value="Procurar">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>  
                            </span>
                        </div>
                    </div>
                </div>
    
          <div class="row mt">
              <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table" id="eventstable">
                              <thead>
                              <tr><th></th>
                                  <th>ID do Evento</th>
                                  <th>ID do Local</th>
                                  <th>Tipo</th>
                                  <th>Descrição</th>
                                  <th>Data</th>
                                  <th>Hora</th>
                              </tr>
                              </thead>
                              <tbody>
                                  <?php
                                    $query = "SELECT * FROM eventos";
                                    $results =  mysqli_query($connection, $query);

                                    while($row = mysqli_fetch_assoc($results)) {
                                    $ref = $row['id_evento'];
                                    ?>
                              <tr>
                                <td><input type="radio" name="selecionado"  required id="radioid" value="<?php echo $ref;?>"/></td>
                                <td><?php echo $row['id_evento'];?></td>
                                <td><?php echo $row['id_condo']?></td>
                                <td><?php echo $row['tipo_evento']?></td>
                                <td><?php echo $row['descricao']?></td>
                                <td><?php echo $row['data_ini']?></td>
                                <td><?php echo $row['hora_ini']?></td>
                              </tr>
                               <?php
                                }
                                ?>
                                </tbody>
                                  <?php if(($user_rank == 'F') || ($user_rank == 'A')){ ?>
                                  &nbsp; &nbsp;
                                  <button type="button" name="editarevento" onclick="editEventInfo()" class="btn btn-theme">Editar</button> &nbsp; &nbsp;
                                  <button type="submit" name="cancelar" class="btn btn-theme" style="background-color: #f44336;">Cancelar Evento</button>
                                  <?php } ?>
                          </table>
                      </div>
                  </div>
              </div>
        </form>
</section>

