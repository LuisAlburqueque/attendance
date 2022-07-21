<?php
    //$host='127.0.0.1';
    //conexion en xamp
    //$host = 'localhost';
    //$db = 'asistentes';
    //$user = 'root';
    //$pass = '';
    //$charset = 'utf8mb4';

    //conexion a base de datos remota
    $host = 'sql10.freesqldatabase.com';
    $db = 'sql10507774';
    $user = 'sql10507774';
    $pass = 'gbPDrb8E99';

    $dsn = "mysql:host=$host;dbname=$db";

    try{
        $pdo = new PDO($dsn, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e) {
        throw new PDOException($e->getMessage());
    }

    require_once 'crud.php';
    $crud = new crud($pdo)

?>