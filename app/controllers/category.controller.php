<?php
//me traigo el modelo y view de categorias
require_once './app/models/category.model.php';
require_once './app/views/category.view.php';

class CategoryController
{
    private $model;
    private $view;

    function __construct()
    {

        $this->model = new CategoryModel();
        $this->view = new CategoryView();
    }

    public function showCategories($request)
    {
        $categories = $this->model->getAll();

        $this->view->showCategories($categories);
    }

    public function showAddCategoryForm()
    {

        $categories = $this->model->getAll();
        $this->view->showAddCategoriesForm($categories);
    }

    public function addCategory()
    {
        if (!isset($_POST['name']) || empty($_POST['name'])) {
            return $this->view->showError('Error: falta completar nombre');
        }
        if (!isset($_POST['img']) || empty($_POST['img'])) {
            return $this->view->showError('Error: falta completar la imagen');
        }
        if (!isset($_POST['description']) || empty($_POST['description'])) {
            return $this->view->showError('Error: falta completar la descripción');
        }

        $name = $_POST['name'];
        $description = $_POST['description'];
        $img = $_POST['img'];

        $id = $this->model->insert($name, $description, $img);

        if (!$id) {
            return $this->view->showError('Error al insertar la categoría');
        }

        header('Location: ' . BASE_URL . 'categorias');
    }

    public function removeCategory($id)
    {

        $category = $this->model->get($id);

        if (!$category) {
            return $this->view->showError("No existe la categoría con el id=$id");
        }
        $this->model->remove($id);

        header('Location: ' . BASE_URL . 'categorias');
    }

    public function editCategory($id)
    {

        if (!isset($_POST['name']) || empty($_POST['name'])) {
            return $this->view->showError('Error: falta completar nombre');
        }
        if (!isset($_POST['img']) || empty($_POST['img'])) {
            return $this->view->showError('Error: falta completar la imagen');
        }
        if (!isset($_POST['description']) || empty($_POST['description'])) {
            return $this->view->showError('Error: falta completar la descripción');
        }

        $name = $_POST['name'];
        $description = $_POST['description'];
        $img = $_POST['img'];

        $category = $this->model->get($id);

        if (!$category) {
            return $this->view->showError("No existe la categoría con el id=$id");
        }

        $this->model->update($id, $name, $description, $img);

        header('Location: ' . BASE_URL . 'categorias');
        //die();
    }

    public function showEditFormCategory($id)
    {
        $category = $this->model->get($id);
        $this->view->showEditFormCategory($category);
    }
}
