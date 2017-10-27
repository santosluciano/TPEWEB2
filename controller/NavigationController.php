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
    public function searchSugerenciasCelulares(){
      $celulares = (!empty($_POST['key']))?$this->modelCelulares->searchByName($_POST['key'],4):[];
      $marcas = $this->modelMarcas->getAll();
      $this->view->mostrarSugerencias($celulares,$marcas);
    }
    public function searchCelulares(){
      $celulares = (!empty($_POST['key']))?$this->modelCelulares->searchByName($_POST['key'],1000):[];
      $this->desplegarCelulares($celulares);
    }
    public function showCelularesOrdenadosMarca(){
      $celulares = $this->modelCelulares->getAllInOrder();
      $this->desplegarCelulares($celulares);      
    }
    public function showCelularesMarca($params){
      $celulares = $this->modelCelulares->getAllFromMarca($params[':id']);
      $this->desplegarCelulares($celulares);
    }
    public function showCelulares(){
      $celulares = $this->modelCelulares->getAll();
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
    public function showCelular($params = [])
    {
      try{
        $idCelular = $params[':id'];
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
      $this->isActive();
      $this->view->mostrarPanelAdmin();
    }
  }

 ?>
