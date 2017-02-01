<?php
include ('session.php');
?>
<script>
  $(document).ready(function(){
          $("tr").click(function(){
          if ($(this).hasClass("row-highlight")){
            $(this).removeClass("row-highlight")
          }
           else{ $(this).addClass("row-highlight");
                $(".row-highlight input[name='selecionado']").click();
               }
          });
      });   
  } 
</script>
<section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Lista de Frações</h3>
         <form class="form-horizontal style-form" method="post" id="fractable" onsubmit="return checkForm(this);">
                <div class="row mt"> 
                    <div class="col-lg-12">
                        <div class="input-group stylish-input-group">
                            <input type="text" id="texto" class="form-control"  placeholder="Procurar Frações" >
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
                          <table class="table">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Condomínio</th>
                                  <th>Andar</th>
                                  <th>Nº de porta</th>
                                  <th>Proprietário</th>
                                  <th>Resposável pelo pagamento</th>
                                  <th>NIF do responsável</th>
                                  <th>Área</th>
                                  <th>Despesas</th>
                              </tr>
                              </thead>
                              <tbody>
                                  <?php
                                    $query = "SELECT * FROM fracoes";
                                    $results =  mysqli_query($connection, $query);

                                    while($row = mysqli_fetch_assoc($results)) {
                                    $ref = $row['id_frac'];
                                    ?>
                              <tr>
                                <td><input type="radio" name="selecionado" value="<?php echo $ref; ?>"/></td>
                                <td><?php echo $row['id_condo']?></td>
                                <td><?php echo $row['andar_frac']?></td>
                                <td><?php echo $row['num_porta']?></td>
                                <td><?php echo $row['proprietario']?></td>
                                <td><?php echo $row['pagante_nome']?></td>
                                <td><?php echo $row['pagante_nif']?></td>
                                <td><?php echo $row['area_frac']?></td>
                                <td><?php echo $row['despesas_frac']?></td>
                              </tr>
                               <?php
                                }
                                ?>
                                </tbody>
                                <?php if(($user_rank == 'F') || ($user_rank == 'A')){ ?>
                                    &nbsp; &nbsp;
                                        <button type="button" class="btn btn-theme" onclick="editFracInfo()">Editar</button> &nbsp; &nbsp;
                                    <?php } ?>
                                        <button type="button" onclick="carregaFrac()" class="btn btn-theme">Consultar</button> &nbsp; &nbsp;
                                        <hr>
                          </table>
                      </div>
                      <?php echo calcularPermilagem(117);?>
              </div>
                    </div>
         </form>
</section>

<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
