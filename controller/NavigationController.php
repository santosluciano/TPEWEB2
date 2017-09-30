<?php
  include_once('model/MarcasModel.php');
  include_once('view/NavigationView.php');
  /**
   *
   */
  class NavigationController extends Controller
  {
    function __construct()
    {
      $this->view = new NavigationView();
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
