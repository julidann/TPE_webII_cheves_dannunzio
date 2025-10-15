<?php

class ProductView {
    public function showProducts ($products){
        $count = count($products);
        
        require_once './templates/products.table.phtml';
    }

    public function showError($error) {
        echo "<h1>$error</h1>";
    }
}


