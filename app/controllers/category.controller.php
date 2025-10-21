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
            return $this->view->showError('Error: falta completar nombre');
        }
         if (!isset($_POST['img']) || empty($_POST['img'])) {
            return $this->view->showError('Error: falta completar la imagen');
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

        header('Location: ' . BASE_URL.'categorias');
    }

    // agreamos form en ..
    function showAddCategoryForm(){
        $categories = $this->model->getAll(); 
        $this->view->showAddCategoriesForm($categories);
    }

    // $id is passed from the router as a string/int
    public function removeCategory($id) {
        $category = $this->model->get($id);

        if (!$category) {
            return $this->view->showError("No existe la categoría con el id=$id");
        }
        $this->model->remove($id);

        // redirijo al home
        header('Location: ' . BASE_URL.'categorias');
    }
       
    public function editCategory($id) {
   
    if (!isset($_POST['name']) || empty($_POST['name'])) {
            return $this->view->showError('Error: falta completar nombre');
        }
         if (!isset($_POST['img']) || empty($_POST['img'])) {
            return $this->view->showError('Error: falta completar la imagen');
        }
        if (!isset($_POST['description']) || empty($_POST['description'])) {
            return $this->view->showError('Error: falta completar la descripción');
        }

        // obtengo los datos del formulario
        $name = $_POST['name'];
        $description = $_POST['description'];
        $img = $_POST['img'];
    
    $category = $this->model->get($id); 
    
    if (!$category) {
        return $this->view->showError("No existe la categoría con el id=$id");
    }
    
     $this->model->update($id, $name, $description, $img);

    header('Location: ' . BASE_URL.'categorias');
    die(); 
    // CRUCIAL para que la redirección se ejecute
}

 /*public function editarPropiedad($id_propiedad) {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_POST['id_propietario_fk']) || empty($_POST['id_propietario_fk'])) {
            $this->vista->mostrarError('ingrese el propietario');
            return;
        }
        if (!isset($_POST['tipo_propiedad']) || empty($_POST['tipo_propiedad'])) {
            $this->vista->mostrarError('ingrese tipo de propiedad');
            return;
        }
        if (!isset($_POST['ubicacion']) || empty($_POST['ubicacion'])) {
            $this->vista->mostrarError('ingrese ubicacion');
            return;
        }
        if (!isset($_POST['habitaciones']) || empty($_POST['habitaciones'])) {
            $this->vista->mostrarError('ingrese cantidad de habitaciones');
            return;
        }
        if (!isset($_POST['metros_cuadrados']) || empty($_POST['metros_cuadrados'])) {
            $this->vista->mostrarError('ingrese cantidad de metros cuadrados');
            return;
        }
            $id_propietario = $_POST['id_propietario_fk'];
            $tipo_propiedad = $_POST['tipo_propiedad'];
            $ubicacion= $_POST['ubicacion'];
            $habitaciones = $_POST['habitaciones'];
            $metros_cuadrados = $_POST['metros_cuadrados'];
            $this->modelo->editarPropiedad($id_propiedad, $id_propietario, $tipo_propiedad, $ubicacion, $habitaciones, $metros_cuadrados);
            header('Location: ' . BASE_URL . 'propiedades');
            exit();
        } else {
             $propiedad = $this->modelo->obtenerPropiedadPorId($id_propiedad);
            if (!$propiedad) {
                $this->vista->mostrarError("No se pudo editar");
                return;
            }
            $propietarios = $this->modelo->obtenerPropietarios(); 
            $this->vista->forumularioEditarPropiedad($propiedad, $propietarios);
        }
    }*/


 public function showEditFormCategory($id){
        $category = $this->model->get($id);
        $this->view->showEditFormCategory($category);
    }
}


    





