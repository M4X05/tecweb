<?php
header("Content-Type: application/xhtml+xml; charset=UTF-8");
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
    <head>
        <title>Productos</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
        <style>
            body { font-family: Arial, sans-serif; padding: 20px; }
            h1 { margin-bottom: 20px; }
            table { width: 100%; border-collapse: collapse; }
            th, td { padding: 12px; text-align: left; }
            th { background-color: #343a40; color: white; }
            img { max-width: 100px; height: auto; }
            .table-hover tbody tr:hover { background-color: #f2f2f2; }
        </style>
    </head>
    <body>
        <h1>Producto</h1>

        <?php
        // Verificar si se ha recibido el parámetro 'tope'
        if (isset($_GET['tope']) && is_numeric($_GET['tope'])) {
            $tope = intval($_GET['tope']); // Convertir el parámetro en un entero

            // Conectar a la base de datos
            $link = new mysqli('localhost', 'root', 'github', 'marketzone');
            
            // Verificar si la conexión es exitosa
            if ($link->connect_errno) {
                die('Error de conexión: ' . $link->connect_error);
            }

            // Consultar los productos con unidades <= tope
            $query = "SELECT * FROM productos WHERE unidades <= ?";
            $stmt = $link->prepare($query);
            $stmt->bind_param("i", $tope);
            $stmt->execute();
            $result = $stmt->get_result();

            // Verificar si hay resultados
            if ($result->num_rows > 0) {
                echo '<table class="table table-hover">';
                echo '<thead><tr><th>#</th><th>Nombre</th><th>Marca</th><th>Modelo</th><th>Precio</th><th>Unidades</th><th>Detalles</th><th>Imagen</th></tr></thead>';
                echo '<tbody>';

                // Mostrar los productos en la tabla
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td>' . $row['id'] . '</td>';
                    echo '<td>' . htmlspecialchars($row['nombre']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['marca']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['modelo']) . '</td>';
                    echo '<td>$' . number_format($row['precio'], 2) . '</td>';
                    echo '<td>' . htmlspecialchars($row['unidades']) . '</td>';
                    echo '<td>' . htmlspecialchars($row['detalles']) . '</td>';
                    echo '<td><img src="' . htmlspecialchars($row['imagen']) . '" alt="Imagen del producto" /></td>';
                    echo '</tr>';
                }

                echo '</tbody></table>';
            } else {
                echo '<p>No se encontraron productos con unidades menores o iguales a ' . $tope . '.</p>';
            }

            // Liberar memoria y cerrar la conexión
            $stmt->close();
            $link->close();
        } else {
            echo '<p>Por favor, proporciona un valor numérico para el parámetro "tope".</p>';
        }
        ?>
    </body>
</html>
