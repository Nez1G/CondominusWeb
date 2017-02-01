<?php
//include('login.php');
@include 'php/PHPMailerAutoLoad.php';
@include 'php/functions.php';


$connection = dbconnect();
if(isset($_SESSION['login_user'])){
    header("location: menu.php");
}
if (isset($_POST['repor'])) {
    $username=$_POST['username'];
    $username = stripslashes($username);
    $username = mysqli_real_escape_string($connection, $username);
    //$mailnome = mysqli_real_escape_string($_POST["username"]);
    $query_sql = "SELECT user_mail FROM users WHERE user_name='$username'";
    
    $query = mysqli_query($connection, $query_sql);
    $row = mysqli_fetch_assoc($query);
    $mailmail = $row['user_mail'];
    
    $mailpw = randomPassword();
    $query_new = "UPDATE users SET  user_pw='" . sha1($mailpw) . "' where user_name='" . $username . "';";
    $query = mysqli_query($connection, $query_new);

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com;smtp-relay.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'info.condominus@gmail.com';                 // SMTP username
$mail->Password = 'arkham2016';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('info.condominus@gmail.com', 'Condominus SA');
$mail->addAddress($mailmail, $username);     // Add a recipient
//$mail->addAddress('pedrofilipe_17@hotmail.com', 'Pedro Palha');               // Name is optional
$mail->addReplyTo('info.condominus@gmail.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Pedido de nova password';
$mail->Body    = 'This is the HTML message body <b>in bold!</b> and your new password is:' . $mailpw;
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if (($mail->send())) {
        echo    "<script type=\"text/javascript\">".
                    "alert('Envio de nova password feito com sucesso');"
                .   "window.location = 'menu.php';".
                "</script>";

    } 
    else {
        echo "<script type=\"text/javascript\">".
                    "alert('Erro');".
             "</script>";
    }
    $connection->close();
}
?>
<!--
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">
</head>


<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="loginmodal-container">
                    <h1>Recupere a sua password</h1><br>
              <form method="post">
                    <input type="text" name="username" placeholder="Introduza o seu username">
                    <input type="submit" name="submit" class="login loginmodal-submit" value="Login">
              </form>
            </div>
        </div>
</div>
<body>   
        <form class="loginblock" method="post" action="">
            <label>UserName :</label>
            <input id="name" name="username" placeholder="Username" type="text">
            <button name="submit" type="submit">
              <span id="submit" class="state">Recuperar Password</span>
            </button>
        </form>
    
    
 </body>
</html>