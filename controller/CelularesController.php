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
      $marcas = $this->modelMarca->getAll();
      $this->view->mostrarCelulares($celulares,$marcas);
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
      $url = $_POST['url'];
      $id_marca = $_POST['marca'];
      $marcas = $this->modelMarca->getAll();
      if(isset($_POST['marca']) && !empty($_POST['marca'])){
        if(isset($_POST['nombre']) && !empty($_POST['nombre'])){
          if(isset($_POST['precio']) && !empty($_POST['precio'])){
            if(isset($_POST['url']) && !empty($_POST['url'])){
              $this->modelCelular->store($id_marca,$nombre,$caracteristicas,$precio,$url);
              header('Location: '.HOMECELULARES);
            }else{
            }
            $this->view->errorFormCelular("La url es requerida", $nombre, $caracteristicas,$precio,$url,$marcas,$id_marca,"guardarCelular",'Crear','Crear celular');
          }else{
            $this->view->errorFormCelular("El precio es requerido", $nombre, $caracteristicas,$precio,$url,$marcas,$id_marca,"guardarCelular",'Crear','Crear celular');
          }
        }else{
          $this->view->errorFormCelular("El nombre es requerido", $nombre, $caracteristicas,$precio,$url,$marcas,$id_marca,"guardarCelular",'Crear','Crear celular');
        }
      }else{
        $this->view->errorFormCelular("Imposible crear el celular, no hay marcas cargadas", $nombre, $caracteristicas,$precio,$url,$marcas,$id_marca,"guardarCelular",'Crear','Crear celular');
        }
    }
    public function update($params)
    {
      $id_celular = $params[0];
      $celular = $this->modelCelular->get($id_celular);
      $nombre = $celular[0]['nombre'];
      $caracteristicas = $celular[0]['caracteristicas'];
      $precio = $celular[0]['precio'];
      $url = $celular[0]['url_img'];
      $id_marca = $celular[0]['id_marca'];
      $marcas = $this->modelMarca->getAll();
      $this->view->mostrarActualizarCelular($nombre,$caracteristicas,$precio,$url,$id_celular,$id_marca,$marcas);
    }
    public function set($params)
    {
      $id_celular = $params[0];
      $nombre = $_POST['nombre'];
      $precio = $_POST['precio'];
      $id_marca = $_POST['marca'];
      $url = $_POST['url'];
      $caracteristicas = $_POST['caracteristicas'];
      $marcas = $this->modelMarca->getAll();
      if(isset($_POST['marca']) && !empty($_POST['marca'])){
        if(isset($_POST['nombre']) && !empty($_POST['nombre'])){
          if(isset($_POST['precio']) && !empty($_POST['precio'])){
            if(isset($_POST['url']) && !empty($_POST['url'])){
              $this->modelCelular->setNombre($id_celular,$nombre);
              $this->modelCelular->setCaracteristicas($id_celular,$caracteristicas);
              $this->modelCelular->setPrecio($id_celular,$precio);
              $this->modelCelular->setMarca($id_celular,$id_marca);
              $this->modelCelular->setUrl_img($id_celular,$url);
              header('Location: '.HOMECELULARES);
            }else {
                $this->view->errorFormCelular("La url es requerida", $nombre, $caracteristicas,$precio,$url,$marcas,$id_marca,"setCelular/$id_celular",'Modificar','Modificar celular');
            }
          }else{
            $this->view->errorFormCelular("El precio es requerido", $nombre, $caracteristicas,$precio,$url,$marcas,$id_marca,"setCelular/$id_celular",'Modificar','Modificar celular');
          }
        }else{
          $this->view->errorFormCelular("El nombre es requerido", $nombre, $caracteristicas,$precio,$url,$marcas,$id_marca,"setCelular/$id_celular",'Modificar','Modificar celular');
      }
      }else{
      $this->view->errorFormCelular("Imposible moficar el celular, no hay marcas cargadas", $nombre, $caracteristicas,$precio,$url,$marcas,$id_marca,"setCelular/$id_celular",'Modificar','Modificar celular');
      }
    }
  }
 ?>
