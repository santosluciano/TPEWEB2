<?php
  include_once('model/MarcasModel.php');
  include_once('model/CelularesModel.php');
  include_once('view/AdminView.php');
  /**
   *
   */
  class AdminController extends SecuredController
  {
    function __construct()
    {
      parent::__construct();
      $this->view = new AdminView();
      $this->modelMarcas = new MarcasModel();
      $this->modelCelulares = new CelularesModel();
    }
    public function index()
    {
      $this->view->mostrarPanelAdmin();
    }
    public function Marcas()
    {
      $marcas = $this->modelMarcas->getMarcas();
      $this->view->mostrarMarcas($marcas);
    }
    public function destroy($params)
    {
      $id_marca = $params[0];
      $this->modelMarcas->borrarMarca($id_marca);
      header('Location: '.HOMEMARCAS);
    }
    public function create()
    {
      $this->view->mostrarCrearMarca();
    }
    public function store()
    {
      $nombre = $_POST['nombre'];
      $descripcion = $_POST['descripcion'];
      if(isset($_POST['nombre']) && !empty($_POST['nombre'])){
        $this->modelMarcas->cargarMarca($nombre,$descripcion);
        header('Location: '.HOMEMARCAS);
      }
      else{
        $this->view->errorCrearMarca("El nombre es requerido", $nombre, $descripcion);
      }
    }
  }
 ?>
