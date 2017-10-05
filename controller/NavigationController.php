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
    public function inicio()
    {
        $this->view->mostrar_inicio();
    }
    public function showCelulares($params)
    {
      if (isset($params[0])){
        if ($params[0] == "buscar"){
          $celulares = $this->modelCelulares->buscarCelular($params[1]);
        }else{
          $celulares = $this->modelCelulares->getCelularesMarca($params[0]);
        }
      }else{
        $celulares = $this->modelCelulares->getCelulares();
      }
      $this->view->mostrarCelulares($celulares);
    }
    public function showCelular()
    {
      $celular = $this->modelCelular->getCelular($idCelular);
      $this->view->mostrarCelulares($celular);
    }
  }

 ?>
