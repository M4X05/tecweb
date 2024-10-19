<?php
    include_once __DIR__.'/database.php';

    // SE CREA EL ARREGLO QUE SE VA A DEVOLVER EN FORMA DE JSON
    $data = array();

    // SE VERIFICA SI SE RECIBIÓ ALGÚN TÉRMINO DE BÚSQUEDA
    if (isset($_POST['search'])) {
        $search = $conexion->real_escape_string($_POST['search']); // Sanitización de entrada

        // SE CONSTRUYE LA QUERY PARA BÚSQUEDA PARCIAL USANDO LIKE
        $query = "
            SELECT * FROM productos 
            WHERE nombre LIKE '%$search%' 
               OR marca LIKE '%$search%' 
               OR detalles LIKE '%$search%'
        ";

        // SE EJECUTA LA QUERY Y SE VERIFICA SI HAY RESULTADOS
        if ($result = $conexion->query($query)) {
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                // SE CODIFICAN LOS DATOS A UTF-8 Y SE AGREGAN AL ARREGLO DE RESPUESTA
                $item = array();
                foreach ($row as $key => $value) {
                    $item[$key] = utf8_encode($value);
                }
                $data[] = $item; 
            }
            $result->free();
        } else {
            die('Query Error: ' . mysqli_error($conexion));
        }
        $conexion->close();
    }

    // SE HACE LA CONVERSIÓN DE ARRAY A JSON
    echo json_encode($data, JSON_PRETTY_PRINT);
?>
