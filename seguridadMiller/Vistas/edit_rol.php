<?php
 require_once("../modelos/rol.php"); 
 require_once("../modelos/connection.php");
 $connection = new Connection(); 
 $connection = $connection->getConnection();  
 $usuarios = Rol::listAll();
 ?>

<?php

include_once ("../include/params.php");
// Create connection
$conn = new mysqli(Params::$DB_Host,Params::$DB_usuario,Params::$DB_clave,Params::$DB_nombre);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$id_rol = $_GET['id_rol'];
$sql = "SELECT *  FROM rol where id_rol = $id_rol ";
$result = $conn->query($sql);

$nombre = "null";
$id_rol = "null ";


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $nombre = $row["nombre"];
      $id_rol= $row["id_rol"];
           
    }
} else {
    echo "0 results";
}
$conn->close();
?>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<!DOCTYPE html>
<html lang="en">
  <body>
     <?php include '../include/navbar.php';?>
    <div class="row">
      <div class="col-md-offset-4 col-md-4" style="text-align: center;">
        <h4>Modificacion del Rol</h2>
        <div class="content">
          <form action="../controlador/update_rol.php" method="post">
            <div class="form-group">
              <label>Nombre del Rol</label>
              <input class="form-control" type="text" name="nombre" value="<?php echo " $nombre"; ?>" required><br>
            </div>  
               <div class="form-group">
              <label>id_rol</label>
              <input class="form-control" type="text"  name="id_rol" value="<?php echo "$id_rol"; ?>" required><br>
            </div>
            <input type="submit"  class="btn btn-primary" role="button" value="Registrarse">
          </form>
        </div>
      </div>
    </div>
  </body>
</html>