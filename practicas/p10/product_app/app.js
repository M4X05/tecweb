function agregarProducto(event) {
    event.preventDefault();

    const nombre = document.getElementById('name').value.trim();
    const jsonInput = document.getElementById('description').value.trim();

    if (!nombre || !jsonInput) {
        alert("Todos los campos son obligatorios.");
        return;
    }

    let descripcion;
    try {
        descripcion = JSON.parse(jsonInput);
    } catch (error) {
        alert("La descripción debe ser un JSON válido.");
        return;
    }

    const data = { 
        nombre: nombre, 
        descripcion: JSON.stringify(descripcion) 
    };

    console.log("Datos enviados:", data); 

    fetch('http://localhost/tecweb/practicas/p10/product_app/backend/create.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(data),
    })
    .then(response => response.json())
    .then(result => {
        console.log("Respuesta del servidor:", result);
        if (result.message) {
            alert(result.message);
            document.getElementById('task-form').reset();
        } else if (result.error) {
            alert(result.error);
        }
    })
    .catch(error => {
        console.error('Error en la solicitud:', error);
        alert('Hubo un problema al agregar el producto.');
    });
}
