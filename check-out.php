<?php
session_start();
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Refermat::Verificar</title>
<link rel="icon" href="img/index/favicon.png" sizes="16x16">
<!--css-->
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/style-carga.css" rel="stylesheet" type="text/css">
<!--BOOTSTRAP-->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css">
<!--fonts-->
<link href="https://fonts.googleapis.com/css?family=Karla:400,700" rel="stylesheet">
<link href="fonts/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="fonts/font/flaticon.css" rel="stylesheet" type="text/css">
<!--thumbnail-slider-->
<link href="css/lightslider.css" rel="stylesheet" type="text/css">
</head>

<!-- Redes Sociales-->
<?php include 'redes_sociales.php' ?>

<body>

<div class="index-new product-list checkout-page"><!--page wrap-->

<a href="javascript:" id="return-to-top"><i class="fa fa-angle-up"></i></a>

    <!--Top-bar-->
    <div id="top" class="container-fluid top-bar border">
        <div class="container">
            <div class="col-md-4 top-bar-left">
                <p><i class="flaticon-phone-call"></i>&nbsp;Contáctanos al: <b>981 278 969 - 01 541 8979</b></p>
            </div>

            <div class="col-md-8 text-right">
                <div class="bor log">
                    <?php
                    if (isset($_SESSION['user_name'])) {
                    ?>
                        <a href="#">
                            Usuario: <b><?php echo $_SESSION['user_name'] ?></b>
                            <a href="cerrar_sesion.php?url=index.php"><i class="fa fa-power-off"></i></a>
                        </a>
                    <?php } else if (!isset($_SESSION['user_name'])) {  ?>
                        <a href="login.php"><b>Inicia Sesión</b></a>
                    <?php } ?>
                </div>

                <div class="cart-item detalle-producto">
                    <?php if (isset($_SESSION['detalle']) && count($_SESSION['detalle']) > 0) { ?>
                        <div class="bor cart-det">
                            <i class="flaticon-shopping-bag"></i>&nbsp; <h2>Mi carrito</h2>
                        </div>

                        <div class="cart-item-hover">
                            <?php
                            $total = 0;
                            foreach ($_SESSION['detalle'] as $k => $detalle) {
                                $img = "sistema/" . $detalle['imagen'];
                            ?>

                                <div class="cart-item-list text-left">
                                    <img src="<?php echo $img; ?>" style="width: 120px; height: 120px" alt=""  />
                                    <a href="#">
                                        <h3><?php  if (strlen($detalle['producto'])>42)  {echo substr($detalle['producto'],0,42),'...';}else {echo $detalle['producto'];}; ?></h3>
                                    </a>
                                    <a href="#">
                                        <h3>Cantidad: <?php echo $detalle['cantidad']; ?></h3>
                                    </a>
                                    <b><button type="button" class="btn btn-xs btn-primary eliminar-producto" id="<?php echo $detalle['id']; ?>">X</button></b>

                                    <p>Precio.: S/. <?php echo $detalle['precio']; ?></p>
                                    <?php $total += $detalle['precio'] * $detalle['cantidad']; ?>
                                </div>

                                <div style="padding-top: 30px"></div>
                            <?php } ?>
                            <div class="border"></div>

                            <div class="cart-total">
                                <?php if (isset($_SESSION['user_name'])) { ?>
                                    <h6>Precio total: </h6>
                                    <p><?php echo "S/. " . $total; ?></p>
                                    <div class="clearfix"></div>
                                <?php } ?>
                                <a href="check-out.php" class="cart-checkout">Verificar</a>
                            </div>
                        </div>
                    <?php } ?>
                </div>

            </div>
        </div>
    </div>

<!--Navbar-->
<nav class="navbar navbar-default">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"><img src="img/index/logo.png" alt="" class="img-responsive" /></a>
        </div> 
      
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        
            <ul class="nav navbar-nav navbar-right" style="padding-top: 10px;">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="nosotros.php">Nosotros</a></li>
                <li><a href="productos.php">Productos</a></li>
                <li><a href="info_tecnica.php">Información Técnica</a></li>
                <li><a href="#contacto">Contacto</a></li>        
            </ul>
      
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav> 

<!--Search-bar-->
<div class="container-fluid search-bar">
    <div class="container">

        <div class="col-md-9"></div>
        
        <div class="col-md-3 soc text-right" style="padding-bottom: 10px;">
        	<ul>
            	<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </div>
</div>

<!-- <div class="container-fluid header-main checkout-bg">
    <div class="container text-center"> 
    </div></div> -->
<!--Header-->
    <div class="container-fluid">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                     <div class="item active">
                    <img class="full" src="img/index/1.jpg" alt="...">
                </div>
                <div class="item">
                    <img class="full" src="img/index/2.jpg" alt="...">
                </div>
                <div class="item">
                    <img class="full" src="img/index/3.jpg" alt="...">
                </div>
                <div class="item">
                    <img class="full" src="img/index/4.jpg" alt="...">
                </div>
            </div>

            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

<!--top-->
<div class="container product-table padd-80">

	<div class="col-md-12 alert-faq">
       	<div id="section1">¿Soy Cliente? <a href="login.php" target="_BLANK">Haga clic aquí para ingresar</a></div>
    </div>
    
    <div class="clearfix"></div>
    
    <div class="clearfix"></div>

    <form action="controller/class.envioMail.php" method="post">
        <div class="col-md-6">
        	<div class="row">
            	<div class="col-md-12"><h2>Detalles de pedido</h2></div>
                <div class="col-md-6">
                    <h4>Tipo Documento *</h4>
                <?php if (!isset($_SESSION['user_name'])){?>  
                    <select class="form-control" name = "cmbTipo" required="true" id= "cmbTipo">
                        <option value = "RUC">RUC</option>                
                        <option value = "DNI">DNI</option>
                        <option value = "CE">CE</option>
                        <option value = "Pasaporte">Pasaporte</option>
                        <option value = "PTP">PTP</option>
                        <option value = "OTRO">Otro Documento</option>                
                    </select> 
                <?php }else{?>
                <select class="form-control" name = "cmbTipo" required="true" id="cmbTipo" >
                            <option value = "RUC" <?php if (isset($_SESSION['lastname'])){if ($_SESSION['tipodoc']=="RUC"){echo "selected";}}else{echo "selected";} ?>>RUC</option>                
                            <option value = "DNI" <?php if ($_SESSION['tipodoc']=="DNI"){echo "selected";}?>>DNI</option>
                            <option value = "CE"  <?php if ($_SESSION['tipodoc']=="CE"){echo "selected";}?>>CE</option>
                            <option value = "Pasaporte" <?php if ($_SESSION['tipodoc']=="Pasaporte"){echo "selected";}?>>Pasaporte</option>
                            <option value = "PTP" <?php if ($_SESSION['tipodoc']=="PTP"){echo "selected";}?>>PTP</option>
                            <option value = "OTRO" <?php if ($_SESSION['tipodoc']=="OTRO"){echo "selected";}?>>Otro Documento</option>                
                </select>
                <?php }?>
             </div>
                <div class="col-md-6">
                    <h4>Documento Identidad *</h4><input class="form-control" type="text" name="txtRUC" required="true" value="<?php if (isset($_SESSION['documento'])){echo $_SESSION['documento'];} ?>">
                </div> 
            </div>
            <div class="row">               
                <div class="col-md-6">
                    <h4>Nombres</h4><input type="text" class="form-control" name="txtFirstname" required value="<?php if (isset($_SESSION['full_name'])){echo $_SESSION['full_name'];} ?>">
                </div>
                <div class="col-md-6">
                    <h4>Apellidos</h4><input type="text" class="form-control" name="txtLastName" required value="<?php if (isset($_SESSION['lastname'])){echo $_SESSION['lastname'];} ?>">
                </div>
                <div class="col-md-6">
                    <h4>Dirección de correo</h4><input class="form-control" type="email" name="txtEmailAddress" required value="<?php if (isset($_SESSION['user_email'])){echo $_SESSION['user_email'];} ?>">
                </div>
                <div class="col-md-6">
                    <h4>Telefono</h4><input class="form-control" type="text" min="1" pattern="^[0-9]+" name="txtPhone" id="txtPhone" onchange="validarSiNumero(this.value)" required value="<?php if (isset($_SESSION['phone'])){echo $_SESSION['phone'];} ?>">
                </div>
             </div>
            <div class="row">
                <div class="col-md-12">
                    <h4>Dirección Envio</h4>
                    <textarea class="form-control" type="text" value="" name="txtdireccion" style="text-transform:uppercase;padding-bottom:10px;padding-top: 10px"></textarea> 
                </div>      
            </div>


             <div class="row">
                <div class="col-md-12 Mensaje" id="Mensaje" style="padding-bottom:10px;padding-top: 10px"></div>
             </div>
        <!-- seccion de envio gratis -->
            <div class="col-sm-12 col-md-12" style="text-align: center;">
                <div class="service-body">
                 <div class="service-inner">
                    <i class="flaticon-1-transport" width="60%" ></i>
                    <h3>Envio Gratuito en Lima</h3>
                    <h5>Por pedidos mayores a S./250<br> de lo contrario S./9.9 en Lima Metropolitano.<br> Otro destino te estaran contactando</h5>
                    </div>
                </div>
            </div>

        </div>
    
        <div class="col-md-6">        	
            <div class="col-md-12 checkout"><h2>SU ORDEN</h2></div>            
            <?php             
            if(isset($_SESSION['detalle'])){
                $carrito = $_SESSION['detalle'];
                $total=0;
                
            ?>

            <div class="col-md-12 element-table detalle-final">
            	<div class="row">
                    <table>
                    <tr>
                        <th>Productos</th>
                        <th style="padding-left: 20px;">Cant.</th>
                        <th style="padding-left: 20px;">Precio</th>
                        <th style="padding-left: 20px;" class="text-right">Total</th>
                        <th></th>
                    </tr>

                    <?php
                        foreach ($carrito as $p) {
                            $total_uni=$p['cantidad']*$p['precio'];
                    ?>
                    
                    <tr>
                        <td><?php echo $p['producto'];?></td>
                        <td class="text-right">
                            <input type="number" class="cambia-cantidad" style="width: 60px" min="1" max="10000" step="1" name="txtCantidad" 
                                   product_id="<?php echo $p['id'];?>" stock="<?php echo $p['stock'];?>" value="<?php echo $p['cantidad'];?>" />
                            <input type="hidden" name="txtStock" product_id="<?php echo $p['id'];?>" value="<?php echo $p['stock'];?>" />
                        </td>
                        <td class="text-right"><?php echo "S/".number_format($p['precio'],2,".",",");?></td>
                        <td class="text-right"><?php echo "S/".number_format($total_uni  ,2,".",",");?></td>
                        <td> <button type="button" class="btn btn-sm eliminar-detalle" id="<?php echo $p['id'];?>"><i class="fa fa-trash"></i></button></td>
                    </tr>
                    <?php
                            $total+=$total_uni;
                        }
                    ?>
                    <tr>                        
                        <td class="text-uppercase"><b>Total</b></td>
                        <td colspan="3" class="total text-right"><?php echo "S/ ".number_format($total,2,".",",");?></td>
                    </tr>
                    
                    </table>
                </div>
            </div>
        <?php } ?>
        <div class="clearfix"></div>

        <!--metodos de pago-->
        <div class="col-md-12 pay-faq" hidden>
        	<h2>Métodos de Pago</h2>
            <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Transferencia o Depósito Bancario a <br> Refermat SAC RUC:20603430248</a>
                    </h3>
                </div>
                <div id="collapse1" class="panel-collapse collapse in">
                    <div class="panel-body"><p>BCP:  193-2532658-0-02 <br>CCI:002-193-002532658002-11 <br> Yape: 923 758 962</p></div>
                    <div class="panel-body"><p>BBVA: 0011-0179-93-0200530505<br>CCI:011-179-000200530505-93</p> </div>
                    <div class="panel-body"><p>Caja Huancayo: 107038-21-1002124427<br>CCI:808038-21-100212442747</p> </div>
                </div>
            </div>
            </div>
        </div>



        <?php if(isset($_SESSION['user_name'])){ ?>
            <button type="submit" class="btn btn-primary">Solicitar.</button>
        <?php } else if (!isset($_SESSION['user_name'])) { ?>
            <button type="submit" class="btn btn-primary">Solicitar</button>
        <?php } ?>
    </form>
        
    </div>
    
    <div class="clearfix"></div>

</div>
   
<!--footer-->
<div class="container-fluid footer-sec" id="contacto">
<div class="container padd-60">
	<div class="col-md-12 footer-top-sec">
        <div class="col-md-4 col-sm-2 footer-logo"><img src="img/index/refermat_2.png" alt="" class="img-responsive" /></div>
        <div class="col-md-4 col-sm-5 payment"></div>
        <div class="col-md-4 col-sm-5 social-sec text-center">
        <div class="social">
        	<div class="social-circle"><a href="#"><i class="fa fa-facebook-f" aria-hidden="true"></i></a></div>
        	<div class="social-circle"><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></div>
        	<div class="social-circle"><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></div>
        </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="col-md-12 pay-faq">
        	<h2>Métodos de Pago</h2>
            <div class="panel-group" id="accordion">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Transferencia o Depósito Bancario a <br> Refermat SAC RUC:20603430248</a>
                    </h3>
                </div>
                <div id="collapse1" class="panel-collapse collapse in">
                    <div class="panel-body"><p>BCP:  193-2532658-0-02 <br>CCI:002-193-002532658002-11 <br> Yape: 923 758 962</p></div>
                    <div class="panel-body"><p>BBVA: 0011-0179-93-0200530505<br>CCI:011-179-000200530505-93</p> </div>
                    <div class="panel-body"><p>Caja Huancayo: 107038-21-1002124427<br>CCI:808038-21-100212442747</p> </div>
                </div>
            </div>
            </div>
        </div>

    <div class="col-md-12 call">
    	<h3>INFORMACION DE CONTACTO</h3>
        <div class="col-md-4 col-sm-4 email">
        	<i class="flaticon-phone-call"></i>
        	<h3>TELÉFONOS</h3>
            <h2> 981 278 969</h2>
            <p>01 541 8979</p>
        </div>
        <div class="col-md-4 col-sm-4 email">
        	<i class="flaticon-placeholder-1"></i>
        	<h3>DIRECCION</h3>
            <p>Av. Maquinarias 1891</p>
            <p>Cercado de Lima</p>
        </div>
        <div class="col-md-4 col-sm-4 email">
        	<i class="flaticon-e-mail-envelope"></i>
        	<h3>EMAIL</h3>
            <p>infoperu@refermat.com</p>
        </div>
    </div>
</div>
</div>

<div class="container-fluid copy-right">
	<div class="container">
    	<div class="col-md-4 col-sm-3 copy-text">
        	<p>© 2020 <a href="#">Tienda Refermat</a>.</p>
        </div>
        <div class="col-md-8 col-xs-12 col-sm-9 terms-condition text-right">
        </div>
    </div>
</div>
</div><!--/page wrap-->

<!--js-->
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>

<!--checkout-->
<script src="js/jquery.accordion.js"></script>
<script>
    const options2 = { style: 'currency', currency: 'USD' };
    var numberFormat2 = new Intl.NumberFormat('en-US', options2);

    $(document).ready(function() {
        $('.accordion').accordion({defaultOpen: 'some_id'}); //some_id section1 in demo
    });
</script> 
<!--custom-->
<script src="js/custom.js"></script>
<script language=JavaScript>

$(document).keydown(function (event) {
    if (event.keyCode == 123) { // Prevent F12
        return false;
    } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I        
        return false;
    }
});

/*$(document).on("contextmenu", function (e) {        
    e.preventDefault();
});*/

</script>
<!-- <script src="js/contact_me.js"></script> -->
<script type="text/javascript" src="js/ajax.js"></script>

<script>


function validarSiNumero(numero){
    var output = document.getElementById('Mensaje');
    var container = "";
    document.getElementById('txtPhone').style="border-color: default;"
        if(!/^([0-9])*$/.test(numero)){
            document.getElementById('txtPhone').value="";
            document.getElementById('txtPhone').style="border-color: red;"

            container="<div class='alert alert-danger'><a class='close' data-dismiss='alert'>×</a><span>El valor "+numero+" no es un número</span></div>";
        }
        else {

        }
     output.innerHTML=container;           
    }

    
</script>

</body>
</html>