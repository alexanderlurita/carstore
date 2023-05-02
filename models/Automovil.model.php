<?php

require_once 'Conexion.php';

class Automovil extends Conexion{

  private $conexion;

  public function __CONSTRUCT() {
    $this->conexion = parent::getConexion();
  }

  public function listar() {
    try{
      $consulta = $this->conexion->prepare("CALL spu_automoviles_listar()");
      $consulta->execute();
      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }

  public function registrar($datos = []) {
    try {
      $consulta = $this->conexion->prepare("CALL spu_automoviles_registrar(?,?,?,?,?)");
      $consulta->execute(
        array(
          $datos["marca"],
          $datos["modelo"],
          $datos["precio"],
          $datos["tipocombustible"],
          $datos["color"]
        )
      );
      return $consulta;
    } catch(Exception $e) {
      die($e->getMessage());
    }
  }

  public function eliminar($idautomovil) {
    try {
      $consulta = $this->conexion->prepare("CALL spu_automoviles_eliminar(?)");
      $consulta->execute(array($idautomovil));

      return $consulta;
    } catch(Exception $e) {
      die($e->getMessage());
      //return "Se produjo un error: " . $e->getCode();
    }
  }

  
}

?>