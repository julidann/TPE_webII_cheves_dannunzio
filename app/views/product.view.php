<?php

class ProductView {
    public function showProducts ($products){
        $count = count($products);
        
        require_once './templates/home.phtml';
    }
     public function showEditFormProducts ($products){
        
        require_once './templates/form.edit.products.phtml';

    }
    public function showAddProductForm($products) {
        $count = count($products);
      
        require_once './templates/form.add.product.phtml';
    }
    public function showError($error) {
        echo "<h1>$error</h1>";
    }


}


