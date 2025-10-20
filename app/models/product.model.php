<?php
require_once __DIR__ .'/../../config/config.php';
require_once __DIR__ .'/model.php';


class ProductModel extends Model{
    
    public function get($id){
        $query = $this->db->prepare('SELECT * FROM products WHERE id = ?');
        $query->execute([$id]);
        $product = $query->fetch(PDO::FETCH_OBJ);

        return $product;
    }

    public function getAll() {
        // 2. ejecuto la consulta SQL (SELECT * FROM productos)
        $query = $this->db->prepare( 'SELECT p.*, c.name AS category_name FROM products p JOIN categories c ON p.id_category = c.id');
        $query->execute();

        // 3. obtengo los resultados de la consulta
        $product = $query->fetchAll(PDO::FETCH_OBJ);

        return $product;
    }

    function insert($name, $img, $model, $price, $description, $id_category) {

        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $this->db->prepare("INSERT INTO products(name,img, model, price, description,id_category) VALUES(?,?,?,?,?,?)");
        $query->execute([$name, $img, $model, $price,$description, $id_category]);

        var_dump($query->errorInfo());

        return $this->db->lastInsertId();
    }

    function remove($id) {
        $query = $this->db->prepare('DELETE from products where id = ?');
        $query->execute([$id]);

    }

    function update($id, $name, $img, $model, $price, $description, $id_category) {
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = $this->db->prepare("UPDATE products SET name = ?, img = ?, model = ?, price = ?, description = ?, id_category = ? WHERE id = ?");
        $query->execute([$name, $img, $model, $price, $description, $id_category, $id]);
    }

}