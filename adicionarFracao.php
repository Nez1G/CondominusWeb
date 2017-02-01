<?php
include_once ('session.php');

$user_rank=$_SESSION['user_rank'];
$user_id=$_SESSION['user_id'];
$user_nicename=$login_session;
$idProprietario = "";
$numPorta = "";
$numAndar = "";
$area = "";
$nome = "";
$nif_resp = "";
$idCondominio = "";
$idFracaoSelec = $_GET['id_frac'];

    if($user_rank == 'C'){
        header('Location: dashboard.php');
    }
/*    
    if (isset($_GET['id_frac'])) {
        $sql = "SELECT id_condo, id_proprietario, andar_frac, num_porta, area_frac"
        . "  FROM fracoes WHERE id_frac=$idFracaoSelec";
        $resquery = efetuar_query($sql, array($_GET['id_frac']));         
        if (count($resquery) == 1) {
            $idProprietario = $resquery[0]['id_proprietario'];
            $numPorta= $resquery[0]['num_porta'];
            $numAndar= $resquery[0]['andar_frac'];
            $area= $resquery[0]['area_frac'];
            $idCondominio= $resquery[0]['id_condo'];
        }
        if(isset($_POST['idCondominio'])){
            $sql1 = "UPDATE fracoes SET id_condo='{0}', id_proprietario='{1}', andar_frac='{2}',"
                . "num_porta='{3}', area_frac='{4}' WHERE id_frac=$idFracaoSelec";
            $valores1 = array($_POST['idCondominio'], $_POST['idProprietario'], $_POST['numPorta']
                , $_POST['numAndar'], $_POST['area']);
        efetuar_insert_update($sql1, $valores1);
        }
        }elseif(isset($_POST['idCondominio'])){
            $sql = "INSERT INTO fracoes (id_condo, id_proprietario,"
                    . "andar_frac, num_porta, area_frac) VALUES ('{0}','{1}','{2}','{3}','{4}')";
            $valores = array($_POST['idCondominio'], $_POST['idProprietario'], $_POST['numPorta']
                    , $_POST['numAndar'], $_POST['area']);
            efetuar_insert_update($sql, $valores);
        }*/
?>
<section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Criar Fração</h3>
        <div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                      
                      <form class="form-horizontal style-form" method="post" name="condoForm" action="fracoesRegistar.php" onsubmit="return checkForm(this);">
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Condomínio</label>
                    <div class="col-sm-10">
                        <select name="idCondominio" type="text" class="form-control" required>
                             <?php
                            $query = "SELECT * FROM condominios WHERE estado = '1'";
                            $results =  mysqli_query($connection, $query);
                            while($row = mysqli_fetch_assoc($results)) {
                            ?>
                            <option value="<?php echo $row['id_condo']?>"><?php echo $row['condo_morada']; echo ' - '; echo $row['condo_cod_postal']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Andar</label>
                    <div class="col-sm-10">
                        <input name="numAndar" type="number" value="<?php echo $numAndar;?>" min="0" max="<?php echo 'max_andares($_POST[idCondominio])'; ?>" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Fração</label>
                    <div class="col-sm-10">
                        <input name="numPorta" value="<?php echo $numPorta;?>" type="text" pattern="[A-Z]{1}" title="Nome da fração com letra maiúscula Ex: A" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Proprietário</label>
                    <div class="col-sm-10">
                        <select name="idProprietario" type="text" class="form-control" required>
                             <?php
                            $query = "SELECT * FROM users WHERE user_status = '1'";
                            $results =  mysqli_query($connection, $query);
                            while($row = mysqli_fetch_assoc($results)) {
                            ?>
                            <option value="<?php echo $row['id_user']?>"><?php echo $row['user_nicename']; echo ' - '; echo $row['user_nif']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Nome do responsável pelo pagamento</label>
                    <div class="col-sm-10">
                        <input name="nome" type="text" value="<?php echo $nome;?>" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">NIF do responsável pelo pagamento</label>
                    <div class="col-sm-10">
                        <input name="nif" type="text" pattern="[0-9]{9}" title="NIF tem de conter 9 dígitos" class="form-control" required
                               value="<?php echo $nif_resp; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">Área (m²)</label>
                    <div class="col-sm-10">
                        <input name="area" value="<?php echo $area;?>" type="number" min="0" class="form-control" required>
                    </div>
                </div>
                
                <button type="submit" action="<?php atualizarModalidade() ?>" class="btn btn-theme">Adicionar</button> &nbsp; &nbsp;
                <button type="reset" class="btn btn-theme">Reset</button>
            </form>
            </div>
        </div>
    </div>
</section>

<?php function max_andares($idCondominio){
    $connection = dbconnect();
    $idCondominio = mysqli_real_escape_string($connection, $idCondominio);
    $query = "SELECT condo_andares FROM condominios WHERE id_condo = '$idCondominio'";
    $results =  mysqli_query($connection, $query);
    $andares = mysqli_fetch_assoc($results);
        return $andares[condo_andares];
    
}
