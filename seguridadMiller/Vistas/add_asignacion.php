<?php
 require_once("../modelos/usuario.php"); 
 require_once("../modelos/connection.php");
 require_once("../modelos/recurso.php");
 require_once("../modelos/rol.php");
 
 $connection = new Connection(); 
 $connection = $connection->getConnection();  
 $usuarios = Usuario::listAll();
 $recursos = Recurso::ListAll();
 $roles = Rol::ListAll();
 ?>
<!DOCTYPE html>
<html lang="en">

 <head>
   <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Siistema Seguridad Miller</title>
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
  <body class="hold-transition register-page">
     <?php include '../include/navbar.php';?>
    <div class="row">
      <div class="col-md-offset-4 col-md-4" style="text-align: center;">
        <h4>Asociar Usuario con Recursos</h2>
        <div class="content">
          <form action="../controlador/create_asociacion.php" method="post">
            <div class="form-group">
  <label for="sel1">Usuario:</label>
  <select class="form-control" name="id_usuario">
  <?php  foreach ($usuarios AS $u)
{   ?>
 <option value="<?php echo "$u[id_usuario]"; ?>"><?php echo "$u[email]"; ?></option>
<?php } ?>
  </select>
</div>

<div class="form-group">
  <label for="sel1">recurso:</label>
  <select class="form-control" name="id_recurso">
      <?php  foreach ($recursos AS $r)
{   ?>
    <option value="<?php echo "$r[id_recurso]"; ?> "><?php echo "$r[nombre]"; ?></option>
    <?php } ?>
  </select>
</div>


<div class="form-group">
  <label for="sel1"></label>
  <select class="form-control" name="id_rol">
      <?php  foreach ($roles AS $r)
{   ?>
    <option value="<?php echo "$r[id_rol]"; ?> "><?php echo "$r[nombre]"; ?></option>
    <?php } ?>
  </select>
</div>


            <input type="submit" class="btn btn-primary" value="Agregar">
          </form>
        </div>
      </div>
    </div>

  </body>
</html>





