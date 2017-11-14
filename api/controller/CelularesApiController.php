<?php

require_once('../model/CelularesModel.php');
require_once('ApiSecuredController.php');
/**
 *
 */
class CelularesApiController extends ApiSecuredController
{
  protected $model;

  function __construct()
  {
    parent::__construct();
    $this->model = new CelularesModel();
  }

  public function getEstadisticas($params = [])
  {
    $id_celular = $params[':id'];
    $celular = $this->model->getEstadistica($id_celular);
    if($celular){
      $celular['nota'] = round((array_sum($celular)-$celular['antutu']-$celular['id_celular'])/(count($celular)-2),2); 
      return $this->json_response($celular, 200);
    }
    else
      return $this->json_response(false, 404);  
  }
}

 ?>
