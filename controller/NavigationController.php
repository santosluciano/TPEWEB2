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
      $this->modelUsuarios = new UsuariosModel();
    }
    public function index()
    {
      $marcas = $this->modelMarcas->getAllInOrder();
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
      $this->view->mostrarSugerencias($celulares);
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
    public function showComentar()
    {
      if ($this->userActive()){
        $usuario = $this->modelUsuarios->getUsuario($_SESSION['USER']);
        $this->view->mostrarComentar($usuario);
      }else
        $this->view->mostrarError("Solo usuarios registrados pueden subir reviews");
    }
    public function admin()
    {
      $this->isActive();
      if ($this->isAdmin())
        $this->view->mostrarPanelAdmin();
      else
        header('Location: '.HOME);
    }
    public function user()
    {
      $this->isActive();
      $usuario = $this->modelUsuarios->getUsuario($_SESSION['USER']);
      $this->view->mostrarDatosUsuario($usuario);
    }
  }

 ?>
