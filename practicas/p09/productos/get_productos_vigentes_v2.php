<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $link = new mysqli('localhost', 'root', 'github', 'marketzone');

    if ($link->connect_errno) {
        die('Falló la conexión: ' . $link->connect_error);
    }

    $id_producto = $_POST['id_producto'];
    $nombre = $_POST['name'];
    $marca = $_POST['brand'];
    $modelo = $_POST['model'];
    $precio = $_POST['price'];
    $detalles = $_POST['details'];
    $unidades = $_POST['unities'];

    $sql_update = "UPDATE productos SET nombre=?, marca=?, modelo=?, precio=?, detalles=?, unidades=? WHERE id=?";
    $stmt = $link->prepare($sql_update);
    $stmt->bind_param("sssdssi", $nombre, $marca, $modelo, $precio, $detalles, $unidades, $id_producto);

    if ($stmt->execute()) {
        echo "Producto actualizado correctamente.";
    } else {
        echo "Error al actualizar el producto: " . $stmt->error;
    }

    $stmt->close();
    $link->close();
}
?>
