<?php

require_once('../model/CelularesModel.php');
require_once('Api.php');
/**
 *
 */
class CelularesApiController extends Api
{
  protected $model;

  function __construct()
  {
      $this->model = new CelularesModel();
  }

  public function getEstadisticas($params = [])
  {
    switch (sizeof($params)) {
      case 1:
        $id_celular = $params[0];
        $celular = $this->model->getEstadistica($id_celular);
        $celular['nota'] = round((array_sum($celular)-$celular['antutu']-$celular['id_celular'])/(count($celular)-2),2); 
        if($celular)
          return $this->json_response($celular, 200);
        else
          return $this->json_response(false, 404);
      default:
        return $this->json_response(false, 404);
        break;
    }
  }
}

 ?>
