<?php
header('Content-Type: application/json');
include_once __DIR__ . '/database.php';

$input = file_get_contents("php://input");
if (empty($input)) {
    http_response_code(400);
    echo json_encode(["error" => "No se recibieron datos."]);
    exit;
}

$data = json_decode($input, true);
if ($data === null) {
    http_response_code(400);
    echo json_encode(["error" => "Formato JSON no válido."]);
    exit;
}

echo json_encode(["message" => "Datos recibidos correctamente.", "data" => $data]);
exit;
?>
