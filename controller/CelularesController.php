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
      $celulares = $this->modelCelular->getCelulares();
      $this->view->mostrarCelulares($celulares);
    }
    public function destroy($params)
    {
      $id_celular = $params[0];
      $this->modelCelular->borrarCelular($id_celular);
      header('Location: '.HOMECELULARES);
    }
    public function create()
    {
      $marcas = $this->modelMarca->getMarcas();
      $this->view->mostrarCrearCelular($marcas);
    }
    public function store()
    {
      $nombre = $_POST['nombre'];
      $caracteristicas = $_POST['caracteristicas'];
      $precio = $_POST['precio'];
      $id_marca = $_POST['marca'];
      echo $id_marca;
      $marcas = $this->modelMarca->getMarcas();
      if(isset($_POST['marca']) && !empty($_POST['marca'])){
        if(isset($_POST['nombre']) && !empty($_POST['nombre'])){
          if(isset($_POST['precio']) && !empty($_POST['precio'])){
            $this->modelCelular->cargarCelular($id_marca,$nombre,$caracteristicas,$precio);
            header('Location: '.HOMECELULARES);
          }else{
            $this->view->errorCrearCelular("El precio es requerido", $nombre, $caracteristicas,$precio,$marcas);
          }
        }else{
          $this->view->errorCrearCelular("El nombre es requerido", $nombre, $caracteristicas,$precio,$marcas);
        }
      }else{
        $this->view->errorCrearCelular("Imposible crear el celular, no hay marcas cargadas", $nombre, $caracteristicas,$precio,$marcas);
        }
    }
  }
 ?>
