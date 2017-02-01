<?php
include ('session.php');

if($user_rank == 'C'){
        header('Location: menu.php'); 
}
?>
</head>
<section class="wrapper">
    <h3><i class="fa fa-angle-right"></i>Lista de Utilizadores</h3>
                <div class="row mt"> 
                    <div class="col-lg-12">
                        <div class="input-group stylish-input-group">
                            <input type="text" id="texto" class="form-control"  placeholder="Procurar Utilizadores" >
                            <span class="input-group-addon">
                                <button type="submit" onclick="doIt()" value="Procurar">
                                    <span class="glyphicon glyphicon-search"></span>
                                </button>  
                            </span>
                        </div>
                    </div>
                </div>
    
    <div class="row mt">
        <form class="form-horizontal style-form" method="post" id="userstable" action="userStatus.php" onsubmit="return checkForm(this);">
              <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th>Id</th>
                                  <th>Nome</th>
                                  <th>Email</th>
                                  <th>Morada</th>
                                  <th>NIF</th>
                                  <th>Tlm</th>
                                  <th>Rank</th>
                                  <th>Estado</th>                  
                              </tr>
                              </thead>
                              <tbody>
                                  <?php
                                    $query = "SELECT * FROM users";
                                    $results =  mysqli_query($connection, $query);

                                    while($row = mysqli_fetch_assoc($results)) {
                                    $ref = $row['id_user'];
                                    ?>
                              <tr>
                                <td><input type="radio" name="selecionado" value="<?php echo $ref; ?>"/></td>
                                <td><?php echo $row['id_user'];?></td>
                                <td><?php echo $row['user_nicename']?></td>
                                <td><?php echo $row['user_mail']?></td>
                                <td><?php echo $row['user_adress']?></td>
                                <td><?php echo $row['user_nif']?></td>
                                <td><?php echo $row['user_phone']?></td>
                                <td><?php echo $row['user_rank']?></td>
                                <td><?php echo $row['user_status']?></td>
                              </tr>
                               <?php
                                }
                                ?>
                                </tbody>
                                    <?php if($user_rank == 'A'){ ?>
                                    &nbsp; &nbsp;
                                        <button type="submit" name="ativar" class="btn btn-theme" style="background-color: #4CAF50;">Ativar</button> &nbsp; &nbsp;
                                        <button type="submit" name="eliminar" class="btn btn-theme" style="background-color: #f44336;">Desativar</button>
                                         <?php } ?> &nbsp; &nbsp;
                                        <button type="button" class="btn btn-theme" onclick="editUserInfo()">Editar</button> &nbsp; &nbsp;
                                        <button type="button" onclick="carregavers()" class="btn btn-theme">Consultar</button> &nbsp; &nbsp;
                                        <hr>
                          </table>
                      </div>
              </div>
        </form>
                    </div>
</section>