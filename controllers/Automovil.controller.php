<?php

require_once '../models/Automovil.model.php';

if (isset($_POST['operacion'])){

  $automovil = new Automovil();

  if ($_POST['operacion'] == 'listar'){

    $datosObtenidos = $automovil->listar();
    if ($datosObtenidos){
      echo json_encode($datosObtenidos);
    }
  }

  if ($_POST['operacion'] == 'registrar'){
    $respuesta = [
      "status"  => false
    ];

    $datos = [
      "marca"           => $_POST["marca"],
      "modelo"          => $_POST["modelo"],
      "precio"          => $_POST["precio"],
      "tipocombustible" => $_POST["tipocombustible"],
      "color"           => $_POST["color"],
    ];
    $respuesta["status"] = $automovil->registrar($datos);

    echo json_encode($respuesta);
  }

  if ($_POST['operacion'] == 'eliminar'){
    $respuesta = [
      "status"  => false
    ];

    $respuesta["status"] = $automovil->eliminar($_POST['idautomovil']);

    echo json_encode($respuesta);
  }

}