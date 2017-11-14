<?php
require_once('model/UsuariosModel.php');
require_once('view/UsuariosView.php');

class UsuariosController extends SecuredController
{

  function __construct()
  {
    $this->view = new UsuariosView();
    $this->model = new UsuariosModel();
    $this->controller = new LoginController();
  }
  public function index()
  {
    $this->isActive();
    if ($this->isAdmin()){
      $usuarios = $this->model->getAll();
      $this->view->mostrarUsuarios($usuarios);
    }else
    header('Location: '.verify);
  }
  public function changeAdmin($params)
  {
    $this->isActive();
    if ($this->isAdmin()){
      $id_usuario = $params[':id'];
      $user = $this->model->getUsuarioID($id_usuario);
      $userName = $_SESSION['USER'];
      try{
        die();
        if ($user['nombre'] == $userName)
          throw new Exception("No podes cambiarte tus propios permisos");        
        if ($user['permiso_admin']==1)
          $this->model->quitAdmin($id_usuario);
        else
          $this->model->putAdmin($id_usuario);
        header('Location: '.HOMEUSUARIOS);
      }catch (Exception $e) {
        $usuarios = $this->model->getAll();
        $this->view->mostrarEstado($usuarios,$e->getMessage(),'danger');
      }
    }else
    header('Location: '.HOME);
  }
  public function destroy($params)
  {
    $this->isActive();
    if ($this->isAdmin()){
      $id_usuario = $params[':id'];
      $usuario = $this->model->getUsuarioID($id_usuario);
      try {
        if ($usuario['permiso_admin']==1)
          throw new Exception("No se puede eliminar un administrador");
        $this->model->delete($id_usuario);
        header('Location: '.HOMEUSUARIOS);
      } catch (Exception $e) {
        $usuarios = $this->model->getAll();
        $this->view->mostrarEstado($usuarios,$e->getMessage(),'danger');
      }
    }else
      header('Location: '.HOME);
  }
  public function create()
  {
    $this->view->mostrarFormRegistrar();
  }
  public function store()
  {
    try {
      $this->excepcionesIssetRegistro();
        try {        
          if (strlen($_POST['password'])<6)
            throw new Exception("La contraseña debe tener mas de 6 caracteres");
          $usuario = $this->model->getUsuario($_POST['usuario']);
          if ($usuario)
            throw new Exception("Usuario ya registrado");            
          $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
          $foto_perfil = "https://ssl.gstatic.com/accounts/ui/avatar_2x.png";
          $this->model->store($_POST['usuario'],$password,$foto_perfil);
          $this->controller->verify();                       
          return true;
        } catch (Exception $e) {
          $this->view->errorFormRegistro($e->getMessage());
        }
      }catch (Exception $e) {
        $this->view->errorFormRegistro($e->getMessage());
      }
  }   
  public function changeImage()
  { 
    if ($this->isConnect()){
      $rutaTempImagen = $_FILES['imageProfile']['tmp_name'];
      if($_FILES['imageProfile']['type'] == 'image/jpeg') {
        $usuario = $this->model->changeImageProfile($_SESSION['USER'],$rutaTempImagen);
        $this->view->mostrarImagenPerfil($usuario);
      }
    }
  }
  private function excepcionesIssetRegistro(){
    if (!isset($_POST['usuario']))
      throw new Exception("No se recibio el nombre de usuario");
    if (!isset($_POST['password']))
      throw new Exception("No se recibio la contraseña");
  } 
}
 ?>
