<?php
require_once('model/UsuariosModel.php');
require_once('view/LoginView.php');

class LoginController extends SecuredController
{

  function __construct()
  {
    $this->view = new LoginView();
    $this->model = new UsuariosModel();
  }
  public function index()
  {
    if (!$this->isConnect())
      $this->view->mostrarLogin();
    else
      header('Location: '.HOME);
  }
  public function verify()
  {
      $userName = $_POST['usuario'];
      $password = $_POST['password'];
      if(!empty($userName) && !empty($password)){
        $user = $this->model->getUsuario($userName);
        try {
          if (empty($user)){
            throw new Exception('No existe el usuario');
          }
          if (!password_verify($password, $user['password'])){
            throw new Exception('Contraseña incorrecta');
          }
          session_start();
          $_SESSION['USER'] = $userName;
          $_SESSION['LAST_ACTIVITY'] = time();
          $_SESSION['ADMIN'] = $user['permiso_admin']; 
          header('Location: '.HOME);
        } catch (Exception $e) {
          $this->view->mostrarLogin($e->getMessage());
        }
     }
  }
  public function destroy()
  {
    session_start();
    session_destroy();
    header('Location: '.HOME);
  }
  public function create()
  {
    $this->view->mostrarFormRegistrar();
  }
  private function excepcionesIssetRegistro(){
    if (!isset($_POST['usuario']))
      throw new Exception("No se recibio el nombre de usuario");
    if (!isset($_POST['email']))
      throw new Exception("No se recibio el email");
    if (!isset($_POST['password']))
      throw new Exception("No se recibio la contraseña");
  }
  public function store()
  {
    try {
      $this->excepcionesIssetRegistro();
        try {
          if (strlen($_POST['usuario'])<6)
            throw new Exception("El nombre de usuario debe tener mas de 6 caracteres");
          if (strlen($_POST['password'])<6)
            throw new Exception("La contraseña debe tener mas de 6 caracteres");
          $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
          $foto_perfil = "https://ssl.gstatic.com/accounts/ui/avatar_2x.png";
          $this->model->store($_POST['usuario'],$_POST['email'],$password,$foto_perfil);
          //header('Location: '.HOME);
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
        $this->model->changeImageProfile($_SESSION['USER'],$rutaTempImagen);
        header('Location: '.HOME);
      }
    }
  }
}

 ?>
