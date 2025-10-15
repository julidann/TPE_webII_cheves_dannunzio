<?php

class ProductModel {
    private $db;

    function __construct()
    {
        //abro conexion con la db
        $this->db = new PDO('mysql:host=localhost;dbname=devices;charset=utf8', 'root', '');
    }

    public function get ($id){
        $query = $this->db->prepare('SELECT * FROM products WHERE id = ?');
        $query->execute([$id]);
        $product = $query->fetch(PDO::FETCH_OBJ);

        return $product;
    }

     public function getAll() {
        // 2. ejecuto la consulta SQL (SELECT * FROM productos)
        $query = $this->db->prepare( 'SELECT p.*, c.name AS category_name
FROM products p
JOIN categories c ON p.id_category = c.id');
        $query->execute();

        // 3. obtengo los resultados de la consulta
        $product = $query->fetchAll(PDO::FETCH_OBJ);

        return $product;
    }

    function insert($name, $img, $model, $price, $description, $id_category) {
        $query = $this->db->prepare("INSERT INTO products(name, model, price, description,id_category) VALUES(?,?,?,?)");
        $query->execute([$name, $img, $model, $price,$description, $id_category]);

        // var_dump($query->errorInfo());

        return $this->db->lastInsertId();
    }

    function remove($id) {
        $query = $this->db->prepare('DELETE from products where id = ?');
        $query->execute([$id]);

        // return $this->db->;
    }

    //AGREGAR EL UPDATE

    }

