<?php
include('session.php');

if($user_rank == 'C'){
        header('Location: painel.php'); 
}

 
?>
<h1>Consultar Utilizadores</h1>
<hr>
<br>
    <form id="userstable" method="post" action="userStatus.php" onsubmit="return checkForm(this);">
    <table class="table" id="tbl">
        <div class="message"><?php if(isset($message)) echo $message; ?></div>
    <thead>
        <tr>
            <td></td>
            <td>ID </td>
            <td>Nome: </td>
            <td>E-Mail: </td>
            <td>Morada: </td>
            <td>NIF: </td>
            <td>Contacto: </td>
            <td>Perfil: </td>
            <td>Estado: </td>
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
        <?php
        if(($user_rank == 'F') || ($user_rank == 'A')){
        echo '<input type="button" value="Editar" onclick="editUserInfo()" class="btnCons">';
        echo '<input type="submit" name="eliminar" value="Eliminar" class="btnCons">';
        echo '<input type="submit" name="ativar" value="Ativar" class="btnCons">';
        }
        ?>

        <input type="button" value="Consultar" id="testando" onclick="carregavers()" class="btnCons">

</table>
</form>