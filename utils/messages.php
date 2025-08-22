<?php

/**
 * Función para mostrar mensajes de alerta con auto-ocultación
 * @param string $message - El mensaje a mostrar
 * @param string $type - Tipo de alerta (success, danger, warning, info)
 * @param string $id - ID único para el elemento HTML
 */
function showMessage($message, $type = 'success', $id = 'message')
{
    // Generar el HTML del mensaje con clases de Bootstrap
    echo "<div class='alert alert-$type' id='$id'>$message</div>";

    // JavaScript para ocultar el mensaje después de 2 segundos
    echo "<script>
            setTimeout(function() {
                document.getElementById('$id').style.display = 'none';
            }, 2000);
          </script>";
}
