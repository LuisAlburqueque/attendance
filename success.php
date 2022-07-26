<?php 
  $title = 'Exito';
  require_once 'includes/header.php';
  require_once 'db/conn.php';
  require_once 'sendemail.php';

  if(isset($_POST['enviar'])){
    //extracion de valores del array $_POST
    $nombres = $_POST['nombres'];
    $apellidos = $_POST['apellidos'];
    $fdn = $_POST['fdn'];
    $email = $_POST['email'];
    $numero = $_POST['numero'];
    $especialidad = $_POST['especialidad'];


    $orig_file = $_FILES["avatar"]["tmp_name"];
    $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
    $target_dir = 'uploads/';
    $destino = "$target_dir$numero.$ext";
    move_uploaded_file($orig_file,$destino);

    //llama a la funcion insert y revisa si funciona o no
    $isSuccess = $crud->insertAsistentes($nombres,$apellidos,$fdn,$email,$numero,$especialidad,$destino);
    $especialidadNombre = $crud->getEspecialidadesPorId($especialidad);

    if($isSuccess){
        //SendEmail::SendMail($email,'Te inscribiste en mi pagina :)', ':D' );
        include 'includes/successmsg.php';
    }else{
        include 'includes/errormsg.php';
    }
  }
?> 
        <!-- esto imprime los valores que pasamos a la pagina accion usando ewl metodo ="get" -->
        <!--
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title"><?php //echo $_GET['nombres'] . ' ' . $_GET['apellidos'];?></h5>
                <h6 class="card-subtitle mb-2 text-muted"><?php// echo $_GET['especialidad'];?></h6>
                <p class="card-text">
                Fecha de Nacimiento:  <?php //echo $_GET['fdn'];?>
                </p>
                <p class="card-text">
                Email: <?php //echo $_GET['email'];?>
                </p>
                <p class="card-text">
                Numero de Celular: <?php //echo $_GET['celular'];?>
                </p>
            </div>
        </div> -->
        <img src="<?php echo $destino; ?>" class="rounded-circle" style="width: 20%; height:20%">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">
                    <?php echo $_POST['nombres'] . ' ' . $_POST['apellidos'];?>
                </h5>
                <h6 class="card-subtitle mb-2 text-muted">
                    <?php echo $especialidadNombre['nombre'];?>
                </h6>
                <p class="card-text">
                Fecha de Nacimiento: <?php echo $_POST['fdn'];?>
                </p>
                <p class="card-text">
                Email: <?php echo $_POST['email'];?>
                </p>
                <p class="card-text">
                Numero de Celular: <?php echo $_POST['numero'];?>
                </p>
            </div>
        </div>

<br><br><br><br><br>
<?php require_once 'includes/footer.php'; ?>