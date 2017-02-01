<?php include('session.php');

        //$id_de_cons = $_SESSION["id_consulta"];
        $idcookie = $_COOKIE["idcons"];
?>

<section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Consultar</h3>
            <div class="row mt">
              <div class="col-md-12">
                      <div class="content-panel">
                            <h4><i class="fa fa-angle-right"></i> Utilizador</h4>
                            <hr>
                          <table class="table">
                            <thead>
                                <tr>
                                  <th>ID</th>
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

                                $query = "SELECT * FROM users where id_user=" . $idcookie;  
                                $results =  mysqli_query($connection, $query);



                                while($row = mysqli_fetch_assoc($results)) {
                                    $ref = $row['id_user'];
                                ?>
                                <tr>
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
                                </table>
                      </div>
              </div>
            </div>
            <div class="row mt"> 
                <div class="col-md-12">
                    <div class="content-panel">
                    <h4><i class="fa fa-angle-right"></i> Condominío</h4>
                    <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
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

                        $query = "SELECT * FROM condominios where id_condo_resp=" . $idcookie;
                        $results =  mysqli_query($connection, $query);



                        while($row = mysqli_fetch_assoc($results)) {
                            ?>
                        <tr>
                                <td><?php echo $row['id_condo'];?></td>
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
                    </table>
                </div>
            </div>
            </div>
                <div class="row mt"> 
            <div class="col-md-12">
                    <div class="content-panel">
                        <h4><i class="fa fa-angle-right"></i> Fração</h4>
                        <hr>
                <table class="table">
                    <thead>
                        <tr>
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

                        $query = "SELECT * FROM fracoes where id_proprietario=" . $idcookie;
                        $results =  mysqli_query($connection, $query);

                        while($row = mysqli_fetch_assoc($results)) {
                            ?>
                        <tr>
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
                    </table>
                </div>
            </div>
            </div>
</section>