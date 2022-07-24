<?php 
  $title = 'Editar';
  require_once 'includes/header.php';
  require_once 'includes/auth_check.php';
  require_once 'db/conn.php'; 

  $results = $crud->getEspecialidades(); //llenar el dropdownlist
  if(!isset($_GET['id'])){
    //echo 'error';
    include 'includes/errormsg.php';
    header("Location: viewrecords.php");
  }
  else{
    $id = $_GET['id'];
    $asistentes = $crud->getAsistentesDetalles($id);
  
?> 

  <h1 class="text-center">Editar Registro</h1>
  
  <form method="post" action="editpost.php">
    <input type="hidden" name="id" value="<?php echo $asistentes['asistente_id']?>" />
      <div class="form-group">
        <label for="nombres">Nombres</label>
        <input type="text" class="form-control" value ="<?php echo $asistentes['nombres'] ?>" id="nombres" name="nombres">
      </div>
      <div class="form-group">
        <label for="apellidos" >Apellidos</label>
        <input type="text" class="form-control" value ="<?php echo $asistentes['apellidos'] ?>" id="apellidos" name="apellidos">
      </div>
      <div class="form-group">
        <label for="fdn">Fecha de Nacimiento</label>
        <input type="text" class="form-control" value ="<?php echo $asistentes['fechnac'] ?>" id="fdn" name="fdn">
      </div>
      <div class="form-group">
        <label for="especialidad">Area de especialidad</label>
        <select class="form-control" id="especialidad" name="especialidad">
              <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                  <option value="<?php echo $r['espec_id'] ?>" <?php if($r['espec_id'] == $asistentes['espec_id']) 
                         echo 'selected' ?>>
                    <?php echo $r['nombre'] ?>
                  </option>
              <?php } ?>
    </select>
      </div>
      <div class="form-group">
        <label for="email">Correo Electronico</label>
        <input type="email" class="form-control" value ="<?php echo $asistentes['email'] ?>" id="email" name="email" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">Jamas se compartirá su correo de manera publica</small>
      </div>
      <div class="form-group">
        <label for="celular">Celular</label>
        <input type="text" class="form-control" value ="<?php echo $asistentes['numero'] ?>" id="numero" name="numero" aria-describedby="ceHelp">
        <small id="celHelp" class="form-text text-muted">Jamas se compartirá su celular de manera publica</small>
      </div>
      <a href="viewrecords.php" class="btn btn-default btn">Regresar a la lista</a>
      <button type="submit" name="enviar" class="btn btn-success btn">Guardar Cambios</button>

  </form>

  <?php } ?>

<br><br><br><br><br>
<?php require_once 'includes/footer.php'; ?>