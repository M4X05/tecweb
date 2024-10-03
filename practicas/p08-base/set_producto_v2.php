<?php
$nombre = $_POST['name'] ?? '';
$marca  = $_POST['brand'] ?? '';
$modelo = $_POST['model'] ?? '';
$precio = $_POST['price'] ?? '0';
$detalles = $_POST['details'] ?? '';
$unidades = $_POST['unities'] ?? '0';
$imagen   = 'img/imagen.png';

$link = new mysqli('localhost', 'root', 'github', 'marketzone');

if ($link->connect_errno) {
    die('Falló la conexión: '.$link->connect_error.'<br/>');
}

if (empty($nombre) || empty($marca) || empty($modelo)) {
    die("<html><body><h2>Error: Debes completar los campos 'Nombre', 'Marca' y 'Modelo'.</h2></body></html>");
}

$sql_check = "SELECT * FROM productos WHERE nombre = '{$nombre}' AND marca = '{$marca}' AND modelo = '{$modelo}'";
$result_check = $link->query($sql_check);

if ($result_check->num_rows > 0) {
    die("<html><body><h2>Error: El producto ya existe en la base de datos.</h2></body></html>");
}

$sql = "INSERT INTO productos (nombre, marca, modelo, precio, detalles, unidades, imagen, eliminado) 
        VALUES ('{$nombre}', '{$marca}', '{$modelo}', {$precio}, '{$detalles}', {$unidades}, '{$imagen}', 0)";

if ($link->query($sql) === TRUE) {
    echo 'Producto insertado con ID: '.$link->insert_id.'<br/>';
} else {
    echo 'Error al insertar el producto: '.$link->error.'<br/>';
}

$link->close();
?>
