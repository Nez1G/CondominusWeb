      <?php
include('session.php');
//include('php/userReg.php');
include ('php/functions.php');

$user_rank=$_SESSION['user_rank'];
$user_id=$_SESSION['user_id'];

?>

<html>
  <head>
    <meta charset="utf-8">
    
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  
  <!-- Form Validation plugin com jquery -->
 
  <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.1/jquery.validate.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">


<script type="text/javascript" src="js/form-validation.js"></script>
<script src="js/addFields.js"></script>


<script src="js/functions.js"></script>
<script src="js/myscripts.js"></script>
<script src="js/login.js"></script>
    <!-- Bootstrap core CSS -->
    <!--<link href="css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    
        
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet">
  
    <!--<script type="text/javascript" src="js/loadpage.js"></script>-->
 <!--
 <script>
        $(document).ready(function(){
    var trigger = $('#nav-accordion li a'),
        container = $('#main-content');
        
    trigger.on('click', function(){
        var $this = $(this);
        target = $this.data('target');
        
        container.load(target + '.php');
        
        return false;
    });
});
</script> -->
    <script>
            $(document).ready(function(){
            $('#password1, #password2').on('keyup', function () {
                if ($('#password1').val() == $('#password2').val()) {
                    $('#errorpw').html('Matching').css('color', 'green');
                } else 
                    $('#errorpw').html('Not Matching').css('color', 'red');
            });
        });
        </script>
  </head>

  <body>

  <section id="container" >
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
     
            <a href="menu.php" class="logo"><b>CONDOMINUS</b></a>
       
            
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="logout.php">Logout</a></li>
            	</ul>
            </div>
        </header>
      <aside>
          <div id="sidebar"  class="nav-collapse ">
 
              <ul class="sidebar-menu" id="nav-accordion">
              
                  <p class="centered"><a onclick="loadUser()" style="cursor: pointer;"><img src="img/user.png" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo $login_session ?></h5>

              	  
                  <?php if(($user_rank == 'A') || ($user_rank == 'F') || ($user_rank == 'C')){ ?>	
                  <li class="load" onclick="loadDashboard()" loadUser()>
                      <a class="active">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <li href="#" onclick="loadUser()" style="cursor: pointer;">
                      <a>
                          <i class="fa fa-user"></i>
                          <span>Perfil</span>
                      </a>
                  </li>
                  <?php 
                  }
                  ?>
                   <?php if($user_rank == 'C'){ ?>
                  <li href="#" onclick="loadInfo()" style="cursor: pointer;">
                      <a>
                          <i class="fa fa-info-circle"></i>
                          <span>Informações da Fração</span>
                      </a>
                  </li>
                  <li href="#" onclick="loadEfetuarPedido()" style="cursor: pointer;">
                      <a>
                          <i class="fa fa-envelope-o"></i>
                          <span>Efetuar Pedido</span>
                      </a>
                  </li>
                  <?php 
                  }
                  ?>

                  <?php if(($user_rank == 'A') ||($user_rank == 'F')){ ?>

                  <li href="#" onclick="loadVerPedidos()" style="cursor: pointer;">
                      <a>
                          <i class="fa fa-envelope-o"></i>
                          <span>Ver Pedidos</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Utilizadores</span>
                      </a>
                      <ul class="sub">
                          <li href="#" onclick="loadAddUser()" style="cursor: pointer;"><a>Adicionar Utilizador</a></li>
                          <li href="#" onclick="loadUsersTable()" style="cursor: pointer;"><a>Consultar Utilizadores</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-building"></i>
                          <span>Condomínios</span>
                      </a>
                      <ul class="sub">
                          <li href="#" onclick="loadAddCond()" style="cursor: pointer;"><a>Criar Condomínio</a></li>
                          <li href="#" onclick="loadCondTable()" style="cursor: pointer;"><a>Consultar Condomínios</a></li>
                      </ul>
                    </li>
                    <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-home"></i>
                          <span>Frações</span>
                      </a>
                      <ul class="sub">
                          <li href="#" onclick="loadAddFrac()" style="cursor: pointer;"><a>Criar Frações</a></li>
                          <li href="#" onclick="loadFracTable()" style="cursor: pointer;"><a>Consultar Frações</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-calendar"></i>
                          <span>Eventos</span>
                      </a>
                      <ul class="sub">
                          <li href="#" onclick="loadEvents()" style="cursor: pointer;"><a>Criar Evento</a></li>
                          <li href="#" onclick="loadEventsTable()" style="cursor: pointer;"><a>Consultar Eventos</a></li>
                      </ul>
                  </li>
                  <?php 
                  }
                  ?>

              </ul>
    
          </div>
      </aside>

    <section id="main-content">
    <?php include('dashboard.php') ?>
    </section>
  </section>
      
    <script src="js/common-scripts.js"></script>
    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <!--<script src="js/bootstrap.min.js"></script>-->
    <script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
    <!--<script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>

    <!--script for this page-->
    <!--<script src="js/jquery-ui-1.9.2.custom.min.js"></script>-->

	<!--<script src="js/bootstrap-switch.js"></script>-->
    
	<!--custom tagsinput-->
	<script src="js/jquery.tagsinput.js"></script>
	
    
  <!--<script>
      //custom select box

      $(function(){
          $('select.styled').customSelect();
      });

  </script>-->
<div class="loadingajax"><!-- Place at bottom of page --></div>
  </body>
</html>
