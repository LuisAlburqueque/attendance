<?php 
  $title = 'Login';
  require_once 'includes/header.php';
  require_once 'db/conn.php';

  //si la data que se envió via form POST request, then...

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $usuario = strtolower(trim($_POST['usuario']));
    $password = $_POST['password'];
    $new_password = md5($password.$usuario);

    $result = $user->getUser($usuario,$new_password);
    if(!$result){
        echo '<div class="alert alert-danger">Usuario o Contraseña incorrectos </div>';
    }else{
        $_SESSION['usuario'] = $usuario;
        $_SESSION['userid'] = $result['id_usu'];
        header("Location: viewrecords.php");
    }
  }
?> 

<h1 class="text-center"><?php echo $title ?></h1>

    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
        <table class="table table-sm">
            <tr>
                <td><label for="usuario">Usuario: *</label></td>
                <td><input type="text" name="usuario" class="form-control" id="usuario" value="<?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo $_POST['usuario']; ?>">
                    <?php //if(empty($usuario) && $_SERVER['REQUEST_METHOD'] == 'POST') echo "<p class='text-danger'>$usuario_error</p>"; ?>
                </td>
            </tr>
            <tr>
                <td><label for="password">Contraseña: *</label></td>
                <td><input type="password" name="password" class="form-control" id="password">
                <?php // if(empty($pass) && isset($password_error)) echo "<p class='text-danger'>$password_error</p> "?>
                </td>
            </tr>
        </table><br/><br/>
        <input type="submit" value="Login" class="btn btn-primary btn-block"><br/>
        <a href="#">Olvidé mi contraseña</a>
    </form> <br/><br/><br/><br/>

<?php include_once 'includes/footer.php' ?>