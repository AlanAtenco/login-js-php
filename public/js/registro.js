const Registro_datos = () => {
    let nombre = document.getElementById("nombre").value;
    let apellido = document.getElementById("apellido").value;
    let email = document.getElementById("email").value;
    let password = document.getElementById("password").value;

    let data = new FormData();
    data.append("nombre", nombre);
    data.append("apellido", apellido);
    data.append("email", email);
    data.append("password", password);

    fetch("app/controller/registro.php", {
        method: "POST",
        body: data
    })
    .then(respuesta => respuesta.json()) // Convertimos la respuesta a JSON
    .then(respuesta => {
        // Asegúrate de que el PHP devuelva un objeto o array con índices numéricos
        if (respuesta[0] == 1) {
            // Si la respuesta es exitosa, redirigir al login
            alert(respuesta[1]);  // Mostrar mensaje de éxito (opcional)
            window.location = "login.php";
        } else {
            // Si falla, mostrar el mensaje de error
            alert(respuesta[1]);
        }
    })
    .catch(error => console.error('Error:', error)); // Captura y manejo de errores
}


document.getElementById('btn_registro').addEventListener("click",()=>{
    Registro_datos();
})
