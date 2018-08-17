<?php
 require_once("../modelos/recurso.php"); 
 require_once("../modelos/connection.php");
 
 $connection = new Connection(); 
 $connection = $connection->getConnection();  
 $usuarios = Recurso::listAll();
 ?>

<?php

include_once ("../include/params.php");
// Create connection
$conn = new mysqli(Params::$DB_Host,Params::$DB_usuario,Params::$DB_clave,Params::$DB_nombre);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$id_recurso = $_GET['id_recurso'];

$sql = "SELECT *  FROM recurso where id_recurso = $id_recurso ";
$result = $conn->query($sql);

$nombre = "null";
$ip = "null ";


if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $nombre = $row["nombre"];
      $ip = $row["ip"];
           
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
        <h4>Modificacion del Recurso</h2>
        <div class="content">
          <form action="../controlador/update_recurso.php" method="post">
            <div class="form-group">
              <label>Nombre</label>
              <input class="form-control" type="text" name="nombre" value="<?php echo " $nombre"; ?>" required><br>
            </div>
            <div class="form-group">
              <label>ip</label>
              <input class="form-control" type="text" name="ip" value="<?php echo " $ip"; ?>" required><br>
            </div>

               <div class="form-group">
              <label>id_recurso</label>
              <input class="form-control" type="text"  name="id_recurso" value="<?php echo "$id_recurso"; ?>" required><br>
            </div>
    

          

            <input type="submit"  class="btn btn-primary" role="button" value="Registrarse">
          </form>
        </div>
      </div>
    </div>

  </body>
</html>