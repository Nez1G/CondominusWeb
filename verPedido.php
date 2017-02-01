<?php
include('session.php');

if($user_rank == 'C'){
        header('Location: menu.php'); 
}
?>
<section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Lista de Pedidos</h3>
                <div class="row mt"> 
                    <div class="col-lg-12">
                        <div class="input-group stylish-input-group">
                            <input type="text" id="texto" class="form-control"  placeholder="Procurar Pedidos" >
                            <span class="input-group-addon">
                                <button type="submit" onclick="doIt()" value="Procurar">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>  
                            </span>
                        </div>
                    </div>
                </div>
    
    <div class="row mt">
        <form class="form-horizontal style-form" method="post" action="eliminarPedido.php" onsubmit="return checkForm(this);">
              <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>ID</th>
                                  <th>Motivo</th>
                                  <th>Problemas e aspectos a melhorar</th>
                                  <th>email</th>
                              </tr>
                              </thead>
                              <tbody>
                                  <?php
                                    $query = "SELECT * FROM pedidos";
                                    $results =  mysqli_query($connection, $query);

                                    while($row = mysqli_fetch_assoc($results)) {
                                    $ref = $row['id_pedido'];
                                    ?>
                              <tr>
                                <td><input type="radio" name="selecionado" value="<?php echo $ref; ?>"/></td>
                                <td><?php echo $row['id_pedido'];?></td>
                                <td><?php echo $row['titulo_pedido']?></td>
                                <td><?php echo $row['descricao_pedido']?></td>
                                <td><?php echo $row['mail_pedido']?></td>
                              </tr>
                               <?php
                                }
                                ?>
                                </tbody>
                                    <?php if(($user_rank == 'F') || ($user_rank == 'A')){ ?>
                                    &nbsp; &nbsp;
                                    <button type="submit" name="eliminar" class="btn btn-theme" style="background-color: #f44336;">Eliminar</button>
                                    <?php } ?>
                          </table>
                      </div>
              </div>
        </form>
    </div>
</section>

