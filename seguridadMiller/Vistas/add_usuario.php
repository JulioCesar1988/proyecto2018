<?php
  require_once("../modelos/usuario.php"); 
 require_once("../modelos/connection.php");
 require_once("../modelos/rol.php");
 $connection = new Connection(); 
 $connection = $connection->getConnection();  
 $usuarios = Usuario::listAll();
 $roles = Rol::ListAll();
 ?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->


  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">

</head>
 <?php include '../include/navbar.php';?>
<body class="hold-transition register-page">
 
<div class="register-box">
  <div class="register-logo">
    <a href=".."><b>Agregar usuario</b>LTE</a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Registrar a un nuevo usuario</p>

    <form action="../controlador/create_usuario.php" method="post">

      <div class="form-group has-feedback">
        <input type="text" class="form-control"  name="nombre" placeholder="Nombre">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" name="apellido"placeholder="Apellido">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
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

      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="clave" placeholder="clave">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
     

      <div class="row">
      
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Agregar</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    

  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>






















