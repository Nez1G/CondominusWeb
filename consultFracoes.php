<?php include('session.php');

        //$id_de_cons = $_SESSION["id_consulta"];
        $idcookie = $_COOKIE["idfrac"];
?>

<section class="wrapper">
    <h3><i class="fa fa-angle-right"></i> Consultar</h3>
            <div class="row mt">
              <div class="col-md-12">
                      <div class="content-panel">
                            <h4><i class="fa fa-angle-right"></i> Fracões</h4>
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

                                $query = "SELECT * FROM fracoes WHERE id_frac=" . $idcookie;  
                                $results =  mysqli_query($connection, $query);



                                while($row = mysqli_fetch_assoc($results)) {
                                    $ref = $row['id_frac'];
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
                <div class="row mt"> 
            <div class="col-md-12">
                    <div class="content-panel">
                        <h4><i class="fa fa-angle-right"></i> Documentos</h4>
                        <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID Doc.</th>
                            <th>Data de emissão</th>
                            <th>Data limite</th>
                            <th>Data de pagamento</th>
                            <th>Montante</th>
                            <th>Multa</th>
                            <th>Estado de Pagamento</th>
                            <th>Documento</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php

                        $query = "SELECT * FROM documentos where id_frac=" . $idcookie;
                        $results =  mysqli_query($connection, $query);

                        while($row = mysqli_fetch_assoc($results)) {
                            ?>
                        <tr>
                                <td><?php echo $row['id_doc']?></td>
                                <td><?php echo $row['data_emissao']?></td>
                                <td><?php echo $row['data_limite']?></td>
                                <td><?php echo $row['data_pagamento']?></td>
                                <td><?php echo $row['montante']?></td>
                                <td><?php echo $row['multa']?></td>
                                <td><?php echo $row['estado_pagamento']?></td>
                                <td><?php echo $row['path_doc']?></td>
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