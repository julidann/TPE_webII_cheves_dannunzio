<?php
$password_plana = "admin"; 
$password_hash = password_hash($password_plana, PASSWORD_DEFAULT);

echo "Contraseña Plana: " . $password_plana . "\n";
echo "Hash Generado: " . $password_hash . "\n\n";
echo "Copia y pega este Hash en tu tabla 'users' para el usuario precargado.";
?>