

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Navbar Template for Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="../../dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="navbar.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>



<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
  <nav class="navbar  navbar navbar-default" >
  <div class="container-fluid">
    <div class="navbar-header"> 
      <a class="navbar-brand"  href="/seguridadMiller"  >  <span class="logo-lg"><b>MILLER </b>SISTEMAS </span></a>
      

    </div>
    <ul class="nav navbar-nav navbar-right">
 <?php    if (isset($_SESSION['email'])) { ?>    
      <ul class="nav navbar-nav">

      

   <?php if ( $_SESSION['id_rol'] == 3) {  ?>
      <li><a href="/seguridadMiller/vistas/show_usuarios.php">Usuarios</a></li>
      <li><a href="/seguridadMiller/vistas/show_roles.php">Roles</a></li>
      <li><a href="/seguridadMiller/vistas/show_asignaciones.php">Asignacion</a></li>
  
    <?php  }?>

      
      <li><a href="/seguridadMiller/vistas/show_recursos.php">Recursos</a></li>  

       



    </ul>
      <li> <a href=""> <span Class="fa fa-fw fa-user"></span><?php echo "Usuario : " . $_SESSION["email"]; ?> </a> <li>
      <li><a href="/seguridadMiller/controlador/logout.php"> <span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
     <?php } ?>
      <?php    if (!isset($_SESSION['email'])) { ?>   
      <li><a href="/seguridadMiller/vistas/login.php"> <span class="glyphicon glyphicon-log-in"></span> Ingresar</a></li>
      <?php } ?>
    </ul>
  </div>
</nav



