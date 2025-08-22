<?php
// Conexión a la base de datos
include "model/connection.php";

// Verificar que el ID esté presente en la URL
if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $id = $_GET["id"];
    // Obtener datos del usuario a editar
    $sql = $connection->query("SELECT * FROM users WHERE id=$id");
    
    if ($sql && $sql->num_rows > 0) {
        $data = $sql->fetch_object();
    } else {
        echo "<div class='alert alert-danger'>No se encontró el usuario</div>";
        exit;
    }
} else {
    echo "<div class='alert alert-danger'>ID no válido</div>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
</head>

<body>
    <form class="col-4 p-3 m-auto" method="POST">
        <h3 class="text-center p-3">Modificar registro</h3>
        <!-- Campo oculto para enviar el ID -->
        <input type="hidden" name="id" value="<?= $id ?>">
        <?php
        // Incluir controlador de edición
        include "controller/edit.php";
        ?>
        <!-- Mostrar los datos del usuario en el formulario -->
        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="<?= $data->name ?>">
        </div>
        <div class="mb-3">
            <label for="lastname" class="form-label">Apellido</label>
            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Apellido" value="<?= $data->lastname ?>">
        </div>
        <div class="mb-3">
            <label for="dni" class="form-label">DNI</label>
            <input type="text" class="form-control" id="dni" name="dni" placeholder="12345678" value="<?= $data->dni ?>">
        </div>
        <div class="mb-3">
            <label for="birthday" class="form-label">Fecha de nacimiento</label>
            <input type="date" class="form-control" id="birthday" name="birthday" placeholder="YYYY-MM-DD" value="<?= $data->birthday ?>">
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com" value="<?= $data->email ?>">
        </div>

        <button type="submit" class="btn btn-primary" name="btn-edit" value="ok">Actualizar</button>
    </form>
</body>

</html>