
<?php
require_once('../model/ComentariosModel.php');
require_once('ApiSecuredController.php');
/**
 *
 */
class ComentariosApiController extends ApiSecuredController
{
  protected $model;
  function __construct()
  {
    parent::__construct();
    $this->model = new ComentariosModel();
  }
  public function getComentarios()
  {
    if (isset($_GET['id_celular'])){
      $id_celular = $_GET['id_celular'];
      $comentarios = $this->model->getAllForCelular($id_celular);
    } else if (isset($_GET['id_usuario'])){
      $id_usuario = $_GET['id_usuario']; 
      $comentarios = $this->model->getAllForUsuario($id_usuario);  
    } else {
      $comentarios = $this->model->getAll();
    }
    $response = new stdClass();
    $response->comentarios = $comentarios;
    $response->login = $this->isActive();
    $response->admin = $this->isAdmin();
    $response->status = 200;
    return $this->json_response($response, 200);
  }
  public function getComentario($params = [])
  {
    $id_comentario = $params[":id"];
    $comentario = $this->model->getComentario($id_comentario);
    if ($comentario){
      return $this->json_response($comentario, 200);
    }  
    else
      return $this->json_response(false, 404);
  }
  public function deleteComentario($params = [])
  {
    if ($this->isActive()){
      if ($this->isAdmin()){
        $id_comentario = $params[":id"];    
        $comentario = $this->model->getComentario($id_comentario);
        if ($comentario)
        {
          $this->model->borrarComentario($id_comentario);
          return $this->json_response("Comentario borrado.", 200);
        }
        else
          return $this->json_response(false, 404);
      }else
        return $this->Forbidden_response();
    }else
      return $this->Unauthorized_response();      
  }
  private function excepcionesCreacion($body)
  {
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
  function crearComentario()
  {
    if ($this->isActive()){
      $body = json_decode($this->raw_data);
      try{
        $this->excepcionesCreacion($body);
        $id_celular = $body->id_celular;
        $id_usuario = $body->id_usuario;
        $texto_comentario = $body->texto_comentario;
        $nota_comentario = $body->nota_comentario;
        if (($nota_comentario <=5)&&($nota_comentario>=1)){
          $comentario = $this->model->guardarComentario($id_celular,$id_usuario,$texto_comentario,$nota_comentario);
          $response = new stdClass();
          $response->comentarios = $comentario;
          $response->login = $this->isActive();
          $response->admin = $this->isAdmin();
          $response->status = 200;
        }
        else
          return $this->json_response(false, 404);
        if ($comentario)
          return $this->json_response($response, 200);
        else
          return $this->json_response(false, 404);
      }catch (Exception $e){
        return $this->json_response(false, 404); 
      }
    }else
      return $this->Unauthorized_response();
  }        
}
 ?>