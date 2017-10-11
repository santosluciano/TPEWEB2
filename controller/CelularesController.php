<?php
  include_once('model/CelularesModel.php');
  include_once('view/CelularesView.php');
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
      $this->view->mostrarCelulares($celulares);
    }
    public function destroy($params)
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
      $nombre = $_POST['nombre'];
      $caracteristicas = $_POST['caracteristicas'];
      $precio = $_POST['precio'];
      $id_marca = $_POST['marca'];
      $marcas = $this->modelMarca->getAll();
      if(isset($_POST['marca']) && !empty($_POST['marca'])){
        if(isset($_POST['nombre']) && !empty($_POST['nombre'])){
          if(isset($_POST['precio']) && !empty($_POST['precio'])){
            $this->modelCelular->store($id_marca,$nombre,$caracteristicas,$precio);
            header('Location: '.HOMECELULARES);
          }else{
            $this->view->errorFormCelular("El precio es requerido", $nombre, $caracteristicas,$precio,$marcas,"guardarCelular",'Crear','Crear celular');
          }
        }else{
          $this->view->errorFormCelular("El nombre es requerido", $nombre, $caracteristicas,$precio,$marcas,"guardarCelular",'Crear','Crear celular');
        }
      }else{
        $this->view->errorFormCelular("Imposible crear el celular, no hay marcas cargadas", $nombre, $caracteristicas,$precio,$marcas,"guardarCelular",'Crear','Crear celular');
        }
    }
    public function update($params)
    {
      $id_celular = $params[0];
      $celular = $this->modelCelular->get($id_celular);
      $nombre = $celular[0]['nombre'];
      $caracteristicas = $celular[0]['caracteristicas'];
      $precio = $celular[0]['precio'];
      $id_marca = $celular[0]['id_marca'];
      $marcas = $this->modelMarca->getAll();
      $this->view->mostrarActualizarCelular($nombre,$caracteristicas,$precio,$id_celular,$marcas);
    }
    public function set($params)
    {
      $id_celular = $params[0];
      $nombre = $_POST['nombre'];
      $precio = $_POST['precio'];
      $id_marca = $_POST['marca'];
      $caracteristicas = $_POST['caracteristicas'];
      $marcas = $this->modelMarca->getAll();
      if(isset($_POST['marca']) && !empty($_POST['marca'])){
        if(isset($_POST['nombre']) && !empty($_POST['nombre'])){
          if(isset($_POST['precio']) && !empty($_POST['precio'])){
            $this->modelCelular->setNombre($id_celular,$nombre);
            $this->modelCelular->setCaracteristicas($id_celular,$caracteristicas);
            $this->modelCelular->setPrecio($id_celular,$precio);
            $this->modelCelular->setMarca($id_celular,$id_marca);
            header('Location: '.HOMECELULARES);
            }else{
            $this->view->errorFormCelular("El precio es requerido", $nombre, $caracteristicas,$precio,$marcas,"setCelular/$id_celular",'Modificar','Modificar celular');
          }
        }else{
          $this->view->errorFormCelular("El nombre es requerido", $nombre, $caracteristicas,$precio,$marcas,"setCelular/$id_celular",'Modificar','Modificar celular');
      }
      }else{
      $this->view->errorFormCelular("Imposible moficar el celular, no hay marcas cargadas", $nombre, $caracteristicas,$precio,$marcas,"setCelular/$id_celular",'Modificar','Modificar celular');
      }
    }
  }
 ?>
