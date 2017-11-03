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
      $this->isActive();
      $this->view = new CelularesView();
      $this->modelCelular = new CelularesModel();
      $this->modelMarca = new MarcasModel();
    }
    public function index()
    {
      $celulares = $this->modelCelular->getAll();
      $marcas = $this->modelMarca->getAll();
      $this->view->mostrarCelulares($celulares);
    }
    public function destroy($params = [])
    {
      $id_celular = $params[':id'];
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
      $id_celular = $params[':id'];
      $celular = $this->modelCelular->get($id_celular);
      $nombre = $celular['nombre'];
      $caracteristicas = $celular['caracteristicas'];
      $precio = $celular['precio'];
      $url = $celular['url_img'];
      $id_marca = $celular['id_marca'];
      $marcas = $this->modelMarca->getAll();
      $this->view->mostrarActualizarCelular($nombre,$caracteristicas,$precio,$url,$id_celular,$id_marca,$marcas);
    }
    public function set($params = [])
    {
      try {
        $this->excepcionesIsset();
        $id_celular = $params[':id'];
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
    public function showEspecificaciones($params = [])
    {
      $id_celular = $params[':id'];
      $celular = $this->modelCelular->get($id_celular);
      try{
        if (empty($celular))
          throw new Exception("error en la id del celular");
        $especificacion = $this->modelCelular->getEspecificacion($id_celular);
        $this->view->mostrarEspecificacion($celular,$especificacion);
      }catch (Exception $e){              
      }
    }
    public function createEspecificacion($params = [])
    {
      $id_celular = $params[':id'];
      $this->view->mostrarCrearEspecificacion($id_celular);
    }    
    public function storeEspecificacion($params = [])
    {
      try {
        $this->excepcionesIssetEspecificaciones();
        $especificaciones['0'] = $params[':id'];
        $i=1;
        foreach($_POST as $v){
          $especificaciones[$i] = $v;
          $i++;
        }    
        $especificaciones['11'] = (isset($_POST['lector_huella']))?1:0;
        $especificaciones['12'] = (isset($_POST['supercarga']))?1:0;  
        $this->modelCelular->storeEspecificacion($especificaciones);
        header('Location: '.HOMECELULARES);
      } catch (Exception $e) {
        header('Location: '.HOMECELULARES);
      } 
    }
    private function excepcionesIssetEspecificaciones(){
      if(!(isset($_POST['pantalla'])&&isset($_POST['pantalla_dimension'])&&isset($_POST['peso'])&&isset($_POST['procesador'])))
        throw new Exception("Hay variables que no fueron seteadas");
      if(!(isset($_POST['ram'])&&isset($_POST['memoria'])&&isset($_POST['sistema_operativo'])&&isset($_POST['conectividad'])))
        throw new Exception("Hay variables que no fueron seteadas");
      if(!(isset($_POST['capacidad_bateria'])&&isset($_POST['camara'])))
        throw new Exception("Hay variables que no fueron seteadas");
    }
    public function destroyEspecificacion($params = [])
    {
      $id_celular = $params[':id'];
      $this->modelCelular->deleteEspecificaciones($id_celular);
      header('Location: '.HOMECELULARES);
    }
  }
 ?>
