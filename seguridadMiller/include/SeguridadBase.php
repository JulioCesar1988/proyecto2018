
<?php


class SeguridadBase {
   
   
// Start the session

   // conexion con la bd 
	static protected function connection() {
    $connection = new Connection();
    $connection = $connection->getConnection();
    return $connection;
  }

}