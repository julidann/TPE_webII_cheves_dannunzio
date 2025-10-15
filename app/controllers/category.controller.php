<?php
//me traigo el modelo y view de categorias
require_once './app/models/category.model.php';
require_once './app/views/category.view.php';

class CategoryController {
    private $model;
    private $view;

    function __construct() {
        $this->model = new CategoryModel();
        $this->view = new CategoryView();
    }
//creo la funcion mostrar productos, y adentro llamo a mostrar productos, pero de product.view
    function showCategories($request) {
        // pido las tareas al modelo
        $categories = $this->model->getAll();

        // se las mando a la vista
        $this->view->showCategories($categories, $request->user);
    }

    function addProduct($request) {
        if (!isset($_POST['name']) || empty($_POST['name'])) {
            return $this->view->showError('Error: falta completar el modelo');
        }
        if (!isset($_POST['description']) || empty($_POST['description'])) {
            return $this->view->showError('Error: falta completar la descripción');
        }


        // obtengo los datos del formulario
        $name = $_POST['name'];
       
        $description = $_POST['description'];
    

        $id = $this->model->insert($name, $description);

        if (!$id) {
            return $this->view->showError('Error la insertar la categoría', $request->user);

        // redirijo al home //VER ESTO!!!!
        header('Location: ' . BASE_URL);
    }
}

    public function removeCategory($request) {
        // obtengo la tarea que quiero eliminar
        $category = $this->model->get($request-> id);

        if (!$category) {
            return $this->view->showError("No existe la categoría con el id=$request->id", $request->user);
        }
        $this->model->remove($request->id);

        // redirijo al home //VER ESTO 
        header('Location: ' . BASE_URL);
    }
    /* RECHEQUEAR
    public function editCategory($request) {
    // obtengo los datos del formulario
    $name = $_POST['name'] ?? null;
    $description = $_POST['description'] ?? null;

    // verifico que no estén vacíos
    if (empty($name) || empty($description)) {
        return $this->view->showError("Faltan datos para editar la categoría.", $request->user);
    }
    // verifico que exista la categoría
    $category = $this->model->get($request->id);
    if (!$category) {
        return $this->view->showError("No existe la categoría con el id=$request->id", $request->user);
    }
    // actualizo en la base de datos
    $this->model->update($request->id, $name, $description);

    // redirijo al home
    header('Location: ' . BASE_URL);
   */
}


    
}




