<?php
$link = new mysqli('localhost', 'root', 'github', 'marketzone');

if ($link->connect_errno) {
    die('Falló la conexión: '.$link->connect_error.'<br/>');
}

echo "
<style>
    table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
        font-size: 18px;
        text-align: left;
    }
    table th, table td {
        padding: 12px;
        border-bottom: 1px solid #ddd;
    }
    table th {
        background-color: #333;
        color: white;
    }
    table td img {
        width: 50px;
        height: auto;
    }
    tr:hover {
        background-color: #f5f5f5;
    }
    a {
        padding: 8px 16px;
        background-color: #4CAF50;
        color: white;
        text-decoration: none;
        border-radius: 4px;
    }
    a:hover {
        background-color: #45a049;
    }
</style>
";

echo "<h2>PRODUCTO</h2>";
$sql_select = "SELECT * FROM productos WHERE eliminado = 0";
$result = $link->query($sql_select);

if ($result->num_rows > 0) {
    echo "<table>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Precio</th>
                <th>Unidades</th>
                <th>Detalles</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nombre']}</td>
                <td>{$row['marca']}</td>
                <td>{$row['modelo']}</td>
                <td>\${$row['precio']}</td>
                <td>{$row['unidades']}</td>
                <td>{$row['detalles']}</td>
                <td><img src='{$row['imagen']}'></td>
                <td><a href='formulario_productos_v2.html?id={$row['id']}'>Editar</a></td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No hay productos disponibles.";
}

$link->close();
?>
