<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD php</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>
    <script>
        function eliminar () {
            var response = confirm("¿Estás seguro de que quieres eliminar este usuario?");
            return response;
        }
    </script>
    <h1 class="text-center p-3">CRUD PHP</h1>
    <?php
        // Conexión a la base de datos
        include("model/connection.php");
        // Incluir función para mostrar mensajes
        include_once("utils/messages.php");
        
        // Verificar y mostrar mensajes de sesión
        session_start();
        if (isset($_SESSION['message'])) {
            showMessage($_SESSION['message'], $_SESSION['message_type'], 'msg-session');
            unset($_SESSION['message']);
            unset($_SESSION['message_type']);
        }
    ?>
    <div class="container-fluid row">
        <form class="col-4 p-3" method="POST">
            <h3 class="text-center p-3">Registro de personas</h3>
            <?php
                // Procesar formulario de registro
                include("controller/register.php");
            ?>
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Nombre">
            </div>
            <div class="mb-3">
                <label for="lastname" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Apellido">
            </div>
            <div class="mb-3">
                <label for="dni" class="form-label">DNI</label>
                <input type="text" class="form-control" id="dni" name="dni" placeholder="12345678">
            </div>
            <div class="mb-3">
                <label for="birthday" class="form-label">Fecha de nacimiento</label>
                <input type="date" class="form-control" id="birthday" name="birthday" placeholder="YYYY-MM-DD">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="example@gmail.com ">
            </div>
            <button type="submit" class="btn btn-primary" name="btn-register" value="ok">Registrar</button>
        </form>
        <div class="col-8 p-4">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Nombres</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Dni</th>
                        <th scope="col">Fechas de nacimiento</th>
                        <th scope="col">Correo</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    // Mostrar todos los usuarios registrados
                    include "model/connection.php";
                    $sql=$connection->query("select * from users");
                    while($data=$sql->fetch_object()) { ?>
                    <tr>
                        <th scope="row"><?= $data -> id ?></th>
                        <td><?= $data -> name ?></td>
                        <td><?= $data -> lastname ?></td>
                        <td><?= $data -> dni ?></td>
                        <td><?= $data -> birthday?></td>
                        <td><?= $data -> email ?></td>
                        <td>
                            <!-- Botón editar -->
                            <a href="edit.php?id=<?= $data->id?>" class="btn btn-small btn-warning text-white"><i class="bi bi-pencil-square"></i></a>
                            
                            <!-- Botón eliminar con confirmación -->
                            <a onclick="return eliminar()" href="controller/delete.php?id=<?= $data->id?>" class="btn btn-small btn-danger"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                    <?php }
                    ?>


                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
</body>

</html>