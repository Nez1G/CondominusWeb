<?php
include ('session.php');

if($user_rank == 'C'){
        header('Location: menu.php'); 
}
?>
<script>
function doIt() {
    var texto = document.getElementById('texto').value;
    window.open('consultarCondomino.php?condo_morada=' + texto, '_self');				
}	
</script>
<script>
function procurar() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("procurar");
  filter = input.value.toUpperCase();
  table = document.getElementById("tabela");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[3];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
</script>
<!--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                  
                 function search(){
 
                      var title=$("#search").val();
 
                      if(title!=""){
                        $("#result").html("<img alt="ajax search" src='ajax-loader.gif'/>");
                         $.ajax({
                            type:"post",
                            url:"search.php",
                            data:"title="+title,
                            success:function(data){
                                $("#result").html(data);
                                $("#search").val("");
                             }
                          });
                      }
                       
 
                      
                 }
 
                  $("#button").click(function(){
                     search();
                  });
 
                  $('#search').keyup(function(e) {
                     if(e.keyCode == 13) {
                        search();
                      }
                  });
            });
        </script>-->
<section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Lista de Condomínios</h3>
    <form class="form-horizontal style-form" method="post" id="condtable" action="condominioStatus.php" onsubmit="return checkForm(this);">
                <div class="row mt"> 
                    <div class="col-lg-12">
                        <div class="input-group stylish-input-group">
                            <input type="text" id="procurar" onkeyup="procurar()" class="form-control"  placeholder="Introduza a morada do condomínio" >
                            <span class="input-group-addon">
                                <button type="submit" id="button" value="Procurar">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>  
                            </span>
                        </div>
                    </div>
                </div>
    
    <div class="row mt">
        <div id="result">
        </div>
              <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table" id="tabela">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Id</th>
                                  <th>Responsável</th>
                                  <th>Morada</th>
                                  <th>Código Postal</th>
                                  <th>Modalidade</th>
                                  <th>Número de Andares</th>
                                  <th>Total de Despesas</th>
                                  <th>Dia de Pagamento</th>
                                  <th>Juros Mora (%)</th>
                                  <th>Estado</th>
                              </tr>
                              </thead>
                              <tbody>
                                  <?php
                                    $query = "SELECT * FROM condominios";
                                    $results =  mysqli_query($connection, $query);

                                    while($row = mysqli_fetch_assoc($results)) {
                                    $ref = $row['id_condo'];
                                    ?>
                              <tr>
                                <td><input type="radio" name="selecionado" value="<?php echo $ref; ?>"/></td>
                                <td><?php echo $row['id_condo']?></td>
                                <td><?php echo $row['id_condo_resp']?></td>
                                <td><?php echo $row['condo_morada']?></td>
                                <td><?php echo $row['condo_cod_postal']?></td>
                                <td><?php echo $row['condo_modalidade']?></td>
                                <td><?php echo $row['condo_andares']?></td>
                                <td><?php echo $row['condo_despesas']?></td>
                                <td><?php echo $row['condo_prazo_limite']?></td>
                                <td><?php echo $row['juros_mora']?></td>
                                <td><?php echo $row['estado']?></td>
                              </tr>
                               <?php
                                }
                                ?>
                                </tbody>
                                    <?php if ($user_rank == 'A'){ ?>
                                    &nbsp; &nbsp;
                                        <button type="submit" name="ativar" class="btn btn-theme" style="background-color: #4CAF50;">Ativar</button> &nbsp; &nbsp;
                                        <button type="submit" name="eliminar" class="btn btn-theme" style="background-color: #f44336;">Desativar</button> 
                                         <?php } ?> &nbsp; &nbsp;
                                        <button type="button" class="btn btn-theme" onclick="editCondInfo()">Editar</button> &nbsp; &nbsp;
                                        <button type="button" onclick="carregaCond()" class="btn btn-theme">Consultar</button> &nbsp; &nbsp;
                                        <hr>
                                        
                                    <?php
                                    if (isset($_GET['condo_morada']) && isset($_GET['condo_morada'])) {
                                            $texto = str_replace('*', '%', $_GET['condo_morada']);				
                                            $texto = str_replace('?', '_', $texto);					
                                            $query = $query . " WHERE condo_morada LIKE '$texto'";
                                    } ?>
                          </table>
                          
                      </div>
              </div>
    </div>
         </form>
</section>

