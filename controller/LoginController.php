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
          return true;
          //header('Location: '.HOME);
        } catch (Exception $e) {
          $this->view->mostrarError($e->getMessage());
        }
     }
  }
  public function destroy()
  {
    session_start();
    session_destroy();
    header('Location: '.HOME);
  }
}

 ?>
