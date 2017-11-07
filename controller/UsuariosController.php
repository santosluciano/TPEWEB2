<?php
require_once('model/UsuariosModel.php');
require_once('view/UsuariosView.php');

class UsuariosController extends SecuredController
{

  function __construct()
  {
    $this->isActive();
    if ($this->isAdmin()){
        $this->view = new UsuariosView();
        $this->model = new UsuariosModel();
    }else
    header('Location: '.HOME);  
  }
  public function index()
  {
    $usuarios = $this->model->getAll();
    $this->view->mostrarUsuarios($usuarios);
  }
  public function changeAdmin($params)
  {
    $id_usuario = $params[':id'];
    $user = $this->model->getUsuarioID($id_usuario);
    $userName = $_SESSION['USER'];
    try{
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
  }
  public function destroy($params)
  {
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
  }  
}
 ?>
