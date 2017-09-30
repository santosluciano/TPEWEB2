<?php
  include_once('model/MarcasModel.php');
  include_once('view/MarcasView.php');
  /**
   *
   */
  class MarcasController extends Controller
  {
    function __construct()
    {
      $this->view = new MarcasView();
      $this->model = new MarcasModel();
    }
    public function index()
    {
      $marcas = $this->model->getMarcas();
      $this->view->mostrar_marcas($marcas);
    }
    public function inicio()
    {
      $this->view->mostrar_inicio();
    }
  }

 ?>
