<?php
include_once "../include/SeguridadBase.php";
class Usuario  extends SeguridadBase {

 protected $email;
 protected $nombre;
 protected $apellido;
 protected $clave;
 protected $id_rol;
 protected $id_usuario;

// funcion load para cargar los usuarios en combobox
 static public function load($id){
    $query = Usuario::connection()->prepare("SELECT * FROM usuario WHERE (id_usuario = ?)");
    $query->execute(array($id));
    $resultado = $query->fetch(PDO::FETCH_ASSOC);
    $aUsr = new Usuario();
    $aUsr->id_usuario = $resultado["id_usuario"];
    $aUsr->email = $resultado["email"];
    $aUsr->nombre = $resultado["nombre"];
    $aUsr->apellido = $resultado["apellido"];
    $aUsr->clave = $resultado["clave"];
    $aUsr->rol = $resultado["id_rol"];
  
    return $aUsr;
  }

public function getId_usuario(){
  return $this->id_usuario;
}

  // buscamos el email.  
  public function fetch($email){
    $query = Usuario::connection()->prepare("SELECT * FROM usuario WHERE (email = ?)");
    $query->execute(array($email));
    return $query->fetch();
  }

 // modificar con las nuevas tablas.  
  public function listAll() {
    $query = Usuario::connection()->prepare("SELECT  *,usuario.nombre as nombre , rol.nombre as id_rol from usuario inner join rol on (usuario.id_rol = rol.id_rol) ");
    $query->execute();
    return $query->fetchAll();
  }

  public function insert($email, $nombre , $apellido, $clave ,$id_rol) {
    $query = Usuario::connection()->prepare("INSERT INTO usuario (email, nombre, apellido ,clave,id_rol) VALUES (?, ?, ?, ?,? ) ");
    $query->execute(array($email, $nombre, $apellido, $clave,$id_rol));
  
  }

 public function loginCorrect($email, $clave){
    $query = Usuario::connection()->prepare("SELECT * FROM usuario WHERE (email = ? and clave = ?)");
    $query->execute(array($email, $clave));
    return $query->fetch();
  }

  
  // modificar para el nuevo sistema
  public function search($search_name, $search_last_name, $search_blocked) {
    $query = User::connection()->prepare("SELECT * FROM usuario WHERE (name LIKE ? AND last_name LIKE ? AND blocked = ?)");
    $query->execute(array("%$search_name%", "%$search_last_name%", $search_blocked));
    $users = $query->fetchAll();
  }

 // no hace falta modificar 
  public function listCant() {
    $query = Usuario::connection()->prepare("SELECT * FROM usuario");
    $query->execute();
    return nt();
  }

// Eliminacion de usuario dado email  -> SI TIENE ALGUNA ASIGNACION NO TENDRIA QUE PDOER ELIMINAR LOS ELEMENTOS DE LA BD  
  public function delete($email) {
      $query = Usuario::connection()->prepare("SELECT id from usuario WHERE ((usuario.email = ?)AND(Usuario.id_usuario NOT IN (SELECT id_usuario FROM ASIGNACION ) ))");
      $query->execute(array($email));

  }

// modificacion del usuario 
  public function update($email,$nombre,$apellido,$clave,$id_rol,$id_usuario) {
    $query = Usuario::connection()->prepare("UPDATE usuario SET email = ?, nombre = ?, apellido = ? , clave = ?,id_rol = ? where (id_usuario = ?) ");
    $query->execute(array($email , $nombre , $apellido , $clave , $id_rol,$id_usuario));
  }

}
?>