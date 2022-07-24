<?php 
  $title = 'Revisar Datos';
  require_once 'includes/header.php';
  require_once 'includes/auth_check.php';
  require_once 'db/conn.php'; 

    //get asistentes por id
    if(!isset($_GET['id'])){
        include 'includes/errormsg.php';
        
    }else{
        $id = $_GET['id'];
        $result = $crud->getAsistentesDetalles($id);
?> 

        <img src="<?php echo empty($result['avatar_path']) ? "uploads/vacio.jpg" : $result['avatar_path'] ?>" class="rounded-circle" style="width: 20%; height:20%">

        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><?php echo $result['nombres'] . ' ' . $result['apellidos'];?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php echo $result['nombre'];?></h6>
                <p class="card-text">
                Fecha de Nacimiento: <?php 
                                            $fo = $result['fechnac'];
                                            $fn = date("d-m-y",strtotime($fo));
                                            echo $fn;
                                     ?>
                </p>
                <p class="card-text">
                Email: <?php echo $result['email'];?>
                </p>
                <p class="card-text">
                Numero de Celular: <?php echo $result['numero'];?>
                </p>
            </div>
        </div>
        <br/>
                <a href="viewrecords.php?" class="btn btn-primary">Regresar a la lista</a>
                <a href="edit.php?id=<?php echo $result['asistente_id'] ?>" class="btn btn-warning">Editar</a>
                <a onclick ="return confirm('Seguro que deseas borrar a este asistente');" href="borrar.php? id=<?php echo $result['asistente_id'] ?>" class="btn btn-danger">Borrar</a>
    <?php } ?>

<br><br><br><br><br>
<?php require_once 'includes/footer.php'; ?> 