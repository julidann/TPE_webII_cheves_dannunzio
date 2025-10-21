<?php
require_once './app/models/product.model.php';
require_once './app/views/product.view.php';
require_once './app/models/category.model.php';

class ProductController
{
    private $model;
    private $view;
   
    function __construct()
    {
        $this->model = new ProductModel();
        $this->view = new ProductView();
        
    }

    public function showProducts(){
        $products = $this->model->getAll();
        $categoryModel = new CategoryModel();
    $categories = $categoryModel->getAll();
        $this->view->showProducts($products, $categories);
    }

    public function showProductDetail($id){

        $product = $this->model->get($id);
        if (!$product) {
            return $this->view->showError("Producto no encontrado.");
        }
        $this->view->showProductDetail($product);
    }

    public function showAddProductForm(){ 
    $categoryModel = new CategoryModel(); 
    $categories = $categoryModel->getAll(); 
    $this->view->showAddProductForm($categories);
    }

    public function showEditFormProducts($id, $categories){
        $product = $this->model->get($id);
        if (!$product) {
            return $this->view->showError("Producto no encontrado");
        }
        $this->view->showEditFormProducts($product, $categories);
    }
   
    public function addProduct(){
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getAll();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

        header('Location: ' . BASE_URL . 'productos');
        exit();
    } else {
        $this->view->showAddProductForm($categories);
    }
}

    public function updateProduct($id){
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getAll();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

            $name = $_POST['name'];
            $img = $_POST['img'];
            $model = $_POST['model'];
            $price = $_POST['price'];
            $description = $_POST['description'];
            $id_category = $_POST['id_category'];

            $this->model->update($id, $name, $img, $model, $price, $description, $id_category);

            header('Location: ' . BASE_URL . 'productos');
        } else {
            $product = $this->model->get($id);
            if (!$product) {
                return $this->view->showError("No se pudo editar");
            }
            $this->view->showEditFormProducts($product, $categories);
        }
        $product = $this->model->getAll();
        $this->view->showEditFormProducts($product, $categories);
    }


    public function removeProduct($id){
        // obtengo la tarea que quiero eliminar
        $product = $this->model->get($id);

        if (!$product) {
            return $this->view->showError("No existe el producto con el id=$id");
        }
        $this->model->remove($id);

        // redirijo al home //VER ESTO 
        header('Location: ' . BASE_URL . 'productos');
    }

    public function showProductsByCategory($id_categoria){
        $products = $this->model->getProductsByCategory($id_categoria);
        $category = $this->model->get($id_categoria);
        $this->view->showProductsByCategory($products, $category);
    }
}
