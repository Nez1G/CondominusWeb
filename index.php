<?php
include('login.php');
include('recoverpw.php');

if(isset($_SESSION['login_user'])){
    header("location: menu.php");
}
?>
<html>

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Condominus</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/landing-page.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css"/>
    <link rel="stylesheet" href="css/style-responsive.css" type="text/css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top topnav" role="navigation" style="background-color:#ffd777;">
        <div class="container topnav">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img style="height: 70px; width:115px;float: left;" src="img/logo.png">
                <a class="navbar-brand topnav" href="#">Condominus</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="#about">Home</a>
                    </li>
                    <li>
                        <a href="#" data-toggle="modal" data-target="#login-modal">Login</a>
                    </li>
                    <li>
                        <a href="#section1">Sobre Nos</a>
                    </li>
                    <li>
                        <a href="#section2">Equipa</a>
                    </li>
                    <li>
                        <a href="#section3">Contactos</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <!-- Header -->
    <a name="about"></a>
    <div class="intro-header">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1>Condominus</h1>
                        <h3>Empresa de Gestao de Condominios</h3>
                        <hr class="intro-divider">
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->

    <!-- Page Content -->

    <div id="section1" class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    
                    
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Sobre Nós</h2>
                    <p class="lead">Condominus.Lda, e uma empresa com um vasto leque de clientes e a sua missao e garantir o bem-estar, o conforto e tranquilidade dos seus condominos. 
Foi constituida em Setembro de 2016, tem sede no Campos de Azurém, n.º 77, Universidade do Minho, cidade de Guimaraes</p>
                    <h3 class="section-heading">Objectivo</h3>
                    <p class="lead">Foi criada com o objectivo de efectuar a gestao de condominios com profissionalismo, rigor, dedicacao, empenho e transparencia em todos os servicos.
 
Para os seus quadros contratou pessoas qualificadas, com um vasto conhecimento na area.
Adopta um modelo de gestao singular, transparente, com principios muito solidos e rigorosos, o qual permite uma reducao efectiva dos custos.
 
Conta com a colaboracao de um jurista, que apoia a Administracao na resolucao de assuntos relacionados com o condominio.
</p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="img/img3.jpg" alt="" style="margin-top: 40%;margin-left: -15%">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

    <div id="section2" class="content-section-b">

        <div class="container">

            <div class="row">
                <div class="col-lg-12 col-sm-12  col-md-12">
                    <h2 class="section-heading">Equipa</h2>
                    <hr class="section-heading-spacer">
                    <br>
                    <table border="0" cellpadding="0" cellspacing="0">
                      <tr>
                       <td>
                           <img class="fotos hvr-bob" src="img/andre.jpg" alt="">
                                        <h3 class="section-heading">   Andre Borges</h3>
                       </td>
                       <td>
                        <div class="alinhamento">
                            <img class="fotos hvr-bob" src="img/ines.jpg" alt="">
                                        <h3 class="section-heading"> Ines Pereira</h3>
                                        </div>
                       </td>
                       <td>
                         <div class="alinhamento">
                             <img class="fotos" src="img/maria.JPG" alt="">
                                        <h3 class="section-heading"> Maria Oliveira</h3>
                                        </div>
                       </td>
                      </tr>
                      <tr>
                       <td>
                        <div class="alinhamento">
                                        <img class="fotos hvr-bob" src="img/pedro.foto.jpg" alt="">
                                        <h3 class="section-heading">Pedro Palha</h3>
                                        </div>
                       </td>
                       <td>
                           <img class="fotos hvr-bob" src="img/nuno.alves.jpg" alt="">
                                        <h3 class="section-heading">   Nuno Alves</h3>
                       </td>
                       <td>
                           <img class="fotos hvr-bob" src="img/ricardo.jpg" alt="">
                                        <h3 class="section-heading">  Ricardo Duarte</h3>
                       </td>
                      </tr>
                     </table>
                </div>
                
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-b -->

    <div id="section3" class="content-section-a">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-sm-6">
                     <h2 class="section-heading">Contatos</h2>
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h4 class="section-heading">Morada</h4>
                    <p class="lead">Rua Campos de Azurem nº7779 4999-000 Guimaraes</p>
                    <h4 class="section-heading">Mail</h4>
                    <p class="lead">Rua Campos de Azurem nº7779 4999-000 Guimaraes</p>
                    <h4 class="section-heading">Telefone</h4>
                    <p class="lead">259738200</p>
                    
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="img/Imagem1.png" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li>
                            <a href="#">Home</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            
                        <li>
                            <a href="#clientlogin.php">Login</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#section1">Sobre Nós</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#section2">Equipa</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="#section3">Contatos</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                    </ul>
                    <p class="copyright text-muted small">Copyright &copy; Condominus 2017. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="login-modal" class="modal fade">
    <div class="loginmodal-container">
        <form class="form-login" method="post">
                <h2 class="form-login-heading">condominus</h2>
                <div class="login-wrap">
                    <input type="text" class="form-control" name="username" placeholder="Username" autofocus required>
                    <br>
                    <input type="password" class="form-control" name="password" placeholder="Password" required>
                    <label class="checkbox">
                        <span class="pull-right">
                            <a data-toggle="modal" data-target="#myModal"> Esqueceu-se da password?</a>
                        </span>
                    </label>
                    <button class="btn btn-theme btn-block" type="submit" name="submit" value="Login"><i class="fa fa-lock"></i> ENTRAR</button>
                    <hr>
                </div>
        </form>
    </div>
</div>	          
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
<div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Esqueceu-se da password ?</h4>
        </div>
        <form method="post">
        <div class="modal-body">
            <p>Introduz o teu username</p>
            <input type="text" name="username" placeholder="Username" autocomplete="off" class="form-control placeholder-no-fix" required>

        </div>
        <div class="modal-footer">
            <button data-dismiss="modal" class="btn btn-default" type="button">Cancelar</button>
            <button class="btn btn-theme" name="repor" type="submit">Ok</button>
        </div>
        </form>
    </div>
</div>
</div> 
	  	
</body>
</html>