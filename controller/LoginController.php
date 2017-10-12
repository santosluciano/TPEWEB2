<?php
include_once('model/LoginModel.php');
include_once('view/LoginView.php');

class LoginController extends SecuredController
{

  function __construct()
  {
    $this->view = new LoginView();
    $this->model = new LoginModel();
  }
  public function index()
  {
    if (!$this->isConnect())
      $this->view->mostrarLogin();
    else
      header('Location: '.admin);
  }
  public function verify()
  {
      $userName = $_POST['usuario'];
      $password = $_POST['password'];
      if (!empty($user)){
        throw new Exception('No se ingreso nombre de usuario');
      }
      if(!empty($userName) && !empty($password)){
        $user = $this->model->getUsuario($userName);
        try {
          if (empty($user)){
            throw new Exception('No existe el usuario');
          }
          if (!password_verify($password, $user[0]['password'])){
            throw new Exception('Contraseña incorrecta');
          }
          session_start();
          $_SESSION['USER'] = $userName;
          $_SESSION['LAST_ACTIVITY'] = time();
          header('Location: '.admin);
        } catch (Exception $e) {
          $this->view->mostrarLogin($e->getMessage());
        }
     }
  }
  public function destroy()
  {
    session_start();
    session_destroy();
    header('Location: '.login);
  }
}

 ?>
