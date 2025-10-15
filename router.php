<?php
require_once './app/controllers/product.controller.php';
require_once './app/controllers/auth.controller.php'; 

require_once './app/middlewares/session.middleware.php';
require_once './app/middlewares/guard.middleware.php';

/** TABLA DE RUTEO
 * 
 * productos        ->     ProductController->showProducts()
 * nueva            ->     ProductController->addProduct();
 * eliminar/:ID     ->     ProductController->removeProduct($id)
 * finalizar/:ID    ->     ProductController->finalizeTask($id) //  VER SI LA USAMOS
 * login            ->     AuthController->showLogin()
 * 
 */
//session_start(); -->VER QUE ES ESTO

// base_url para redirecciones y base tag
define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

// accion por defecto si no se envia ninguna
$action = 'productos'; 
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

// parsea la accion para separar accion real de parametros
$params = explode('/', $action);

$request = new StdClass();
$request = (new SessionMiddleware())->run($request);

switch ($params[0]) {
    case 'productos':
        $controller = new ProductController();
        $controller->showProducts($request);
        break;
    case 'nueva':
        $controller = new ProductController();
        $controller->addProduct();
        break;
    case 'eliminar':
        $controller = new ProductController();
        $id = $params[1];
        $controller->removeProduct($id);
        break;
    /*case 'finalizar':
        $controller = new ProductController();
        $id = $params[1];
        $controller->finalizeTask($id);
        break;*/
    case 'login':
        $controller = new AuthController();
        $controller->showLogin($request);
        break;
    default: 
        echo "404 Page Not Found";
        break;
    }

