$(function() {
    console.log('JQuery is working');
});
// JSON BASE A MOSTRAR EN FORMULARIO
var baseJSON = {
    "precio": 0.0,
    "unidades": 1,
    "modelo": "XX-000",
    "marca": "NA",
    "detalles": "NA",
    "imagen": "img/default.png"
  };

function init() {
    /**
     * Convierte el JSON a string para poder mostrarlo
     * ver: https://developer.mozilla.org/es/docs/Web/JavaScript/Reference/Global_Objects/JSON
     */
    var JsonString = JSON.stringify(baseJSON,null,2);
    document.getElementById("description").value = JsonString;

    // SE LISTAN TODOS LOS PRODUCTOS
    listarProductos();
}

// Cargar productos al abrir la página
window.onload = cargarProductos;

function cargarProductos() {
    fetch('http://localhost/tecweb/practicas/p10/product_app/backend/get_products.php')
        .then(response => response.json())
        .then(data => mostrarProductos(data))
        .catch(error => console.error('Error al cargar productos:', error));
}

function mostrarProductos(productos) {
    const tabla = document.getElementById('product-table-body');
    tabla.innerHTML = ''; // Limpiar tabla

    productos.forEach(producto => {
        const fila = `<tr>
            <td>${producto.nombre}</td>
            <td>${producto.descripcion}</td>
            <td><button onclick="eliminarProducto(${producto.id})">Eliminar</button></td>
        </tr>`;
        tabla.innerHTML += fila;
    });
}

// Buscar productos conforme se teclea en el campo de búsqueda
document.getElementById('search').addEventListener('input', (event) => {
    const query = event.target.value.trim().toLowerCase();
    buscarProductos(query);
});

function buscarProductos(query) {
    fetch(`http://localhost/tecweb/practicas/p10/product_app/backend/get_products.php?search=${query}`)
        .then(response => response.json())
        .then(data => {
            mostrarProductos(data);
            mostrarNombresEnBarra(data);
        })
        .catch(error => console.error('Error en la búsqueda:', error));
}

// Mostrar los nombres en la barra de estado
function mostrarNombresEnBarra(productos) {
    const barraEstado = document.getElementById('status-bar');
    const nombres = productos.map(p => p.nombre).join(', ');
    barraEstado.textContent = nombres || 'No hay productos coincidentes.';
}

// Agregar un nuevo producto
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

    const data = { nombre, descripcion: JSON.stringify(descripcion) };

    fetch('http://localhost/tecweb/practicas/p10/product_app/backend/create.php', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json' },
        body: JSON.stringify(data),
    })
    .then(response => response.json())
    .then(result => {
        alert(result.message || result.error);
        if (!result.error) {
            document.getElementById('task-form').reset();
            cargarProductos(); // Recargar productos
        }
    })
    .catch(error => console.error('Error al agregar el producto:', error));
}

// Eliminar un producto
function eliminarProducto(id) {
    fetch(`http://localhost/tecweb/practicas/p10/product_app/backend/delete.php?id=${id}`, {
        method: 'DELETE',
    })
    .then(response => response.json())
    .then(result => {
        alert(result.message || result.error);
        if (!result.error) {
            cargarProductos(); // Recargar productos
        }
    })
    .catch(error => console.error('Error al eliminar el producto:', error));
}
