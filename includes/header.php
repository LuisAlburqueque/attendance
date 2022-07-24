<?php
//esto incluye el archivo de sesion. Este archivo contiene el codigo que inicia/continua la sesion.
//teniendo esto en el archivo header, se incluirá en todas las paginas , permitiendo de que  la capacidad de iniciar sesion sea usada en toda la pagina web
include_once 'includes/sesion.php' ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="css/site.css" />

    <title>Asistentes - <?php echo $title ?></title>
  </head>
  <body>
  <div class= "container">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="index.php">Conferencia TI</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Inicio <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="viewrecords.php">Revisar Participantes</a>
            </li>
          </ul>
        </div>
        <div class="navbar-nav ml-auto">  
          <?php 
            if(!isset($_SESSION['userid'])){
          ?>
            <a class="nav-item nav-link" href="login.php">iniciar sesion <span class="sr-only">(current)</span></a>
          <?php } else {?>
            <a class="nav-item nav-link" href="#"><span>Hola <?php echo $_SESSION['usuario'] ?>! </span><span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link" href="logout.php">cerrar sesion <span class="sr-only">(current)</span></a>
          <?php } ?>  
        </div>
      </nav>
      <br/>