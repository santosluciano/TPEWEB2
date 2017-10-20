<?php
    include_once 'config/Router.php';
    include_once 'model/Model.php';
    include_once 'view/View.php';
    include_once 'controller/Controller.php';
    include_once 'controller/SecuredController.php';
    include_once 'controller/NavigationController.php';
    include_once 'controller/MarcasController.php';
    include_once 'controller/CelularesController.php';
    include_once 'controller/LoginController.php';

    $router = new Router();
    //(url, verb, controller, method)
    //Navegacion
    $router->AddRoute("", "GET", "NavigationController", "index");
    $router->AddRoute("home", "GET", "NavigationController", "inicio");
    $router->AddRoute("admin", "GET", "NavigationController", "admin");
    $router->AddRoute("celular/:id", "GET", "NavigationController", "showCelular");
    $router->AddRoute("celulares", "GET", "NavigationController", "showCelulares");
    $router->AddRoute("celulares/:id", "GET", "NavigationController", "showCelularesMarca");
    $router->AddRoute("celulares/buscar", "POST", "NavigationController", "searchCelulares");
    $router->AddRoute("celulares/buscar/sugerencia", "POST", "NavigationController", "searchSugerenciasCelulares");
    $router->AddRoute("celulares/ordenados/marca", "GET", "NavigationController", "showCelularesOrdenadosMarca"); 
    //Control de usuarios
    $router->AddRoute("login", "GET", "LoginController", "index");
    $router->AddRoute("logout", "GET", "LoginController", "destroy");
    $router->AddRoute("verificarUsuario", "POST", "LoginController", "verify");
    //Control de celulares
    $router->AddRoute("adminCelulares", "GET", "CelularesController", "index");
    $router->AddRoute("eliminarCelular/:id", "GET", "CelularesController", "destroy");
    $router->AddRoute("crearCelular", "GET", "CelularesController", "create");
    $router->AddRoute("guardarCelular", "POST", "CelularesController", "store");
    $router->AddRoute("modificarCelular/:id", "GET", "CelularesController", "update");
    $router->AddRoute("setCelular/:id", "POST", "CelularesController", "set");
    $router->AddRoute("especificacion/:id", "GET", "CelularesController", "showEspecificaciones");
    $router->AddRoute("crearEspecificacion/:id", "GET", "CelularesController", "createEspecificacion");
    $router->AddRoute("guardarEspecificacion/:id", "POST", "CelularesController", "storeEspecificacion");
    //Control de marcas
    $router->AddRoute("adminMarcas", "GET", "MarcasController", "index");
    $router->AddRoute("eliminarMarca/:id", "GET", "MarcasController", "destroy");
    $router->AddRoute("crearMarca", "GET", "MarcasController", "create");
    $router->AddRoute("guardarMarca", "POST", "MarcasController", "store");
    $router->AddRoute("modificarMarca/:id", "GET", "MarcasController", "update");
    $router->AddRoute("setMarca/:id", "POST", "MarcasController", "set");

    $route = $_GET['action'];
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

