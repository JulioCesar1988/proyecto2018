<?php
 require_once("../modelos/Recurso.php"); 
 require_once("../modelos/connection.php");
 $connection = new Connection(); 
 $connection = $connection->getConnection(); 
 
// Bueno si es administrador  puede ver todos los recursos del sistema , usuarios de otro perfil solo pueden ver los recursos 
// que les fueron asignados . 
if ( $_SESSION['id_rol'] == 3) {  
 $recursos = Recurso::listAll();
 }else {  
$recursos = Recurso::listRecursosUsuario(); } 

 ?>



<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Recursos del sistema</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">
</head>
<body class="hold-transition login-page">
   <?php include '../include/navbar.php';?>

<div class="container">
</div>

<!-- Si no es Administrador no puede agregar recursos -->
   <?php if ( $_SESSION['id_rol'] == 3) {  ?>
          <center>
 <a href="../vistas/add_recurso.php"  class="btn btn-primary" role="button">Agregar</a></center>   
   <?php } ?>    
<div class="container">
  <h2> Recursos </h2>
 


  <table class="table">
    <thead>
      <tr>
        <th></th>
        <th>Nombre</th>
        <th>PATH</th>
        <th>Acceso</th>
      </tr>
    </thead>
    <tbody>
  <?php  foreach ($recursos AS $r)
{   ?>
      <tr>
        <td><img src="../imagen/recurso.png" height="30px;"></td>
        <td><?php echo  $r["nombre"] ?></td>
        <td><?php echo  $r["ip"] ?></td>
        <td> <a target="_blank"  href= "<?php echo  $r["ip"] ?> " ><?php echo  $r["nombre"] ?>  </a></td>

    
<!-- Si no es Administrador no puede agregar recursos -->
   <?php if ( $_SESSION['id_rol'] == 3) { ?>
   
        <th><a  href="../vistas/delete_recurso.php?id_recurso=<?php echo  $r["id_recurso"] ?>"  class="btn btn-danger" role="button" >Eliminar</a></th>
        <th><a  href="../vistas/edit_recurso.php?id_recurso=<?php echo  $r["id_recurso"] ?>"  class="btn btn-warning" role="button" >Modificar</a></th>     

   <?php } ?>



  <?php } ?>
      </tr>
    </tbody>
  </table>
</div>
</body>
</html>

