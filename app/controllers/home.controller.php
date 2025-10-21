<?php
require_once './app/models/product.model.php';
require_once './app/models/category.model.php';
require_once './app/views/home.view.php';

class HomeController
{
    private $productModel;
    private $homeView;

    public function __construct(){
        $this->productModel = new ProductModel();
        $this->homeView = new HomeView();
    }
    public function showHome(){
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getAll();
        $category_id = $_GET['category_id'] ?? null;

        if (!empty($category_id)) {
            $products = $this->productModel->getProductsByCategory($category_id);
        } else {
            $products = $this->productModel->getAll();
        }
        $this->homeView->showHome($products, $categories);
    }

    public function showProductsByCategory($category_id){
        $products = $this->productModel->getProductsByCategory($category_id);
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getAll();

        $this->homeView->showProductsByCategoryDetail($products, $categories);
    }

   
}
