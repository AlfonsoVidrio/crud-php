<?php
    // Conexión a la base de datos
    include "../model/connection.php";
    
    // Verificar que se recibió un ID para eliminar
    if (!empty($_GET["id"])) {
        $id = $_GET["id"];
        // Ejecutar eliminación en la base de datos
        $sql = $connection->query("delete from users where id=$id");
        
        // Preparar mensaje para mostrar en el index
        session_start();
        if ($sql == 1) {
            $_SESSION['message'] = "Usuario eliminado correctamente";
            $_SESSION['message_type'] = "success";
        } else {
            $_SESSION['message'] = "Error al eliminar usuario";
            $_SESSION['message_type'] = "danger";
        }
        
        // Redirigir de vuelta al index
        header("Location: ../index.php");
        exit();
    }
?>  