<?php
require_once __DIR__ .'/../../config/config.php';
require_once __DIR__ .'/model.php';


class CategoryModel extends Model{
    
    public function get ($id){
        $query = $this->db->prepare('SELECT * FROM categories WHERE id = ?');
        $query->execute([$id]);
        $category = $query->fetch(PDO::FETCH_OBJ);

        return $category;
    }

     public function getAll() {
        // 2. ejecuto la consulta SQL 
        $query = $this->db->prepare('SELECT * FROM categories');
        $query->execute();

        // 3. obtengo los resultados de la consulta
        $category = $query->fetchAll(PDO::FETCH_OBJ);

        return $category;
    }

    function insert($name, $description, $img) {
        $query = $this->db->prepare("INSERT INTO categories(name, description,img) VALUES(?,?,?)");
        $query->execute([$name, $description, $img]);

        var_dump($query->errorInfo());

        return $this->db->lastInsertId();
    }

    function remove($id) {
        $query = $this->db->prepare('DELETE from categories where id = ?');
        $query->execute([$id]);

    }

    function update($id, $name, $description, $img) {
        $query = $this->db->prepare("UPDATE categories SET name = ?, description = ?, img = ? WHERE id = ?");
        $result =$query->execute([$name, $description, $img, $id]);
        return $result;
    }
}


