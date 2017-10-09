<?php
  include_once('model/MarcasModel.php');
  include_once('view/MarcasView.php');
  /**
   *
   */
  class MarcasController extends SecuredController
  {
    function __construct()
    {
      parent::__construct();
      $this->view = new MarcasView();
      $this->model = new MarcasModel();
    }
    public function index()
    {
      $marcas = $this->model->getMarcas();
      $this->view->mostrarMarcas($marcas);
    }
    public function destroy($params)
    {
      $id_marca = $params[0];
      $this->model->borrarMarca($id_marca);
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
        $this->model->cargarMarca($nombre,$descripcion);
        header('Location: '.HOMEMARCAS);
      }
      else{
        $this->view->errorCrearMarca("El nombre es requerido", $nombre, $descripcion);
      }
    }
    public function update($params)
    {
      $marca = $this->model->getMarca($params[0]);
      $nombre = $marca[0]['nombre'];
      $descripcion = $marca[0]['descripcion'];
      $this->view->mostrarActualizarMarca($nombre,$descripcion);
    }
    public function set()
    {
      $nombre = $_POST['nombre'];
      $descripcion = $_POST['descripcion'];
      if(isset($_POST['nombre']) && !empty($_POST['nombre'])){
        $this->model->cargarMarca($nombre,$descripcion);
        header('Location: '.HOMEMARCAS);
      }
      else{
        $this->view->errorCrearMarca("El nombre es requerido", $nombre, $descripcion);
      }
    }
  }
 ?>
