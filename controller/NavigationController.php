<?php
  require_once('model/MarcasModel.php');
  require_once('model/CelularesModel.php');
  require_once('view/NavigationView.php');
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
      $conectado = $this->isConnect();
      $this->view->mostrarIndex($marcas,$conectado);
    }
    public function inicio()
    {
      $celulares = $this->modelCelulares->getAll();
      $this->view->mostrar_inicio($celulares);
    }
    public function showCelulares($params)
    {
      if (isset($params[0])){
        if ($params[0] == "buscar" && isset($_POST['key'])){
          $celulares = $this->modelCelulares->searchByName($_POST['key']);
        }else if ($params[0] == "ordenados"){
          if ($params[1] == "marca"){
            $celulares = $this->modelCelulares->getAllInOrder();
          }
        }else{
          $celulares = $this->modelCelulares->getAllFromMarca($params[0]);
        }
      }else{
        $celulares = $this->modelCelulares->getAll();
      }
      $this->desplegarCelulares($celulares);
    }
    private function desplegarCelulares($celulares){
      try {
        if (empty($celulares))
          throw new Exception('No se encontraron celulares');
        $marcas = $this->modelMarcas->getAll();
        $this->view->mostrarCelulares($celulares,$marcas);
      } catch (Exception $e) {
        $this->view->mostrarError($e->getMessage());
      }
    }
    public function showCelular($params)
    {
      $idCelular = $params[0];
      $celular = $this->modelCelulares->get($idCelular);
      $marca = $this->modelMarcas->get($celular['id_marca']);
      $this->view->mostrarCelular($celular,$marca);
    }
    public function admin()
    {
      parent::__construct();
      $this->view->mostrarPanelAdmin();
    }
  }

 ?>
