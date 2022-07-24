<?php
//esto incluye la session_start() para continuar la sesion en esta pagina. define que la sesion debe ser culminada.
include_once 'includes/sesion.php'?>
<?php 
//session_destroy() cierra la sesion. luego el header() funciona para redigir al inicio
    session_destroy();
    header('Location: index.php');
?>