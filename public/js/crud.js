
// Función para registrar un producto
const registrar_producto = () => {
    let nombre_producto = document.getElementById('nombre-producto').value;
    let precio_producto = document.getElementById('precio').value;

    let data = new FormData();
    data.append("nombre-producto", nombre_producto);
    data.append("precio", precio_producto);
    data.append("action", "registrar");

    fetch("app/controller/inicio.php", {
        method: "POST",
        body: data
    }).then(respuesta => respuesta.json())
    .then(respuesta => {
        alert(respuesta[1]);
        if (respuesta[0] == 1) {
            window.location.reload(); // Recargar la página para reflejar los cambios
        }
    });
}

// Función para eliminar producto
const eliminar_producto = (producto_key) => {
    let data = new FormData();
    data.append("producto_key", producto_key);
    data.append("action", "eliminar");

    fetch("app/controller/inicio.php", {
        method: "POST",
        body: data
    }).then(respuesta => respuesta.json())
    .then(respuesta => {
        alert(respuesta[1]);
        if (respuesta[0] == 1) {
            window.location.reload(); // Recargar la página para reflejar los cambios
        }
    });
}

// Función para editar producto
const editar_producto = (producto_key, nombre_producto, precio_producto) => {
    let nuevo_nombre = prompt("Editar Nombre del Producto:", nombre_producto);
    let nuevo_precio = prompt("Editar Precio del Producto:", precio_producto);

    if (nuevo_nombre && nuevo_precio) {
        let data = new FormData();
        data.append("producto_key", producto_key);
        data.append("nuevo_nombre", nuevo_nombre);
        data.append("nuevo_precio", nuevo_precio);
        data.append("action", "editar");

        fetch("app/controller/inicio.php", {
            method: "POST",
            body: data
        }).then(respuesta => respuesta.json())
        .then(respuesta => {
            alert(respuesta[1]);
            if (respuesta[0] == 1) {
                window.location.reload(); // Recargar la página para reflejar los cambios
            }
        });
    }
}

