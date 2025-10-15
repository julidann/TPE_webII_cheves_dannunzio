<?php require_once 'layout/header.php'; 
      require_once 'layout/main.php';
      require_once './templates/form.filtro.php';
?>

<div class="products-container">
    <?php foreach ($products as $product) { ?>
        <div class="product-card">
            <div id="product-name" class= "product-info"><?= $product->name ?></div>
            
            <img src="<?= $product->img ?>" alt="<?= $product->name ?>" class="product-image">
            <div class="product-info">Modelo: <?= $product->model ?></div>
            <div class="product-info">Precio: $<?= $product->price ?></div>
            <div class="product-info"><?= $product->description ?></div>
            <div class="product-info">Categoría: <?= $product->category_name ?></div>
        </div>
    <?php } ?>
</div>

<?php require_once 'layout/footer.php'; ?>