<?php
    require_once 'db/conn.php';
    if(!$_GET['id']){
        include 'includes/errormsg.php';
        header("Location: viewrecords.php");
    }else{
        //obtener la ID
        $id = $_GET['id'];

        //llamar a la funcion borrar
        $result = $crud->deleteAsistentes($id);
        //redireccionar a la lista
        if($result){
            header("Location: viewrecords.php");
        }else{
            include 'includes/errormsg.php';
        }

    }
?>