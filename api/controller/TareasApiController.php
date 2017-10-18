<?php

require_once('../model/MarcasModel.php');
require_once('Api.php');
/**
 *
 */
class TareasApiController extends Api
{
  protected $model;

  function __construct()
  {
      $this->model = new MarcasModel();
//      $this->palabrasProhibidasModel = new PalabrasProhibidasModel();
  }

  public function getTareas($params = [])
  {
    switch (sizeof($params)) {
      case 0:
        $tareas = $this->model->getAll();
        return $this->json_response($tareas, 200);
        break;
      case 1:
        $id_tarea = $params[0];
        $tarea = $this->model->get($id_tarea);
        if($tarea)
          return $this->json_response($tarea, 200);
        else
          return $this->json_response(false, 404);
      default:
        return $this->json_response(false, 404);
        break;
    }
  }
}

 ?>
