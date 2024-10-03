<?php
$host = 'localhost';
$user = 'root';
$password = 'github';
$database = 'marketzone';

$link = new mysqli($host, $user, $password, $database);

if ($link->connect_error) {
    die("Error de conexión a la base de datos: " . $link->connect_error);
}

$nombre = 'Producto de Ejemplo';
$marca  = 'Marca Ficticia';
$modelo = 'Modelo-123';
$precio = 150.75; 
$detalles = 'Este es un producto de ejemplo con detalles predefinidos.';
$unidades = 20; 
$imagen   = 'img/producto_ejemplo.png'; 

$sql = "INSERT INTO productos (id, nombre, marca, modelo, precio, detalles, unidades, imagen) 
        VALUES (NULL, '$nombre', '$marca', '$modelo', $precio, '$detalles', $unidades, '$imagen')";

if ($link->query($sql) === TRUE) {
    echo "Producto insertado correctamente con ID: " . $link->insert_id;
} else {
    echo "Error al insertar el producto: " . $link->error;
}

$link->close();
?>
