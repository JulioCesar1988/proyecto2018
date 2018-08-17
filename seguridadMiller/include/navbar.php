<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>
  <nav class="navbar navbar-default" >
  <div class="container-fluid">
    <div class="navbar-header"> 
      <a class="navbar-brand" href="/seguridadMiller" >Miller Sistema</a>
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



