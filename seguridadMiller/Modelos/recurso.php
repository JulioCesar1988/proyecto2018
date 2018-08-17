<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
?>

<?php


include_once "../include/SeguridadBase.php";
class Recurso  extends SeguridadBase {

 protected $nombre;
 protected $ip;
 protected $id_recurso;

 static public function load($id){
    $query = Recurso::connection()->prepare("SELECT * FROM recurso WHERE (id_recurso = ?)");
    $query->execute(array($id));
    $resultado = $query->fetch(PDO::FETCH_ASSOC);
    $re = new Recurso();
    $re->id_usuario = $resultado["id_recurso"];
    $re->email = $resultado["nombre"];
    $re->nombre = $resultado["ip"];
    return $re;
  }

// Obtenemos el ID del recursos. 
public function getId_recurso(){
  return $this->id_recurso;
}

  // Buscamos el Recurso por nombre.  
  public function fetch($nombre){
    $query = Recurso::connection()->prepare("SELECT * FROM recurso WHERE (nombre = ?)");
    $query->execute(array($nombre));
    return $query->fetch();
  }


 // Recursos para un determinado usuario del sistema .   
  public function listRecursosUsuario() {
   $usuario = $_SESSION['id_usuario'];
    $query = Recurso::connection()->prepare("SELECT * 
                                             FROM recurso 
                                             WHERE id_recurso IN ( SELECT id_recurso 
                                             FROM asignacion 
                                             WHERE (asignacion.id_usuario = $usuario) )");
    $query->execute();
    return $query->fetchAll();
  }



 // Lista de los Recursos para mi rol  ó id usuario.   
  public function listAll() {
    $query = Recurso::connection()->prepare("SELECT * from recurso");
    $query->execute();
    return $query->fetchAll();
  }

  // Alta del recurso . 
  public function insert($nombre, $ip ) {
    $query = Recurso::connection()->prepare("INSERT INTO recurso (nombre,ip) VALUES (?, ? )");
    $query->execute(array($nombre, $ip));
  
  }


  
  // MODIFICAR para la entidad de Recursos. 
  public function search($search_name, $search_last_name, $search_blocked) {
    $query = User::connection()->prepare("SELECT * FROM usuario WHERE (name LIKE ? AND last_name LIKE ? AND blocked = ?)");
    $query->execute(array("%$search_name%", "%$search_last_name%", $search_blocked));
    $users = $query->fetchAll();
  }

 // Cantidad de Recursos
  public function listCant() {
    $query = Recurso::connection()->prepare("SELECT * FROM recurso");
    $query->execute();
    return nt();
  }

// Eliminacion de usuario dado email 
  public function delete($id_recurso) {
      $query = Recurso::connection()->prepare("SELECT id_recurso from recurso WHERE (id_recurso = ?)");
      $query->execute(array($id_recurso));

  }


// Ejemplo de Eliminacion 
 // public function delete($email) {
   //   $query = Usuario::connection()->prepare("SELECT id from usuario WHERE (email = ?)");
   //  $query->execute(array($email));
  //}



// Actualizacion del Recurso .
  public function update($nombre,$ip,$id_recurso) {
    $query = Recurso::connection()->prepare("UPDATE recurso SET nombre = ?, ip = ?  where (id_recurso = ?) ");
    $query->execute(array($nombre , $ip,$id_recurso));
  }

}
?>