<?php
header('Content-Type: application/xhtml+xml; charset=utf-8');
echo '<?xml version="1.0" encoding="UTF-8"?>';

$uploadedImage = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['brand'])) {
        echo '<p style="color:red;">Error: La marca es obligatoria.</p>';
        exit;
    }

    if (empty($_POST['price']) || $_POST['price'] <= 99.99) {
        echo '<p style="color:red;">Error: El precio es obligatorio y debe ser mayor a 99.99.</p>';
        exit;
    }

    if (!empty($_POST['details']) && strlen($_POST['details']) > 250) {
        echo '<p style="color:red;">Error: Los detalles no deben exceder los 250 caracteres.</p>';
        exit;
    }

    if (empty($_POST['unities']) && $_POST['unities'] != '0') {
        echo '<p style="color:red;">Error: Las unidades son obligatorias.</p>';
        exit;
    }

    if ($_POST['unities'] < 0) {
        echo '<p style="color:red;">Error: Las unidades deben ser un número mayor o igual a 0.</p>';
        exit;
    }

    if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] === 0) {
        $allowedMimeTypes = ['image/jpeg', 'image/png', 'image/gif'];
        $fileMimeType = mime_content_type($_FILES['product_image']['tmp_name']);
        
        if (in_array($fileMimeType, $allowedMimeTypes)) {
            $destinationDir = 'uploads/'; 
            $uniqueFileName = uniqid('img_', true) . '.' . pathinfo($_FILES['product_image']['name'], PATHINFO_EXTENSION);
            $destinationPath = $destinationDir . $uniqueFileName;
            
            if (move_uploaded_file($_FILES['product_image']['tmp_name'], $destinationPath)) {
                $uploadedImage = $destinationPath; r
            } else {
                echo '<p style="color:red;">Error: No se pudo guardar la imagen.</p>';
                exit;
            }
        } else {
            echo '<p style="color:red;">Error: Tipo de archivo no permitido. Solo se aceptan imágenes JPEG, PNG o GIF.</p>';
            exit;
        }
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="es" xml:lang="es">
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <title>Registro Completado</title>
    <style type="text/css">
        body {
            margin: 20px; 
            background-color: #C4DF9B;
            font-family: Verdana, Helvetica, sans-serif;
            font-size: 90%;
        }
        h1 {
            color: #005825;
            border-bottom: 1px solid #005825;
        }
        h2 {
            font-size: 1.2em;
            color: #4A0048;
        }
        .product-image {
            margin-top: 20px;
            max-width: 300px;
        }
    </style>
</head>
<body>
    <h1>PRODUCTO</h1>

    <h2>Acerca del producto:</h2>
    <ul>
        <li><strong>Nombre:</strong> <em><?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : 'No proporcionado'; ?></em></li>
        <li><strong>Marca:</strong> <em><?php echo htmlspecialchars($_POST['brand']); ?></em></li>
        <li><strong>Modelo:</strong> <em><?php echo isset($_POST['model']) ? htmlspecialchars($_POST['model']) : 'No proporcionado'; ?></em></li>
        <li><strong>Precio:</strong> <em><?php echo isset($_POST['price']) ? htmlspecialchars($_POST['price']) : 'No proporcionado'; ?></em></li>
        <li><strong>Detalles del producto:</strong> <em><?php echo isset($_POST['details']) ? htmlspecialchars($_POST['details']) : 'No proporcionado'; ?></em></li>
        <li><strong>Unidades:</strong> <em><?php echo isset($_POST['unities']) ? htmlspecialchars($_POST['unities']) : 'No proporcionado'; ?></em></li>
    </ul>

    
        <h2>Imagen del producto:</h2>
        <img src="<?php echo htmlspecialchars($uploadedImage); ?>" alt="Imagen del producto" class="product-image" />
    

</body>
</html>
