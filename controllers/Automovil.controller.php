<?php

require_once '../models/Automovil.php';

if (isset($_POST['operacion'])){

  $automovil = new Automovil();

  if ($_POST['operacion'] == 'listar'){

    $datosObtenidos = $automovil->listar();
    if ($datosObtenidos){
      echo json_encode($datosObtenidos);
    }
  }

  if ($_POST['operacion'] == 'registrar'){
    $datos = [
      "marca"           => $_POST["marca"],
      "modelo"          => $_POST["modelo"],
      "precio"          => $_POST["precio"],
      "tipocombustible" => $_POST["tipocombustible"],
      "color"           => $_POST["color"],
    ];
    
    $respuesta = $automovil->registrar($datos);
    echo json_encode($respuesta);
  }

  if ($_POST['operacion'] == 'eliminar'){
    $respuesta = $automovil->eliminar($_POST['idautomovil']);
    echo json_encode($respuesta);
  }

  if ($_POST['operacion'] == 'obtener') {
    $respuesta = $automovil->obtener($_POST['idautomovil']);
    echo json_encode($respuesta);
  }

  if ($_POST['operacion'] == 'actualizar') {
    $datos = [
      "idautomovil"     => $_POST["idautomovil"],
      "marca"           => $_POST["marca"],
      "modelo"          => $_POST["modelo"],
      "precio"          => $_POST["precio"],
      "tipocombustible" => $_POST["tipocombustible"],
      "color"           => $_POST["color"],
    ];
    
    $respuesta = $automovil->actualizar($datos);
    echo json_encode($respuesta);
  }

}

?>