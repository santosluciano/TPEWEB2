<?php
  require_once('model/CelularesModel.php');
  require_once('view/CelularesView.php');
  /**
   *
   */
  class CelularesController extends SecuredController
  {
    function __construct()
    {
      parent::__construct();
      $this->view = new CelularesView();
      $this->modelCelular = new CelularesModel();
      $this->modelMarca = new MarcasModel();
    }
    public function index()
    {
      $celulares = $this->modelCelular->getAll();
      $marcas = $this->modelMarca->getAll();
      $this->view->mostrarCelulares($celulares,$marcas);
    }
    public function destroy($params = [])
    {
      $id_celular = $params[0];
      $this->modelCelular->delete($id_celular);
      header('Location: '.HOMECELULARES);
    }
    public function create()
    {
      $marcas = $this->modelMarca->getAll();
      $this->view->mostrarCrearCelular($marcas);
    }
    public function store()
    {
      try {
        $this->excepcionesIsset();
        try {
          $this->excepcionesEmpty();
          $this->modelCelular->store($_POST['marca'],$_POST['nombre'],$_POST['caracteristicas'],$_POST['precio'],$_POST['url']);
          header('Location: '.HOMECELULARES);
        } catch (Exception $e) {
          $marcas = $this->modelMarca->getAll();
          $this->view->errorFormCelular($e->getMessage(),$_POST['nombre'], $_POST['caracteristicas'],$_POST['precio'],$_POST['url'],$marcas,$_POST['marca'],"guardarCelular",'Crear','Crear celular');
        }
      } catch (Exception $e) {
        header('Location: '.HOMECELULARES);
      }
    }
    private function excepcionesIsset(){
      if(!(isset($_POST['marca'])&&isset($_POST['precio'])&&isset($_POST['nombre'])&&isset($_POST['url'])))
        throw new Exception("Hay variables que no fueron seteadas");
    }
    private function excepcionesEmpty()
    {
      if(empty($_POST['marca']))
        throw new Exception("Imposible crear el celular, no hay marcas cargadas");
      if(empty($_POST['nombre']))
        throw new Exception("El nombre es requerido");
      if(empty($_POST['precio']))
        throw new Exception("El precio es requerido");
      if(empty($_POST['url']))
        throw new Exception("La url es requerida");
    }
    public function update($params = [])
    {
      try {
        if (!isset($params[0]))
          throw new Exception("No se envio el id del celular a modificar");
          $id_celular = $params[0];
          $celular = $this->modelCelular->get($id_celular);
          $nombre = $celular['nombre'];
          $caracteristicas = $celular['caracteristicas'];
          $precio = $celular['precio'];
          $url = $celular['url_img'];
          $id_marca = $celular['id_marca'];
          $marcas = $this->modelMarca->getAll();
          $this->view->mostrarActualizarCelular($nombre,$caracteristicas,$precio,$url,$id_celular,$id_marca,$marcas);
      } catch (Exception $e) {
        header('Location: '.HOMECELULARES);
      }
    }
    public function set($params = [])
    {
      {
        try {
          if (!isset($params[0]))
            throw new Exception("No se envio el id del celular a modificar");
          $this->excepcionesIsset();
          $id_celular = $params[0];
            try {
              $this->excepcionesEmpty();
              $this->modelCelular->setNombre($id_celular,$_POST['nombre']);
              $this->modelCelular->setCaracteristicas($id_celular,$_POST['caracteristicas']);
              $this->modelCelular->setPrecio($id_celular,$_POST['precio']);
              $this->modelCelular->setMarca($id_celular,$_POST['marca']);
              $this->modelCelular->setUrl_img($id_celular,$_POST['url']);
              header('Location: '.HOMECELULARES);
            } catch (Exception $e) {
              $marcas = $this->modelMarca->getAll();
              $this->view->errorFormCelular($e->getMessage(),$_POST['nombre'], $_POST['caracteristicas'],$_POST['precio'],$_POST['url'],$marcas,$_POST['marca'],"setCelular/$id_celular",'Modificar','Modificar celular');
            }
          } catch (Exception $e) {
          header('Location: '.HOMECELULARES);
        }
      }
    }
  }
 ?>
