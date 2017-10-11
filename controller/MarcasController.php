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
        $this->view->errorCrearMarca("El nombre es requerido", $nombre, $descripcion,"Crear");
      }
    }
    public function update($params)
    {
      $id_marca = $params[0];
      $marca = $this->model->getMarca($id_marca);
      $nombre = $marca[0]['nombre'];
      $descripcion = $marca[0]['descripcion'];
      $this->view->mostrarActualizarMarca($nombre,$descripcion,$id_marca);
    }
    public function set($params)
    {
      $id_marca = $params[0];
      $nombre = $_POST['nombre'];
      $descripcion = $_POST['descripcion'];
      if(isset($_POST['nombre']) && !empty($_POST['nombre'])){
        $this->model->setNombreMarca($id_marca,$nombre);
        $this->model->setDescripcionMarca($id_marca,$descripcion);
        header('Location: '.HOMEMARCAS);
      }
      else{
        $this->view->errorCrearMarca("El nombre es requerido", $nombre, $descripcion,"Modificar");
      }
    }
  }
 ?>
