<?php 
  $title = 'Revisar Participantes';

  require_once 'includes/header.php'; 
  require_once 'includes/auth_check.php';
  require_once 'db/conn.php';
  
  //recibir todos los asistentes
  $results = $crud->getAsistentes();
?> 
    <table class="table">
        <tr>
            <th>#</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Especialidad</th>
            <th>Acciones</th>
        </tr>
            <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td><?php echo $r['asistente_id'] ?></td>
                    <td><?php echo $r['nombres'] ?></td>
                    <td><?php echo $r['apellidos'] ?></td>   
                   <!-- <td> cambio de formato de fecha desde la base de datos a la pag
                        <?php 
                            /* $fo = $r['fechnac'];
                             $fn = date("d-m-y",strtotime($fo));
                             echo $fn;
                             */
                        ?>
                    </td>
                    -->
                    <td><?php echo $r['nombre'] ?></td>
                    <td>
                        <a href="view.php?id=<?php echo $r['asistente_id'] ?>" class="btn btn-primary">Vista</a>
                        <a href="edit.php?id=<?php echo $r['asistente_id'] ?>" class="btn btn-warning">Editar</a>
                        <a onclick ="return confirm('Seguro que deseas borrar a este asistente');" href="borrar.php?id=<?php echo $r['asistente_id'] ?>" class="btn btn-danger">Borrar</a>
                    </td>
                </tr>
            <?php } ?>    
    </table>

<br><br><br><br><br>
<?php require_once 'includes/footer.php'; ?> 