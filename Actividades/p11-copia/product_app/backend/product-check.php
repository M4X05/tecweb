<?php
    include_once __DIR__.'/database.php';

if (isset($_GET['nombre'])) {
    $nombre = $_GET['nombre'];
    $query = "SELECT COUNT(*) as count FROM productos WHERE nombre = '$nombre'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    
    // Devuelve 'existe: true' si count es mayor que 0, false en caso contrario
    echo json_encode(['existe' => $data['count'] > 0]);
}
?>
