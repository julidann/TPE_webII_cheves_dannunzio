
<?php
require_once './app/controllers/home.controller.php';
require_once './app/controllers/product.controller.php';
require_once './app/controllers/category.controller.php';
require_once './app/controllers/auth.controller.php';

require_once './app/middlewares/session.middleware.php';
require_once './app/middlewares/guard.middleware.php';

session_start();

define('BASE_URL', '//' . $_SERVER['SERVER_NAME'] . ':' . $_SERVER['SERVER_PORT'] . dirname($_SERVER['PHP_SELF']) . '/');

$action = 'home';
if (!empty($_GET['action'])) {
    $action = $_GET['action'];
}

$params = explode('/', $action);

$request = new StdClass();
$request = (new SessionMiddleware())->run($request);

switch ($params[0]) {

    // --------- HOME ---------
    case 'home':
        $controller = new HomeController();
        $controller->showHome();
        break;

    // --------- PRODUCTOS ---------
    case 'productos':
        $controller = new ProductController();
        $controller->showProducts($request);
        break;

    case 'producto':
        $id = $params[1] ?? null;
        $controller = new ProductController();
        $controller->showProductDetail($id);
        break;

    case 'agregar-producto':
        $request = (new GuardMiddleware())->run($request);
    $controller = new ProductController();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $controller->addProduct($request); 
    } 
    else {
        $controller->showAddProductForm($request); 
    }
    break;

    case 'editar-producto':
        $request = (new GuardMiddleware())->run($request);
        $controller = new ProductController();
        $id = $params[1] ?? null;

        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getAll();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->updateProduct($id);
        } else {
            $controller->showEditFormProducts($id, $categories);
        }
        break;

    case 'eliminar-producto':
        $request = (new GuardMiddleware())->run($request);
        $controller = new ProductController();
        $id = $params[1] ?? null;
        $controller->removeProduct($id);
        break;

    // --------- CATEGORÍAS ---------
    case 'categorias':
        $controller = new CategoryController();
        $controller->showCategories($request);
        break;

    case 'categoria':
        $id = $params[1] ?? null;
        $controller = new ProductController();
        if ($id) $controller->showProductsByCategory($id);
        break;
 // ESTO HAY QUE CORREGIR !!!!

 //http://localhost/TPE_webII_cheves_dannunzio-main/categoria-filtro?category_id=1

 //URL SEMÁNTICA 
   /* case 'categoria-filtro':
        $controller = new ProductController();
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            $category_id = $_GET['category_id'] ?? null;
            $controller->showProductsByCategory($category_id);
        }
        break;*/

    case 'agregar-categoria':
        $controller = new CategoryController();
        $controller->addCategory();
        break;

    case 'editar-categoria':
        $request = (new GuardMiddleware())->run($request);
        $controller = new CategoryController();
        $id = $params[1] ?? null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->editCategory($id);
        } else {
            $controller->showEditFormCategory($id);
        }
        break;

    case 'eliminar-categoria':
        $request = (new GuardMiddleware())->run($request);
        $controller = new CategoryController();
        $id = $params[1] ?? null;
        $controller->removeCategory($id);
        break;

    // --------- LOGIN / LOGOUT ---------
    case 'login':
        $controller = new AuthController();
        $controller->showLogin($request);
        break;

    case 'do_login':
        $controller = new AuthController();
        $controller->doLogin($request);
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
