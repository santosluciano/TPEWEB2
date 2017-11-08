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
    parent::__construct();
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
    $response = new stdClass();
    $response->comentarios = $comentarios;
    $response->status = 200;
    return $this->json_response($response, 200);
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
  private function excepcionesCreacion($body){
    if (!isset($body))
      throw new Exception(false);
    if (!isset($body->id_celular))
      throw new Exception(false);
    if (!isset($body->id_usuario))
      throw new Exception(false);
    if (!isset($body->texto_comentario))
      throw new Exception(false);
    if (!isset($body->nota_comentario))
      throw new Exception(false);          
  }
  function crearComentario(){
    $body = json_decode($this->raw_data);
    try{
      $this->excepcionesCreacion($body);
      $id_celular = $body->id_celular;
      $id_usuario = $body->id_usuario;
      $texto_comentario = $body->texto_comentario;
      $nota_comentario = $body->nota_comentario;
      if (($nota_comentario <=10)&&($nota_comentario>=0))
        $comentario = $this->model->guardarComentario($id_celular,$id_usuario,$texto_comentario,$nota_comentario);
      else
        return $this->json_response(false, 404);
      if ($comentario)
        return $this->json_response($comentario, 200);
      else
        return $this->json_response(false, 404);
    }catch (Exception $e){
      return $this->json_response(false, 404); 
    }
  }
}

 ?>