<?php
  require_once('model/ImagenesModel.php');
  require_once('view/ImagenesView.php');
  require_once('model/CelularesModel.php');
  /**
   *
   */
  class ImagenesController extends SecuredController
  {
    function __construct()
    {
      $this->isActive();
      if ($this->isAdmin()){
        $this->view = new ImagenesView();
        $this->modelImagenes = new ImagenesModel();
        $this->modelCelular = new CelularesModel();
      }else
      header('Location: '.HOME);  
    }
    public function index($params = [])
    {
      $id_celular = $params[':id'];
      $imagenes = $this->modelCelular->getImagenesCelularID($id_celular);
      $this->view->mostrarImagenes($imagenes,$id_celular);
    }
    private function cumpleRequisitosImagen(){
      if (count($_FILES['imagenes']['name'])>3)
        throw new Exception("El maximo de imagenes es 3");          
      if (empty($_FILES['imagenes']['name'][0]))
        throw new Exception("Se debe subir al menos una imagen"); 
    }
    private function sonPNG($imagenesTipos){
      foreach ($imagenesTipos as $tipo) {
        if($tipo != 'image/png') {
          return false;
        }
      }
      return true;
    }
    private function excepcionesLimiteImagenes($id_celular){
      $cant_imagenes = $this->modelImagenes->cantImagenesCelular($id_celular);
      $cant_imagenes_total = $cant_imagenes[0]+count($_FILES['imagenes']['name']);
      if (empty($_FILES['imagenes']['name'][0]))
        $cant_imagenes_total-=1;
      if ($cant_imagenes_total>3)
        throw new Exception("Excede la cantidad de imagenes para el celular");
    }
    public function cargarImagenes($params = [])
    {
      $id_celular = $params[':id'];
      try{
        $this->excepcionesLimiteImagenes($id_celular);
        if (!$this->sonPNG($_FILES['imagenes']['type']))
          throw new Exception("Las imagenes tienen que ser png");
        if (!empty($_FILES['imagenes']['name'][0])){
          $rutaTempImagenes = $_FILES['imagenes']['tmp_name']; 
          $this->modelImagenes->storeImagenes($id_celular,$rutaTempImagenes);      
        }
        header('Location: '.HOMECELULARES); 
      }catch (Exception $e){
        $imagenes = $this->modelCelular->getImagenesCelularID($id_celular); 
        $this->view->errorFormImagenes($e->getMessage(),$imagenes,$id_celular);
      }
    }
    public function setImagen($params = [])
    {
      $id_imagen = $params[':id'];
      try{
        if (($_FILES['imagen']['type']!='image/png'))
          throw new Exception("La imagen tiene que ser png");
        if (empty($_FILES['imagen']['name']))
          throw new Exception("Elija una nueva imagen");
        $rutaImagen = $_FILES['imagen']['tmp_name'];
        $imagen = $this->modelImagenes->setImagen($id_imagen,$rutaImagen);
        $id_celular = $imagen['fk_id_celular'];
        $imagenes = $this->modelCelular->getImagenesCelularID($id_celular);
        $this->view->mostrarImagenes($imagenes,$id_celular);        
      }catch (Exception $e){
        $imagen = $this->modelImagenes->getImagen($id_imagen);
        $id_celular = $imagen['fk_id_celular'];
        $imagenes = $this->modelCelular->getImagenesCelularID($id_celular);
        $this->view->errorFormImagenes($e->getMessage(),$imagenes,$id_celular);
      }
    }
    public function deleteImagen($params = [])
    {
        $id_imagen = $params[':id'];
        $imagen = $this->modelImagenes->getImagen($id_imagen);
        $id_celular = $imagen['fk_id_celular'];
        $this->modelImagenes->delete($id_imagen);
        $imagenes = $this->modelCelular->getImagenesCelularID($id_celular);
        $this->view->mostrarImagenes($imagenes,$id_celular);
    }
  }
 ?>
