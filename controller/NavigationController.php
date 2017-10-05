<?php
  include_once('model/MarcasModel.php');
  include_once('model/CelularesModel.php');
  include_once('view/NavigationView.php');
  /**
   *
   */
  class NavigationController extends Controller
  {
    function __construct()
    {
      $this->view = new NavigationView();
      $this->modelMarcas = new MarcasModel();
      $this->modelCelulares = new CelularesModel();
    }
    public function index()
    {
      $marcas = $this->modelMarcas->getMarcas();
      $this->view->mostrarIndex($marcas);
    }
    public function inicio($params)
    {
      if ((isset($params[0]))&&($params[0]=="partial")){
        $this->view->mostrar_inicio();
      }else {
        $this->index();
      }
    }
    public function showCelulares($params)
    {
      $celulares = $this->modelCelulares->getCelulares();
      $this->view->mostrarCelulares($celulares);
    }
    public function showCelular()
    {
      $celular = $this->modelCelular->getCelular($idCelular);
      $this->view->mostrarCelulares($celular);
    }
  }

 ?>
