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

    function showCategories($request) {
        
        $categories = $this->model->getAll();
        $this->view->showCategories($categories);
    }

    function addCategory() {
        if (!isset($_POST['name']) || empty($_POST['name'])) {
            return $this->view->showError('Error: falta completar el modelo');
        }
        if (!isset($_POST['description']) || empty($_POST['description'])) {
            return $this->view->showError('Error: falta completar la descripción');
        }

        // obtengo los datos del formulario
        $name = $_POST['name'];
        $description = $_POST['description'];
        $img = $_POST['img'];

        $id = $this->model->insert($name, $description, $img);

        if (!$id) {
            return $this->view->showError('Error al insertar la categoría');
        }

        header('Location: ' . BASE_URL);
    }

    // agreamos form en ..
    function showAddCategoryForm(){
        $categories = $this->model->getAll(); 
        $this->view->showAddCategoriesForm($categories);
    }

    // $id is passed from the router as a string/int
    public function removeCategory($id) {
        // obtengo la categoría que quiero eliminar
        $category = $this->model->get($id);

        if (!$category) {
            return $this->view->showError("No existe la categoría con el id=$id");
        }
        $this->model->remove($id);

        // redirijo al home
        header('Location: ' . BASE_URL);
    }
    
    public function showEditFormCategory($id){
        $category = $this->model->get($id);
        $this->view->showEditFormCategory($category);

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


    





