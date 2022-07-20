<?php 
  $title = 'Index';
  require_once 'includes/header.php';
  require_once 'db/conn.php';

  $results = $crud->getEspecialidades();
?> 
  <!--
      -nombres
      -apellidos
      -fecha de nacimiento
      -especialidad
      -correo electronico
      -numero de celular
  -->
  <h1 class="text-center">Registro para conferencia TI</h1>
  
  <form method="post" action="success.php">
      <div class="form-group">
        <label for="nombres">Nombres</label>
        <input required type="text" class="form-control" id="nombres" name="nombres">
      </div>
      <div class="form-group">
        <label for="apellidos">Apellidos</label>
        <input required type="text" class="form-control" id="apellidos" name="apellidos">
      </div>
      <div class="form-group">
        <label for="fdn">Fecha de Nacimiento</label>
        <input required type="text" class="form-control" id="fdn" name="fdn">
      </div>
      <div class="form-group">
        <label for="especialidad">Area de especialidad</label>
        <select class="form-control" id="especialidad" name="especialidad">
              <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) {?>
                  <option value="<?php echo $r['espec_id'] ?>"><?php echo $r['nombre'] ?></option>
              <?php } ?>
    </select>
      </div>
      <div class="form-group">
        <label for="email">Correo Electronico</label>
        <input required type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp">
        <small id="emailHelp" class="form-text text-muted">Jamas se compartirá su correo de manera publica</small>
      </div>
      <div class="form-group">
        <label for="celular">Celular</label>
        <input type="text" class="form-control" id="numero" name="numero" aria-describedby="ceHelp">
        <small id="celHelp" class="form-text text-muted">Jamas se compartirá su celular de manera publica</small>
      </div>
      <button type="submit" name="enviar" class="btn btn-primary btn-block">Enviar</button>
  </form>
<br><br><br><br><br>
<?php require_once 'includes/footer.php'; ?> 