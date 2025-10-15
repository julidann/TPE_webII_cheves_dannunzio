<?php

class CategoryModel {
    private $db;

    function __construct()
    {
        //abro conexion con la db
        $this->db = new PDO('mysql:host=localhost;dbname=devices;charset=utf8', 'root', '');
    }

    public function get ($id){
        $query = $this->db->prepare('SELECT * FROM categories WHERE id = ?');
        $query->execute([$id]);
        $category = $query->fetch(PDO::FETCH_OBJ);

        return $category;
    }

     public function getAll() {
        // 2. ejecuto la consulta SQL (SELECT * FROM tareas)
        $query = $this->db->prepare('SELECT * FROM categories');
        $query->execute();

        // 3. obtengo los resultados de la consulta
        $category = $query->fetchAll(PDO::FETCH_OBJ);

        return $category;
    }

    function insert($name, $description) {
        $query = $this->db->prepare("INSERT INTO categories(name, description) VALUES(?,?)");
        $query->execute([$name, $description]);

        // var_dump($query->errorInfo());

        return $this->db->lastInsertId();
    }

    function remove($id) {
        $query = $this->db->prepare('DELETE from categories where id = ?');
        $query->execute([$id]);

        // return $this->db->;
    }

    function update($id, $name, $description) {
    $query = $this->db->prepare("UPDATE categories SET name = ?, description = ? WHERE id = ?");
    $query->execute([$name, $description, $id]);
}

    }


