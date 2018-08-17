        <?php
          require_once("../modelos/connection.php");
          require_once("../modelos/usuario.php");

          $email = $_POST['email'];
          $clave = $_POST['clave'];
   
          echo $_POST['email'];
          echo $_POST['clave'];

          $connection = new Connection();
          $connection = $connection->getConnection();

          $user = new Usuario();
          if($row = $user->loginCorrect($email, $clave)){ 
            // Existe user
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['clave'] = $clave;
            $_SESSION['nombre'] = $row['nombre'];
            $_SESSION['apellido'] = $row['apellido'];
            $_SESSION['id_rol'] = $row['id_rol'];
            $_SESSION['id_usuario'] = $row['id_usuario'];
      

            header('location:/seguridadMiller/vistas/show_recursos.php');


          }
          else {
            // Que lo vuelva a intentar. 
            header('location:../vistas/login.php');
        
            
          }
        ?>
