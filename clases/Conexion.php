<?php
class Conexion extends PDO { 
	private $motor = 'mysql';
   private $host = 'localhost';
   protected $database1 = 'inventario';
   private $usuario = 'root'; 
   private $contrasenia = 'manu';

	
   public function __construct() {
      try{
         parent::__construct($this->motor.':host='.$this->host.';dbname='.$this->database1, $this->usuario, $this->contrasenia,array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING,PDO::ATTR_PERSISTENT => true,PDO::ATTR_EMULATE_PREPARES => false));
      }catch(PDOException $e){
         echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
         exit;
      }
   }
}
?>
