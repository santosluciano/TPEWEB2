<?php

require_once('../model/ComentariosModel.php');
require_once('Api.php');
/**
 *
 */
class ComentariosApiController extends Api
{
  protected $model;

  function __construct()
  {
      $this->model = new ComentariosModel();
  }
  public function getComentarios()
  {
    $comentarios = $this->model->getAll();
    return $this->json_response($comentarios, 200);
  }
  public function getComentario($params = [])
  {
    $id_comentario = $params[":id"];
    $comentario = $this->model->getComentario($id_comentario);
    if ($comentario)
      return $this->json_response($comentario, 200);
    else
      return $this->json_response(false, 404);
  }
  public function getComentariosCelular($params = [])
  {
    $id_celular = $params[':id'];
    $comentarios = $this->model->getAllForCelular($id_celular);
    return $this->json_response($comentarios, 200);
  }
  public function getComentariosUsuario($params = [])
  {
    $id_usuario = $params[':id'];
    $comentarios = $this->model->getAllForUsuario($id_usuario);
    if ($comentarios)
      return $this->json_response($comentarios, 200);
    else
      return $this->json_response(false, 404);
  }
  public function deleteComentario($params = [])
  {
    $id_comentario = $params[":id"];    
    $comentario = $this->model->getComentario($id_comentario);
    if ($comentario)
    {
      $this->model->borrarComentario($id_comentario);
      return $this->json_response("Comentario borrado.", 200);
    }
    else
      return $this->json_response(false, 404);
  }
}

 ?>