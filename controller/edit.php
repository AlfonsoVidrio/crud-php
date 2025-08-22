<?php
// Incluir función para mostrar mensajes
include_once "utils/messages.php";

// Verificar si se envió el formulario de edición
if (!empty($_POST["btn-edit"])) {
    // Validar que todos los campos estén llenos
    if (!empty($_POST["name"]) and !empty($_POST["lastname"]) and !empty($_POST["dni"]) and !empty($_POST["birthday"]) and !empty($_POST["email"])) {
        // Capturar datos del formulario
        $id = $_POST["id"];
        $name = $_POST["name"];
        $lastname = $_POST["lastname"];
        $dni = $_POST["dni"];
        $birthday = $_POST["birthday"];
        $email = $_POST["email"];

        // Actualizar datos en la base de datos
        $sql = $connection->query("update users set name='$name', lastname='$lastname', dni='$dni', birthday='$birthday', email='$email' where id=$id");
        if ($sql == 1) {
            showMessage('Usuario modificado correctamente', 'success', 'msg-edit');
            // Redirigir al index después de 2 segundos
            echo '<script>
                    setTimeout(function() {
                        window.location.href = "index.php";
                    }, 1000);
                </script>';
        } else {
            showMessage('Error al modificar usuario', 'danger', 'msg-edit');
        }
    } else {
        // Mostrar error si hay campos vacíos
        showMessage('Alguno de los campos está vacío', 'warning', 'msg-edit');
    }
}
?>
