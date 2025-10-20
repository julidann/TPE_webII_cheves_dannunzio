<?php
require_once './app/controllers/product.controller.php';
require_once './app/controllers/category.controller.php';
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
session_start();

define('BASE_URL', '//'.$_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']).'/');

$action = 'home'; 
if (!empty( $_GET['action'])) {
    $action = $_GET['action'];
}

// parsea la accion para separar accion real de parametros
$params = explode('/', $action);

$request = new StdClass();
$request = (new SessionMiddleware())->run($request);

switch ($params[0]) {
    case 'home':

        $controller = new ProductController();
        $controller->showProducts($request);
        break;
    case 'producto-nuevo':
        // hay formulario 
        $controller = new ProductController();
        $controller->showAddProductForm();

        $controller1 = new CategoryController();
        $controller1->showAddCategoryForm();
        break;

    case 'categorias':
        $controller = new CategoryController();
        $controller->showCategories($request);
        break;

    case 'nueva': // addProduct valua lo que envia producto-nuevo e
        $controller = new ProductController();
        $controller->addProduct();
        $controller1 = new CategoryController();
        $controller1->addCategory();
        break;

    case 'eliminar-producto':
        $request = (new GuardMiddleware())->run($request);
        $controller = new ProductController();
        // el 2do parametro ( id del borrado)
        $id = $params[1];
        $controller->removeProduct($id);
        break;
    case 'eliminar-categoria':
        $request = (new GuardMiddleware())->run($request);
        $controller = new CategoryController();
        $id = $params[1];
        $controller->removeCategory($id);
        break;


    case 'editar-categoria':
    if (isset($params[1])) {
        $id = $params[1];
        $controller = new CategoryController();
        $controller->showEditFormCategory($id); // Llama al método para obtener datos y mostrar la vista
    }
    break; 
    case 'editar-producto':
    if (isset($params[1])) {
        $id = $params[1];
        $controller = new ProductController();
        $controller->showEditFormProducts($id); // Llama al método para obtener datos y mostrar la vista
        //if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //    $controller->updateProduct();
        //}    
    }
    break;       
    case 'edita':
        $controller = new ProductController();
        $controller->updateProduct();
    break;
    case 'do_login':
        $controller = new AuthController();
        $controller->doLogin($request);
        break;
    case 'login':
        $controller = new AuthController();
        $controller->showLogin($request);
        break;
    case 'logout':
        $request = (new GuardMiddleware())->run($request);
        $controller = new AuthController();
        $controller->logout($request);
        break;

    default: 
        echo "404 Page Not Found";
        break;
    }

