<?php

require_once './app/models/product.model.php';
require_once './app/views/product.view.php';

class ProductController {
    private $model;
    private $view;

    function __construct() {
        $this->model = new ProductModel();
        $this->view = new ProductView();
    }

    function showProducts() {
        
        $products = $this->model->getAll();
        $this->view->showProducts($products);
    }

    function addProduct() {
        if (!isset($_POST['name']) || empty($_POST['name'])) {
            return $this->view->showError('Error: falta completar el nombre');
        }
        if (!isset($_POST['img']) || empty($_POST['img'])) {
            return $this->view->showError('Error: falta completar el nombre');
        }

        if (!isset($_POST['model']) || empty($_POST['model'])) {
            return $this->view->showError('Error: falta completar el modelo');
        }

        if (!isset($_POST['price']) || empty($_POST['price'])) {
            return $this->view->showError('Error: falta completar el precio');
        }
        if (!isset($_POST['description']) || empty($_POST['description'])) {
            return $this->view->showError('Error: falta completar la descripción');
        }

        if (!isset($_POST['id_category']) || empty($_POST['id_category'])) {
            return $this->view->showError('Error: falta completar la categoría');
        }

        // obtengo los datos del formulario
        $name = $_POST['name'];
        $img = $_POST['img'];
        $model = $_POST['model'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $id_category = $_POST['id_category'];

        $id = $this->model->insert($name, $img, $model, $price, $description, $id_category);

       
        if (!$id) {
            return $this->view->showError('Error la insertar el producto');
        } 

        header('Location: ' . BASE_URL);
    }
    function showAddProductForm(){
        // esta linea? 1ra
        $products = $this->model->getAll(); 
        $this->view->showAddProductForm($products);

    }

    function updateProduct(){
        if (!isset($_POST['id']) || empty($_POST['id'])) {
            return $this->view->showError('Error: ID de producto no especificado');
        }

        $name = $_POST['name'];
        $img = $_POST['img'];
        $model = $_POST['model'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $id_category = $_POST['id_category'];

        // Intenta actualizar y verifica resultado
        $success = $this->model->update($id, $name, $img, $model, $price, $description, $id_category);

        if (!$success) {
            return $this->view->showError('Error al actualizar el producto');
        }

        header('Location: ' . BASE_URL);
    }

    public function showEditFormProducts($id){
        
        $product = $this->model->get($id);
        $this->view->showEditFormProducts($product);

    }

    public function removeProduct($id) {
        // obtengo la tarea que quiero eliminar
        $product = $this->model->get($id);

        if (!$product) {
            return $this->view->showError("No existe el producto con el id=$id");
        }
        $this->model->remove($id);

        // redirijo al home //VER ESTO 
        header('Location: ' . BASE_URL. 'producto-nuevo');
    }



    
}


