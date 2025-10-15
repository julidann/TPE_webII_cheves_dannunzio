<?php

class CategoryView {
    public function showCategories ($categories){
        $count = count($categories);

        require_once './templates/categories.table.phtml';
    }

    public function showError($error) {
        echo "<h1>$error</h1>";
    }
}


