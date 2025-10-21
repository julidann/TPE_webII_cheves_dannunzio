

<?php
require_once './app/models/product.model.php';
require_once './app/models/category.model.php'; 
require_once './app/views/home.view.php';

class HomeController {
    private $productModel;
    private $homeView;

    public function __construct() {
        $this->productModel = new ProductModel();
        $this->homeView = new HomeView(); // Asume que tienes una HomeView separada
    }

    /**
     * Muestra la página principal y maneja el filtro de categorías.
     */
    public function showHome() {
        
        // Obtener categorías para el filtro
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getAll();
        
        // Obtener ID del filtro (desde el formulario GET)
        $category_id = $_GET['category_id'] ?? null;
        
        // Obtener productos (filtrados o todos)
        if (!empty($category_id)) {
            // Asume que este método existe en ProductModel
            $products = $this->productModel->getProductsByCategory($category_id);
        } else {
            $products = $this->productModel->getAll(); 
        }
        
        // Llama a la vista, pasando ambos arrays
        $this->homeView->showHome($products, $categories); 
    }

    /**
     * Muestra la lista de productos filtrada por una categoría específica.
     * @param int $category_id El ID de la categoría a filtrar.
     */
    public function showProductsByCategory($category_id) {
        // Obtener SÓLO los productos filtrados
        $products = $this->productModel->getProductsByCategory($category_id);
        
        // Obtener todas las categorías (necesario para la navegación o el título)
        $categoryModel = new CategoryModel();
        $categories = $categoryModel->getAll(); 
        
        // Llama a la vista de detalle de categoría
        $this->homeView->showProductsByCategoryDetail($products, $categories);
    }

    /**
     * Muestra la página de detalle de un solo producto.
     * @param int $id El ID del producto.
     */
    public function showProductDetail($id) {
        $product = $this->productModel->get($id);

        if (!$product) {
            // Manejar error de producto no encontrado
            return $this->homeView->showError("Producto no encontrado.");
        }
        
        $this->homeView->showProductDetail($product);
    }
}