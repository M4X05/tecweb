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
        echo "<p>Producto actualizado correctamente.</p>";
        echo "<p><a href='get_productos_xhtml_v2.php'>Ver productos (XHTML)</a></p>";
        echo "<p><a href='get_productos_vigentes_v2.php'>Ver productos vigentes</a></p>";
    } else {
        echo "<p>Error al actualizar el producto: " . $stmt->error . "</p>";
        echo "<p><a href='get_productos_xhtml_v2.php'>Ver productos (XHTML)</a></p>";
        echo "<p><a href='get_productos_vigentes_v2.php'>Ver productos vigentes</a></p>";
    }

    $stmt->close();
    $link->close();
}
?>
