<?php
  require_once('model/MarcasModel.php');
  require_once('view/MarcasView.php');
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
      $id_marca = $params[':id'];
      $isDelete = $this->model->delete($id_marca);
      try {
        if (!$isDelete)
          throw new Exception("La marca tiene celulares asignados");
        header('Location: '.HOMEMARCAS);
      } catch (Exception $e) {
        $marcas = $this->model->getAll();
        $this->view->mostrarEstado($marcas,$e->getMessage(),'danger');
      }
    }
    public function create()
    {
      $this->view->mostrarCrearMarca();
    }
    public function store()
    {
      try {
        if (!isset($_POST['nombre']))
          throw new Exception("Error al enviar el nombre");
        if (!isset($_POST['url']))
          throw new Exception("Error al enviar la url");
          try {
            if (empty($_POST['nombre']))
              throw new Exception("El nombre es requerido");
            if (empty($_POST['url']))
              throw new Exception("La url es requerida");
            $this->model->store($_POST['nombre'],$_POST['url']);
            header('Location: '.HOMEMARCAS);
          } catch (Exception $e) {
            $this->view->errorFormMarca($e->getMessage(),$_POST['nombre'],$_POST['url'],'guardarMarca','Crear','Crear nueva marca');
          }
        }catch (Exception $e) {
          $this->view->errorFormMarca($e->getMessage(),'','','guardarMarca','Crear','Crear nueva marca');
        }
    }
    public function update($params)
    {
        $id_marca = $params[':id'];
        $marca = $this->model->get($id_marca);
        $nombre = $marca['nombre'];
        $url = $marca['url_img'];
        $this->view->mostrarActualizarMarca($nombre,$url,$id_marca);
    }
    public function set($params)
    {
      try {
        if (!(isset($_POST['nombre'])&&isset($_POST['url'])))
          throw new Exception("Se enviaron mal los datos");
        $id_marca = $params[':id'];
        try {
            if (empty($_POST['nombre']))
              throw new Exception("El nombre es requerido");
            if (empty($_POST['url']))
              throw new Exception("La url es requerida");
            $this->model->setNombre($id_marca,$_POST['nombre']);
            $this->model->setUrl_img($id_marca,$_POST['url']);
            header('Location: '.HOMEMARCAS);
        } catch (Exception $e) {
          $this->view->errorFormMarca($e->getMessage(),$_POST['nombre'],$_POST['url'],"setMarca/$id_marca",'Modificar','Modificar marca');
        }
      } catch (Exception $e) {
        header('Location: '.HOMEMARCAS);
      }
    }
  }
 ?>
