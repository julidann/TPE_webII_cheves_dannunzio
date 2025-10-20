<?php
require_once __DIR__ .'/../../config/config.php';
require_once __DIR__ .'/model.php';

class UserModel extends Model{

    // busca el usuario en la bd usuarios
    public function get($id) {
        $query = $this->db->prepare('SELECT * FROM users WHERE id = ?');
        $query->execute([$id]);

        $user = $query->fetch(PDO::FETCH_OBJ);

        return $user;
    }

    // no,no ? podria buscar si es ADMIN
    public function getByUser($user) {
        $query = $this->db->prepare('SELECT * FROM users WHERE name = ?');
        $query->execute([$user]);
        $user = $query->fetch(PDO::FETCH_OBJ);

        return $user;
    }
    
    // no, no?
    public function getAll() {
        // 2. ejecuto la consulta SQL (SELECT * FROM tareas)
        $query = $this->db->prepare('SELECT * FROM users');
        $query->execute();

        // 3. obtengo los resultados de la consulta
        $users = $query->fetchAll(PDO::FETCH_OBJ);

        return $users;
    }

    // p/ registrarse )?
    function insert($name, $password) {
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $query = $this->db->prepare("INSERT INTO users(user, password) VALUES(?,?)");
        $query->execute([$name, $password]);

        // var_dump($query->errorInfo());

        return $this->db->lastInsertId();
    }
}