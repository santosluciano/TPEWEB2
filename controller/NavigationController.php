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
          if (isset($params[1])&&($params[1]=="sugerencia")){
            $celulares = (!empty($_POST['key']))?$this->modelCelulares->searchByName($_POST['key'],4):[];
          }
          else{
            $celulares = (!empty($_POST['key']))?$this->modelCelulares->searchByName($_POST['key'],1000):[];
          }
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
      if (isset($params[1])&&($params[1]=="sugerencia")){
        $marcas = $this->modelMarcas->getAll();
        $this->view->mostrarSugerencias($celulares,$marcas);
      }else {
        $this->desplegarCelulares($celulares);
      }
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
    public function showCelular($params = [])
    {
      try{
        if (!isset($params[0]))
          throw new Exception('Celular invalido');
        $idCelular = $params[0];
        $celular = $this->modelCelulares->get($idCelular);
        $especificacion = $this->modelCelulares->getEspecificacion($idCelular);
        if (empty($celular))
          throw new Exception('Celular invalido');
        $marca = $this->modelMarcas->get($celular['id_marca']);
        $this->view->mostrarCelular($celular,$marca,$especificacion);
      } catch (Exception $e) {
        $this->view->mostrarError($e->getMessage());
      }
    }
    public function admin()
    {
      parent::__construct();
      $this->view->mostrarPanelAdmin();
    }
  }

 ?>
