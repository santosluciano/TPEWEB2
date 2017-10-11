<?php
  include_once('model/MarcasModel.php');
  include_once('model/CelularesModel.php');
  include_once('view/NavigationView.php');
  /**
   *
   */
 class NavigationController extends SecuredController
  {
    function __construct()
    {
      $this->view = new NavigationView();
      $this->modelMarcas = new MarcasModel();
      $this->modelCelulares = new CelularesModel();
    }
    public function index()
    {
      $marcas = $this->modelMarcas->getAll();
      $this->view->mostrarIndex($marcas);
    }
    public function inicio()
    {
        $this->view->mostrar_inicio();
    }
    public function showCelulares($params)
    {
      if (isset($params[0])){
        if ($params[0] == "buscar" && isset($_POST['key'])){
          $celulares = $this->modelCelulares->searchByName($_POST['key']);
        }else{
          $celulares = $this->modelCelulares->getAllFromMarca($params[0]);
        }
      }else{
        $celulares = $this->modelCelulares->getAll();
      }
      if (!empty($celulares)){
        $this->view->mostrarCelulares($celulares);
      }else{
        $this->view->mostrarError("No se encontraron celulares");
      }
    }
    public function showCelular($params)
    {
      $idCelular = $params[0];
      $celular = $this->modelCelulares->get($idCelular);
      $this->view->mostrarCelular($celular);
    }
    public function admin()
    {
      parent::__construct();
      $this->view->mostrarPanelAdmin();
    }
  }

 ?>
