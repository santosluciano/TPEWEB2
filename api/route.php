<?php

include_once '../config/Router.php';
include_once '../model/Model.php';
include_once 'controller/CelularesApiController.php';
include_once 'controller/ComentariosApiController.php';
require_once '../config/db-config.php';


$router = new Router();
//url, verb, controller, method
//Api estaditicas
$router->AddRoute("estadisticas/:id", "GET", "CelularesApiController", "getEstadisticas");
//Api comentarios
$router->AddRoute("comentarios", "GET", "ComentariosApiController", "getComentarios");
$router->AddRoute("comentarios/:id", "GET", "ComentariosApiController", "getComentario");
$router->AddRoute("comentarios", "POST", "ComentariosApiController", "crearComentario");
$router->AddRoute("comentarios/:id", "DELETE", "ComentariosApiController", "deleteComentario");

$route = $_GET['resource'];
$array = $router->Route($route);

if(sizeof($array) == 0)
  echo "404";
else
{
  $controller = $array[0];
  $metodo = $array[1];
  $url_params = $array[2];
  echo (new $controller())->$metodo($url_params);
}
?>