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
      $marcas = $this->model->getAll();
      $this->view->mostrarMarcas($marcas);
    }
    public function destroy($params)
    {
      $id_marca = $params[0];
      $this->model->delete($id_marca);
      header('Location: '.HOMEMARCAS);
    }
    public function create()
    {
      $this->view->mostrarCrearMarca();
    }
    public function store()
    {
      $nombre = $_POST['nombre'];
      $url = $_POST['url'];
      if(isset($_POST['nombre']) && !empty($_POST['nombre'])){
        $this->model->store($nombre,$url);
        header('Location: '.HOMEMARCAS);
      }
      else{
        $this->view->errorFormMarca("El nombre es requerido",$nombre,$url,'guardarMarca','Crear','Crear nueva marca');
      }
    }
    public function update($params)
    {
      $id_marca = $params[0];
      $marca = $this->model->get($id_marca);
      $nombre = $marca[0]['nombre'];
      $url = $marca[0]['url_img'];
      $this->view->mostrarActualizarMarca($nombre,$url,$id_marca);
    }
    public function set($params)
    {
      $id_marca = $params[0];
      $nombre = $_POST['nombre'];
      $url = $_POST['url'];
      if(isset($_POST['nombre']) && !empty($_POST['nombre'])){
        $this->model->setNombre($id_marca,$nombre);
        $this->model->setUrl_img($id_marca,$url);
        header('Location: '.HOMEMARCAS);
      }
      else{
        $this->view->errorFormMarca("El nombre es requerido",$nombre, $url,"setMarca/$id_marca",'Modificar','Modificar marca');
      }
    }
  }
 ?>
