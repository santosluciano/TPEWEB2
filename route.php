<?php
    //Librerias incluidas
    include_once 'config/Router.php';
    include_once 'model/Model.php';
    include_once 'view/View.php';
    include_once 'controller/Controller.php';
    include_once 'controller/SecuredController.php';
    include_once 'controller/NavigationController.php';
    include_once 'controller/MarcasController.php';
    include_once 'controller/CelularesController.php';
    include_once 'controller/LoginController.php';
    include_once 'controller/UsuariosController.php';
    include_once 'controller/ImagenesController.php';

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
    $router->AddRoute("comentar", "GET", "NavigationController", "showComentar");
    //Control de logueo
    $router->AddRoute("login", "GET", "LoginController", "index");
    $router->AddRoute("logout", "GET", "LoginController", "destroy");
    $router->AddRoute("verificarUsuario", "POST", "LoginController", "verify");
    //Control de usuarios
    $router->AddRoute("crearUsuario", "GET", "UsuariosController", "create");
    $router->AddRoute("registrarUsuario", "POST", "UsuariosController", "store");
    $router->AddRoute("adminUsuarios", "GET", "UsuariosController", "index");
    $router->AddRoute("cambiarPermisoAdmin/:id", "GET", "UsuariosController", "changeAdmin");
    $router->AddRoute("eliminarUsuario/:id", "GET", "UsuariosController", "destroy");
    $router->AddRoute("perfilUsuario", "GET", "NavigationController", "user");
    $router->AddRoute("cambiarFotoPerfil", "POST", "UsuariosController", "changeImage");
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
    $router->AddRoute("borrarEspecificacion/:id", "GET", "CelularesController", "destroyEspecificacion");
    $router->AddRoute("modificarImagenes/:id", "GET", "ImagenesController", "index");
    $router->AddRoute("subirImagenes/:id", "POST", "ImagenesController", "cargarImagenes");
    $router->AddRoute("cambiarImagen/:id", "POST", "ImagenesController", "setImagen");
    $router->AddRoute("eliminarImagen/:id", "GET", "ImagenesController", "deleteImagen");
    //Control de marcas
    $router->AddRoute("adminMarcas", "GET", "MarcasController", "index");
    $router->AddRoute("eliminarMarca/:id", "GET", "MarcasController", "destroy");
    $router->AddRoute("crearMarca", "GET", "MarcasController", "create");
    $router->AddRoute("guardarMarca", "POST", "MarcasController", "store");
    $router->AddRoute("modificarMarca/:id", "GET", "MarcasController", "update");
    $router->AddRoute("setMarca/:id", "POST", "MarcasController", "set");
    //Control de comentarios

    //Se carga la accion que viene por url y se llama a la funcion url para que genere el array 
    //con el controlador, el metodo y los parametros por url
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

