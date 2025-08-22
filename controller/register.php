<?php
// Incluir función para mostrar mensajes
include_once "utils/messages.php";

// Verificar si se envió el formulario de registro
if (!empty($_POST["btn-register"])) {
    // Validar que todos los campos estén llenos
    if (!empty($_POST["name"]) and !empty($_POST["lastname"]) and !empty($_POST["dni"]) and !empty($_POST["birthday"]) and !empty($_POST["email"])) {
        // Capturar datos del formulario
        $name = $_POST["name"];
        $lastname = $_POST["lastname"];
        $dni = $_POST["dni"];
        $birthday = $_POST["birthday"];
        $email = $_POST["email"];

        try {
            // Insertar nuevo usuario en la base de datos
            $sql = $connection->query("insert into users (name, lastname, dni, birthday, email) values ('$name','$lastname','$dni','$birthday','$email')");
            
            if ($sql == 1) {
                showMessage('Persona registrada correctamente', 'success', 'msg-register');
            } else {
                showMessage('Error al registrar persona', 'danger', 'msg-register');
            }
        } catch (mysqli_sql_exception $e) {
            // Manejar errores específicos (duplicados)
            if (strpos($e->getMessage(), 'Duplicate entry') !== false) {
                if (strpos($e->getMessage(), 'email') !== false) {
                    showMessage('Este email ya está registrado', 'warning', 'msg-register');
                } elseif (strpos($e->getMessage(), 'dni') !== false) {
                    showMessage('Este DNI ya está registrado', 'warning', 'msg-register');
                } else {
                    showMessage('Ya existe un registro con estos datos', 'warning', 'msg-register');
                }
            } else {
                showMessage('Error al registrar persona: ' . $e->getMessage(), 'danger', 'msg-register');
            }
        }
    } else {
        // Mostrar error si hay campos vacíos
        showMessage('Alguno de los campos está vacío', 'warning', 'msg-register');
    }
}
?>
