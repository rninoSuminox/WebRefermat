<!--
Author: Softbarz @ Todos los Derechos Reservados
Jonathan Benavides Gonzalez RPC:962375665
-->
<!DOCTYPE html>
<html lang="es">
<head>
<title>Refermat::Login Usuario</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style_login.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
</head>
    
<body>

<div class="col-md-4 col-md-offset-4">

    <div class="col-md-12 bodLogin">
        
        <div class="col-md-12 imgLogin">
            <a href="index.php">
                <img src="img/index/logo.jpeg" width="120" />
            </a>
        </div>

        <br>

        <div class="loginCab">
            <p class="titLogin">Acceso para clientes registrados</sub></p>
        </div>

        <hr />

        <form class="form-horizontal" action="procesar.php?modo=login" method="POST" id="formulario">
            <p class="subTitLogin">
              <?php
                if (isset($_SESSION['error'])){
                  echo $_SESSION['error'];
                  session_destroy();
                }
              ?>
            </p>
            <div class="input-group">
                <span class="input-group-addon transparent"><span class="fa fa-user"></span></span>
                <input type="mail" name="user" id="username" class="form-control left-border-none" placeholder="Usuario" required />
            </div>

            <br>

            <div class="input-group">
                <span class="input-group-addon transparent"><span class="fa fa-lock"></span></span>
                <input type="password" name="passw" id="password" class="form-control left-border-none" placeholder="Clave" required />
            </div>
            <!-- Input oculto para identificar el formulario -->
            <div class="form-group">
                <input type="hidden" name="login" value="1">
            </div>
            <!-- Fin de input oculto -->
            <div class="form-actions">
                <div class="col-sm-12 col-xs-12 alignRigth">
                    <div class="row">
                        <a href="index.php" class="btn btn-lg btn-primary"><span class="fa fa-angle-double-left/"></span> Retornar </a>   
                        <button type="submit" class="btn btn-lg btn-primary">Entrar <span class="fa fa-angle-double-right"></span></button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <div class="col-sm-12" style="margin-bottom: 10px; text-align: center;">
        <?php
            if(isset($_GET['modo']) and $_GET['modo']=='mensaje') {
                $_GET['modo'] = "Usuario Registrado con éxito";
                echo "<div class='alert alert-success' role='alert'>".$_GET['modo']."</div>";
            } else if(isset($_GET['modo']) and $_GET['modo']=='error') {
                $_GET['modo'] = "Ocurrió un problema..!";
                echo "<div class='alert alert-danger' role='alert'>".$_GET['modo']."</div>";
            }
        ?>
    </div>

</div>

</body>

</html>
