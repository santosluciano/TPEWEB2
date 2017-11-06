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
  public function doAdmin($params)
  {
    $id_usuario = $params[':id'];
    $this->model->putAdmin($id_usuario);
    header('Location: '.HOMEUSUARIOS);
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
