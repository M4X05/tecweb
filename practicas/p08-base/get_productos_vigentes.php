<?php
$link = new mysqli('localhost', 'root', 'github', 'marketzone');

if ($link->connect_errno) {
    die('Falló la conexión: '.$link->connect_error.'<br/>');
}

echo "<h2>Base de datos</h2>";
$sql_select = "SELECT * FROM productos WHERE eliminado = 0";
$result = $link->query($sql_select);

if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Precio</th>
                <th>Detalles</th>
                <th>Unidades</th>
                <th>Imagen</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nombre']}</td>
                <td>{$row['marca']}</td>
                <td>{$row['modelo']}</td>
                <td>{$row['precio']}</td>
                <td>{$row['detalles']}</td>
                <td>{$row['unidades']}</td>
                <td><img src='{$row['imagen']}' width='50'></td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No hay productos disponibles.";
}

$link->close();
?>
