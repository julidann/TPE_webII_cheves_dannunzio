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
    function showCategories() {
        // pido las tareas al modelo
        $categories = $this->model->getAll();

        // se las mando a la vista
        $this->view->showCategories($categories);
    }

    function addProduct() {
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
            return $this->view->showError('Error la insertar la categoría');

        // redirijo al home //VER ESTO!!!!
        header('Location: ' . BASE_URL);
    }
}

    public function removeCategory($id) {
        // obtengo la tarea que quiero eliminar
        $category = $this->model->get($id);

        if (!$category) {
            return $this->view->showError("No existe la categoría con el id=$id");
        }
        $this->model->remove($id);

        // redirijo al home //VER ESTO 
        header('Location: ' . BASE_URL);
    }



    
}


