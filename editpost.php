<?php
    require_once 'db/conn.php';
    //obtener valores despues de la operacion
    if(isset($_POST['enviar'])){
        //extracion de valores del array $_POST
        $id = $_POST['id'];
        $nombres = $_POST['nombres'];
        $apellidos = $_POST['apellidos'];
        $fdn = $_POST['fdn'];
        $email = $_POST['email'];
        $numero = $_POST['numero'];
        $especialidad = $_POST['especialidad'];
   
    //llamar a la funcion crud
        $result = $crud->editarAsistentes($id, $nombres, $apellidos, $fdn, $email, $numero, $especialidad);
    //redireccionar a index.php
        if($result){
            header("Location: index.php");
        }else{
            include 'includes/errormsg.php';
            header("Location: viewrecords.php");
        }
    }
    else{
        include 'includes/errormsg.php';
        header("Location: viewrecords.php");
    }
?>