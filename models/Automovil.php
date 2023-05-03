<?php

require_once 'Conexion.php';

class Automovil extends Conexion{

  private $conexion;

  //Constructor
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
    $respuesta = [
      "status"  => false,
      "message" => ""
    ];
    try {
      $consulta = $this->conexion->prepare("CALL spu_automoviles_registrar(?,?,?,?,?)");
      $respuesta["status"] = $consulta->execute(
        array(
          $datos["marca"],
          $datos["modelo"],
          $datos["precio"],
          $datos["tipocombustible"],
          $datos["color"]
        )
      );
    } catch(Exception $e) {
      $respuesta["message"] = "No se ha podido completar el proceso. Código de error: " . $e->getCode();
    }

    return $respuesta;
  }
  
  public function eliminar($idautomovil = 0) {
    $respuesta = [
      "status"  => false,
      "message" => ""
    ];
    try {
      $consulta = $this->conexion->prepare("CALL spu_automoviles_eliminar(?)");
      $respuesta["status"] = $consulta->execute(array($idautomovil));
    } catch(Exception $e) {
      $respuesta["message"] = "No se ha podido completar el proceso. Código de error: " . $e->getCode();
    }
    
    return $respuesta;
  }
  
  public function obtener($idautomovil = 0) {
    try {
      $consulta = $this->conexion->prepare("CALL spu_automoviles_obtener(?)");
      $consulta->execute(array($idautomovil));
      return $consulta->fetch(PDO::FETCH_ASSOC);
    } catch(Exception $e) {
      die($e->getMessage());
    }
  }
  
  public function actualizar($datos = []) {
    $respuesta = [
      "status"  => false,
      "message" => ""
    ];
    try {
      $consulta = $this->conexion->prepare("CALL spu_automoviles_actualizar(?,?,?,?,?,?)");
      $respuesta["status"] = $consulta->execute(
        array(
          $datos["idautomovil"],
          $datos["marca"],
          $datos["modelo"],
          $datos["precio"],
          $datos["tipocombustible"],
          $datos["color"]
        )
      );
    } catch(Exception $e) {
      $respuesta["message"] = "No se ha podido completar el proceso. Código de error: " . $e->getCode();
    }

    return $respuesta;
  }

  
}

?>