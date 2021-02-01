<?php
session_start();
require_once("sistema/config_pw/db.php");
require_once("sistema/config_pw/conexion.php");
?>
<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Refermat::Inicio</title>
    <link rel="icon" href="img/index/favicon.png" sizes="16x16">
    <!--BOOTSTRAP-->
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css">
    <!--css-->
    <link href="css/style-1.css" rel="stylesheet" type="text/css">
    <link href="css/style-carga.css" rel="stylesheet" type="text/css">

    <!--fonts-->
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700" rel="stylesheet">
    <link href="fonts/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="fonts/font/flaticon.css" rel="stylesheet" type="text/css">
    <!--slider-->
    <link href="css/owl.carousel.min.css" rel="stylesheet">
    <link href="css/theme.css" rel="stylesheet">
    <!--testimonial-slider-->
    <link href="css/testimonial.css" rel="stylesheet">
    <!--Revolution-->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script> -->
    <script src="js/jquery.min.js"></script>

    <script src="js/peticion.js"></script>
    <link rel="stylesheet" type="text/css" href="revolution/css/settings.css">
    <script src="revolution/js/jquery.themepunch.tools.min.js"></script>
    <script src="revolution/js/jquery.themepunch.revolution.min.js"></script>
    <!--Mensaje de agregado-->
    <link rel="stylesheet" href="Toast/toastr.min.css">

</head>

<!-- Redes Sociales-->
<?php include 'redes_sociales.php' ?>

<body>

    <script src="js/jquery.js"></script>
    <script src="Toast/toastr.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

  <!--  <div class="preloader-wrapper">
        <div class="preloader">
            <img src="img/index/preloader.gif" alt="">
        </div>
    </div>-->


    <a href="javascript:" id="return-to-top"><i class="fa fa-angle-up"></i></a>

    <!--Top-bar-->
    <div id="top" class="container-fluid top-bar border">
        <div class="container">
            <div class="col-md-4 top-bar-left">
                <p><i class="flaticon-phone-call"></i>&nbsp;Contactanos llamando al: <b>981 278 969 - 01 541 8979</b></p>
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
                                    <img src="<?php echo $img; ?>" style="width: 120px; height: 120px" alt="" />
                                    <a href="#">
                                        <h3><?php if (strlen($detalle['producto']) > 42) {
                                                echo substr($detalle['producto'], 0, 42), '...';
                                            } else {
                                                echo $detalle['producto'];
                                            }; ?></h3>
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

                                <h6>Precio. total: </h6>
                                <p><?php echo "S/. " . $total; ?></p>
                                <div class="clearfix"></div>

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
            <div class="col-md-3 col-xs-6 categories">
                <ul>
                    <li class="sub-menu">
                        <a class="main-a" href="javascript:void(0)">TODAS LAS CATEGORIAS<i class='fa fa-angle-down'></i></a>
                        <ul>
                            <li>
                                <a href="productos.php?pagina=1&amp;fam=BAÑOS Y COCINAS">BAÑOS Y COCINAS </a>
                                <div class="categories-mega-menu">
                                    <div class="categories-main-menu">
                                        <span>
                                            <a href="productos.php?pagina=1&amp;sub_fam=BAÑOS Y COCINAS" class="title">BAÑOS Y COCINAS</a>
                                            <a href="productos.php?pagina=1&amp;categ=ACCESORIOS BAÑO">ACCESORIOS BAÑO</a>
                                            <a href="productos.php?pagina=1&amp;categ=ACCESORIOS COCINA">ACCESORIOS COCINA</a>
                                            <a href="productos.php?pagina=1&amp;categ=GRIFERIA DUCHA/ BAÑERA Y BIDET">GRIFERIA DUCHA/ BAÑERA Y BIDET</a>
                                            <a href="productos.php?pagina=1&amp;categ=GRIFERIA LAVAMANOS">GRIFERIA LAVAMANOS</a>
                                            <a href="productos.php?pagina=1&amp;categ=GRIFERIA COCINA">GRIFERIA COCINA</a>
                                            <a href="productos.php?pagina=1&amp;categ=LAVADEROS COCINA">LAVADEROS COCINA</a>
                                        </span>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <a href="productos.php?pagina=1&amp;fam=ACABADOS">ACABADOS </a>
                                <div class="categories-mega-menu">
                                    <div class="categories-main-menu">
                                        <span>
                                            <a href="productos.php?pagina=1&amp;sub_fam=PINTURAS Y ACCESORIOS" class="title">PINTURAS Y ACCESORIOS</a>
                                            <a href="productos.php?pagina=1&amp;categ=BROCHAS">BROCHAS</a>
                                            <a href="productos.php?pagina=1&amp;categ=EQUIPOS DE PINTURA/PISTOLAS">EQUIPOS DE PINTURA/PISTOLAS</a>
                                            <a href="productos.php?pagina=1&amp;categ=RODILLOS Y ACCESORIOS">RODILLOS Y ACCESORIOS</a>
                                            <a href="productos.php?pagina=1&amp;categ=ESPATULA / LLANAS / CEPILLO">ESPATULA / LLANAS / CEPILLO</a>
                                        </span>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <a href="productos.php?pagina=1&amp;fam=FERRETERIAS">FERRETERIAS </a>
                                <div class="categories-mega-menu">
                                    <div class="categories-main-menu">
                                        <span>
                                            <a href="productos.php?pagina=1&amp;sub_fam=PLOMERIA/GASFITERIA" class="title">PLOMERIA/GASFITERIA</a>
                                            <a href="productos.php?pagina=1&amp;categ=ACCESORIOS">ACCESORIOS</a>
                                            <a href="productos.php?pagina=1&amp;categ=VALVULAS Y LLAVES">VALVULAS Y LLAVES</a>
                                            <a href="productos.php?pagina=1&amp;categ=MANGUERAS O TUBOS DE CONEXION">MANGUERAS O TUBOS DE CONEXION</a>
                                            <a href="productos.php?pagina=1&amp;categ=TUBOS Y CONEXIONES COBRE">TUBOS Y CONEXIONES COBRE</a>
                                            <a href="productos.php?pagina=1&amp;categ=TUBOS Y CONEXIONES PVC O ABS">TUBOS Y CONEXIONES PVC O ABS</a>
                                            <a href="productos.php?pagina=1&amp;categ=REJILLAS">REJILLAS</a>
                                        </span>
                                        <span>
                                            <a href="productos.php?pagina=1&amp;sub_fam=AUTOMOVILES/MOTO" class="title">AUTOMOVILES/MOTO</a>
                                            <a href="productos.php?pagina=1&amp;categ=SEGURIDAD">SEGURIDAD</a>
                                        </span>
                                        <span>
                                            <a href="productos.php?pagina=1&amp;sub_fam=HERRAMIENTAS" class="title">HERRAMIENTAS</a>
                                            <a href="productos.php?pagina=1&amp;categ=ACCESORIOS HERRAMIENTAS">ACCESORIOS HERRAMIENTAS</a>
                                            <a href="productos.php?pagina=1&amp;categ=DISCO CORTE / ABRASIVOS">DISCO CORTE / ABRASIVOS</a>
                                            <a href="productos.php?pagina=1&amp;categ=HERRAMIENTAS DE MEDICION">HERRAMIENTAS DE MEDICION</a>
                                            <a href="productos.php?pagina=1&amp;categ=HERRAMIENTAS MANUALES">HERRAMIENTAS MANUALES</a>
                                            <a href="productos.php?pagina=1&amp;categ=ADHESIVOS">ADHESIVOS</a>
                                            <a href="productos.php?pagina=1&amp;categ=LIMA/SIERRAS">LIMA/SIERRAS</a>
                                        </span>
                                        <span>
                                            <a href="productos.php?pagina=1&amp;sub_fam=CERRAJERIA Y SEGURIDAD" class="title">CERRAJERIA Y SEGURIDAD</a>
                                            <a href="productos.php?pagina=1&amp;categ=CANDADOS">CANDADOS</a>
                                            <a href="productos.php?pagina=1&amp;categ=CILINDROS">CILINDROS</a>
                                            <a href="productos.php?pagina=1&amp;categ=CERRADURAS DE EMBUTIR">CERRADURAS DE EMBUTIR</a>
                                            <a href="productos.php?pagina=1&amp;categ=CERRADURAS DE SOBREPONER">CERRADURAS DE SOBREPONER</a>
                                            <a href="productos.php?pagina=1&amp;categ=CERRAJERIA DE MANILLA">CERRAJERIA DE MANILLA</a>
                                            <a href="productos.php?pagina=1&amp;categ=CERRAJERIA DE POMO">CERRAJERIA DE POMO</a>
                                            <a href="productos.php?pagina=1&amp;categ=CERROJOS">CERROJOS</a>
                                        </span>
                                        <span>
                                            <a href="productos.php?pagina=1&amp;sub_fam=HERRAJERIA" class="title">HERRAJERIA</a>
                                            <a href="productos.php?pagina=1&amp;categ=BISAGRAS">BISAGRAS</a>
                                            <a href="productos.php?pagina=1&amp;categ=MIRILLA">MIRILLA</a>
                                            <a href="productos.php?pagina=1&amp;categ=CORREDERAS">CORREDERAS</a>
                                        </span>
                                        <span>
                                            <a href="productos.php?pagina=1&amp;sub_fam=SEGURIDAD INDUSTRIAL" class="title">SEGURIDAD INDUSTRIAL</a>
                                            <a href="productos.php?pagina=1&amp;categ=LENTES">LENTES</a>
                                            <a href="productos.php?pagina=1&amp;categ=CASCOS">CASCOS</a>
                                            <a href="productos.php?pagina=1&amp;categ=GUANTES">GUANTES</a>
                                            <a href="productos.php?pagina=1&amp;categ=MASCARILLAS">MASCARILLAS</a>
                                            <a href="productos.php?pagina=1&amp;categ=PROTECTOR AUDITIVO">PROTECTOR AUDITIVO</a>
                                        </span>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <a href="productos.php?pagina=1&amp;fam=AGRICOLA Y JARDIN">AGRICOLA Y JARDIN </a>
                                <div class="categories-mega-menu">
                                    <div class="categories-main-menu">
                                        <span>
                                            <a href="productos.php?pagina=1&amp;sub_fam=HERRAMIENTAS" class="title">HERRAMIENTAS</a>
                                            <a href="productos.php?pagina=1&amp;categ=HERRAMIENTAS MANUALES">HERRAMIENTAS MANUALES</a>
                                        </span>
                                        <span>
                                            <a href="productos.php?pagina=1&amp;sub_fam=RIEGO" class="title">RIEGO</a>
                                            <a href="productos.php?pagina=1&amp;categ=CONEXIONES">CONEXIONES</a>
                                            <a href="productos.php?pagina=1&amp;categ=ASPERSORES">ASPERSORES</a>
                                        </span>
                                    </div>
                                </div>
                            </li>

                            <li>
                                <a href="productos.php?pagina=1&amp;fam=REPUESTOS">REPUESTOS </a>
                                <div class="categories-mega-menu">
                                    <div class="categories-main-menu">
                                        <span>
                                            <a href="productos.php?pagina=1&amp;sub_fam=GRIFERIA" class="title">GRIFERIA</a>
                                            <a href="productos.php?pagina=1&amp;categ=CARTUCHOS / DISCOS">CARTUCHOS / DISCOS</a>
                                        </span>
                                        <span>
                                            <a href="productos.php?pagina=1&amp;sub_fam=SANITARIO" class="title">SANITARIO</a>
                                            <a href="productos.php?pagina=1&amp;categ=TANQUE">TANQUE</a>
                                            <a href="productos.php?pagina=1&amp;categ=TAZA">TAZA</a>
                                        </span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="col-md-6 col-xs-6 search">
                <form action="productos.php?pagina=1" method="post">
                    <input type="text" name="search" placeholder="Busqueda" />
                    <div class="round search-round">
                        <button type='submit' class="btn btn-primary" value="Buscar"><span class="fa fa-search"></button>
                    </div>
                </form>
            </div>

            <div class="col-md-3 col-xs-3 soc text-right">
                <ul>
                    <li><a href="https://www.facebook.com/RefermatPeru/" target="_blank"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                    <li><a href="#" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.instagram.com/refermat.peru/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                    <li><a href="https://www.youtube.com/channel/UCL1ELDEmobsXqojPNEvG97A" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
                </ul>
            </div>
        </div>
    </div>

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
                <div class="item active"><img class="full" src="img/index/1.jpg" alt="..."></div>
                <div class="item">       <img class="full" src="img/index/2.jpg" alt="..."></div>
                <div class="item">       <img class="full" src="img/index/3.jpg" alt="..."></div>
                <div class="item">       <img class="full" src="img/index/4.jpg" alt="..."></div>
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

    <div style="margin-top: 20px"></div>
    <!--Latest-product-->
    <div class="container latest-product padd-80">
        <div id="titulo" class="col-md-12 sec-head text-center">
            <h3 style="font-size: 26px">Los mejores productos al mejor precio!</h3>
            <span></span>
        </div>

        <div class="clearfix"></div>

        <!-- productos, se coloca fijo para mejorar carga de pagina de inicio-->
        <div class="col-md-12 col-sm-12 mt-30">
            <div class="row">
                <div class="col-md-4 col-sm-4 text-left">

                    <div class="product">
                        <div class="product-img">
                            <a href="" data-toggle="modal" data-target="#quick-modal669">
                                <img src="sistema/img/productos/1586790948_F1-350300009.jpg" style="width: 220px; height: 220px" alt="" class="img-home">
                            </a>
                           
                        </div>
                        <div class="product-body">
                            <div style="height: 40px;">
                                <p><a href="#">CANDADOS MARINOS 30mm</a></p>
                            </div>

                            <h4 style="font-size: 16px;">Precio: S/. 19.5</h4>

                            <div class="product-body">
                                <form action="">
                                    <div class="detail-row quantity-box">
                                        <div id="field1" class="input--filled" style="padding-left: 20px;">
                                            <input type="number" name="cantidad" id="cantidad669" min="1" max="1000" step="1" value="1" onchange="validastock(669)">
                                            <div class="clearfix"></div>
                                        </div>
                                        <input type="hidden" id="producto669" value="CANDADOS MARINOS 30mm">
                                        <input type="hidden" id="precio669" value="19.5">
                                        <input type="hidden" id="id669" value="669">
                                        <input type="hidden" id="stock669" value="1">
                                        <button type="button" id="agregar669" style="background-color: #1F487E; color: white; width: 120px; height: 50px; border-radius: 16px;">AGREGAR.</button>
                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    $('#agregar669').click(function() {
                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": false,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "800",
                            "timeOut": "800",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        toastr["success"]("Articulo Agregado.", "Refermat");
                        var producto = document.getElementById('producto669').value;
                        var precio = document.getElementById('precio669').value;
                        var cantidad = document.getElementById('cantidad669').value;
                        var id = document.getElementById('id669').value;
                        var stock = document.getElementById('stock669').value;

                        var ruta = "prod=" + producto + "&pre=" + precio + "&cant=" + cantidad + "&cod=" + id + "&stk=" + stock;

                        $.ajax({
                            url: 'header.php',
                            type: 'POST',
                            data: ruta,
                            dataType: 'json',
                            success: function(data) {
                                if (data.success == true) {
                                    $(".detalle-producto").load('detalle.php');
                                } else {
                                    alertify.error(data.msj);
                                }
                            },
                            error: function(jqXHR, textStatus, error) {
                                alertify.error(error);
                            }
                        })
                    });
                </script>

                <!--modal-->


                <div class="modal fade quick-modal in" id="quick-modal669" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">X</span>
                                </button>
                                <div class="col-md-5">



                                    <div id="carousel669" class="carousel slide" data-ride="carousel">

                                        <ol class="carousel-indicators">
                                            <li data-target="#carousel669" class="slide0" data-slide-to="0"></li>
                                            <li data-target="#carousel669" class="slide1 active" data-slide-to="1"></li>
                                        </ol>

                                        <div class="carousel-inner" role="listbox">
                                            <div class="item active left" data-thumb="0">
                                                <img src="sistema/img/productos/1586790948_F1-350300009.jpg" alt="" style="width: 380px; height: 380px; cursor:pointer" data-toggle="modal" data-target="#myModal_img669" data-myvalue="sistema/img/productos/1586790948_F1-350300009.jpg" class="open-Dialog">
                                            </div>
                                            <div class="item next left" data-thumb="1"> <img src="sistema/img/productos/1589911460_Imagen1.jpg" alt="" style="width: 380px; height: 380px; cursor:pointer" data-toggle="modal" data-target="#myModal_img669" data-myvalue2="sistema/img/productos/1589911460_Imagen1.jpg" class="open-Dialog3"> </div>
                                        </div>
                                    </div>

                                    <a class="left carousel-control" href="#carousel669" role="button" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#carousel669" role="button" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>

                                <div class="col-md-7 detail-right">
                                    <div class="detail-top">
                                        <h1>CANDADOS MARINOS 30mm</h1>
                                        <div class="rating">
                                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="rate">

                                            <h2>Precio: S/. 19.5 </h2>

                                            <label class="offer-label">-0 %</label>

                                            <span><i class="fa fa-check-circle"></i> En stock</span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <div class="sub-menu">
                                            <a href="">Descripción</a>
                                            <p>Ideal para ser colocado en muebles, lockers y dem?s objetos que se encuentren en la interperie y que deseen proteger. Alta protecci?n anticorrosiva ofreciendo resistencia a ambientes clim?ticos o marinos adversos e Incluye 2 llaves perfil universal modelo 1430</p>
                                        </div>
                                    </div>
                                    <div class="detail feature">
                                        <div class="sub-menu">
                                            <div class="detail-btm">

                                                <form action="">
                                                    <div class="detail-row quantity-box">
                                                        <p class="text-uppercase">Cantidad</p>
                                                        <div class="clearfix"></div>
                                                        <div id="field1" class="input--filled">
                                                            <input type="number" name="cantidad" id="cant669" min="1" max="1000" step="1" value="1" class="field" onchange="validastock2(669)">
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <input type="hidden" id="producto669" value="CANDADOS MARINOS 30mm">

                                                        <input type="hidden" id="precio669" value="19.5">
                                                        <input type="hidden" id="stk669" value="1">
                                                        <input type="hidden" id="id669" value="669">
                                                        <button type="button" id="add2669" style="background-color: #1F487E; color: white; width: 120px; height: 50px; border-radius: 16px;" data-dismiss="modal">
                                                            AGREGAR
                                                        </button>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </form>

                                                <div class="detail-row">
                                                    <p><span>Codigo:</span> 350300009</p>
                                                    <p><span>- Codigo Proveedor:</span> 12640084</p>
                                                </div>

                                                <div class="detail-row">
                                                    <p><span>CategorÍ&shy;a:</span> CANDADOS</p>
                                                </div>

                                                <div class="detail-row">
                                                    <p><span>Marca:</span> CISA</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <script type="text/javascript">
                    $('#add2669').click(function() {
                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": false,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "800",
                            "timeOut": "800",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        toastr["success"]("Articulo Agregado.", "Refermat");
                        var producto2 = document.getElementById('producto669').value;
                        var precio2 = document.getElementById('precio669').value;
                        var cantidad2 = document.getElementById('cant669').value;
                        var id2 = document.getElementById('id669').value;
                        var stock2 = document.getElementById('stock669').value;

                        var ruta = "prod=" + producto2 + "&pre=" + precio2 + "&cant=" + cantidad2 + "&cod=" + id2 + "&stk=" + stock2;

                        $.ajax({
                            url: 'header.php',
                            type: 'POST',
                            data: ruta,
                            dataType: 'json',
                            success: function(data) {
                                if (data.success == true) {
                                    $(".detalle-producto").load('detalle.php');
                                } else {
                                    alertify.error(data.msj);
                                }
                            },
                            error: function(jqXHR, textStatus, error) {
                                alertify.error(error);
                            }
                        })
                        this.close();
                    });
                </script>

                <!--modal_img-->

                <div id="myModal_img669" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <h4 class="modal-title">&nbsp;</h4>
                            </div>
                            <div class="modal-body">
                                <img src="sistema/img/productos/1589911460_Imagen1.jpg" class="img-responsive" name="imgID" id="imgID" style="width: 100%">
                            </div>
                        </div>
                    </div>
                </div>

                <div id="myModal_vid669" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <h4 class="modal-title">&nbsp;</h4>
                            </div>
                            <div class="modal-body">
                                <iframe width="100%" height="380" name="vidID" id="vidID" allowfullscreen="">
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 text-left">

                    <div class="product">
                        <div class="product-img">
                            <a href="" data-toggle="modal" data-target="#quick-modal1265">
                                <img src="sistema/img/productos/1586790948_F1-350300009.jpg" style="width: 220px; height: 220px" alt="" class="img-home">
                            </a>
                        
                        </div>
                        <div class="product-body">
                            <div style="height: 40px;">
                                <p><a href="#">CANDADOS MARINOS</a></p>
                            </div>

                            <h4 style="font-size: 16px;">Precio: S/. 19.5</h4>

                            <div class="product-body">
                                <form action="">
                                    <div class="detail-row quantity-box">
                                        <div id="field1" class="input--filled" style="padding-left: 20px;">
                                            <input type="number" name="cantidad" id="cantidad1265" min="1" max="1000" step="1" value="1" onchange="validastock(1265)">
                                            <div class="clearfix"></div>
                                        </div>
                                        <input type="hidden" id="producto1265" value="CANDADOS MARINOS">
                                        <input type="hidden" id="precio1265" value="19.5">
                                        <input type="hidden" id="id1265" value="1265">
                                        <input type="hidden" id="stock1265" value="0">
                                        <button type="button" id="agregar1265" style="background-color: #1F487E; color: white; width: 120px; height: 50px; border-radius: 16px;">AGREGAR.</button>
                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    $('#agregar1265').click(function() {
                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": false,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "800",
                            "timeOut": "800",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        toastr["success"]("Articulo Agregado.", "Refermat");
                        var producto = document.getElementById('producto1265').value;
                        var precio = document.getElementById('precio1265').value;
                        var cantidad = document.getElementById('cantidad1265').value;
                        var id = document.getElementById('id1265').value;
                        var stock = document.getElementById('stock1265').value;

                        var ruta = "prod=" + producto + "&pre=" + precio + "&cant=" + cantidad + "&cod=" + id + "&stk=" + stock;

                        $.ajax({
                            url: 'header.php',
                            type: 'POST',
                            data: ruta,
                            dataType: 'json',
                            success: function(data) {
                                if (data.success == true) {
                                    $(".detalle-producto").load('detalle.php');
                                } else {
                                    alertify.error(data.msj);
                                }
                            },
                            error: function(jqXHR, textStatus, error) {
                                alertify.error(error);
                            }
                        })
                    });
                </script>

                <!--modal-->


                <div class="modal fade quick-modal in" id="quick-modal1265" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">X</span>
                                </button>
                                <div class="col-md-5">



                                    <div id="carousel1265" class="carousel slide" data-ride="carousel">

                                        <ol class="carousel-indicators">
                                            <li data-target="#carousel1265" class="slide0" data-slide-to="0"></li>
                                            <li data-target="#carousel1265" class="slide1 active" data-slide-to="1"></li>
                                        </ol>

                                        <div class="carousel-inner" role="listbox">
                                            <div class="item active left" data-thumb="0">
                                                <img src="sistema/img/productos/1586790948_F1-350300009.jpg" alt="" style="width: 380px; height: 380px; cursor:pointer" data-toggle="modal" data-target="#myModal_img1265" data-myvalue="sistema/img/productos/1586790948_F1-350300009.jpg" class="open-Dialog">
                                            </div>
                                            <div class="item next left" data-thumb="1"> <img src="sistema/img/productos/1589911460_Imagen1.jpg" alt="" style="width: 380px; height: 380px; cursor:pointer" data-toggle="modal" data-target="#myModal_img1265" data-myvalue2="sistema/img/productos/1589911460_Imagen1.jpg" class="open-Dialog3"> </div>
                                        </div>
                                    </div>

                                    <a class="left carousel-control" href="#carousel1265" role="button" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#carousel1265" role="button" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>

                                <div class="col-md-7 detail-right">
                                    <div class="detail-top">
                                        <h1>CANDADOS MARINOS</h1>
                                        <div class="rating">
                                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="rate">

                                            <h2>Precio: S/. 19.5 </h2>

                                            <label class="offer-label">-0 %</label>

                                            <span><i class="fa fa-check-circle"></i> En stock</span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <div class="sub-menu">
                                            <a href="">Descripción</a>
                                            <p>Ideal para ser colocado en muebles, lockers y dem?s objetos que se encuentren en la interperie y que deseen proteger. Alta protecci?n anticorrosiva ofreciendo resistencia a ambientes clim?ticos o marinos adversos e Incluye 2 llaves perfil universal modelo 1430</p>
                                        </div>
                                    </div>
                                    <div class="detail feature">
                                        <div class="sub-menu">
                                            <div class="detail-btm">

                                                <form action="">
                                                    <div class="detail-row quantity-box">
                                                        <p class="text-uppercase">Cantidad</p>
                                                        <div class="clearfix"></div>
                                                        <div id="field1" class="input--filled">
                                                            <input type="number" name="cantidad" id="cant1265" min="1" max="1000" step="1" value="1" class="field" onchange="validastock2(1265)">
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <input type="hidden" id="producto1265" value="CANDADOS MARINOS">

                                                        <input type="hidden" id="precio1265" value="19.5">
                                                        <input type="hidden" id="stk1265" value="0">
                                                        <input type="hidden" id="id1265" value="1265">
                                                        <button type="button" id="add21265" style="background-color: #1F487E; color: white; width: 120px; height: 50px; border-radius: 16px;" data-dismiss="modal">
                                                            AGREGAR
                                                        </button>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </form>

                                                <div class="detail-row">
                                                    <p><span>Codigo:</span> 9350300009</p>
                                                    <p><span>- Codigo Proveedor:</span> 12640084</p>
                                                </div>

                                                <div class="detail-row">
                                                    <p><span>CategorÍ&shy;a:</span> CANDADOS</p>
                                                </div>

                                                <div class="detail-row">
                                                    <p><span>Marca:</span> CISA</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <script type="text/javascript">
                    $('#add21265').click(function() {
                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": false,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "800",
                            "timeOut": "800",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        toastr["success"]("Articulo Agregado.", "Refermat");
                        var producto2 = document.getElementById('producto1265').value;
                        var precio2 = document.getElementById('precio1265').value;
                        var cantidad2 = document.getElementById('cant1265').value;
                        var id2 = document.getElementById('id1265').value;
                        var stock2 = document.getElementById('stock1265').value;

                        var ruta = "prod=" + producto2 + "&pre=" + precio2 + "&cant=" + cantidad2 + "&cod=" + id2 + "&stk=" + stock2;

                        $.ajax({
                            url: 'header.php',
                            type: 'POST',
                            data: ruta,
                            dataType: 'json',
                            success: function(data) {
                                if (data.success == true) {
                                    $(".detalle-producto").load('detalle.php');
                                } else {
                                    alertify.error(data.msj);
                                }
                            },
                            error: function(jqXHR, textStatus, error) {
                                alertify.error(error);
                            }
                        })
                        this.close();
                    });
                </script>

                <!--modal_img-->

                <div id="myModal_img1265" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <h4 class="modal-title">&nbsp;</h4>
                            </div>
                            <div class="modal-body">
                                <img src="sistema/img/productos/1589911460_Imagen1.jpg" class="img-responsive" name="imgID" id="imgID" style="width: 100%">
                            </div>
                        </div>
                    </div>
                </div>

                <div id="myModal_vid1265" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <h4 class="modal-title">&nbsp;</h4>
                            </div>
                            <div class="modal-body">
                                <iframe width="100%" height="380" name="vidID" id="vidID" allowfullscreen="">
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 text-left">

                    <div class="product">
                        <div class="product-img">
                            <a href="" data-toggle="modal" data-target="#quick-modal1281">
                                <img src="sistema/img/productos/1586792533_F1-350600008.jpg" style="width: 220px; height: 220px" alt="" class="img-home">
                            </a>
                           
                        </div>
                        <div class="product-body">
                            <div style="height: 40px;">
                                <p><a href="#">CERR. JP C/S MODELO 1 C/P MODELO 1 C/P</a></p>
                            </div>

                            <h4 style="font-size: 16px;">Precio: S/. 79.9</h4>

                            <div class="product-body">
                                <form action="">
                                    <div class="detail-row quantity-box">
                                        <div id="field1" class="input--filled" style="padding-left: 20px;">
                                            <input type="number" name="cantidad" id="cantidad1281" min="1" max="1000" step="1" value="1" onchange="validastock(1281)">
                                            <div class="clearfix"></div>
                                        </div>
                                        <input type="hidden" id="producto1281" value="CERR. JP C/S MODELO 1 C/P MODELO 1 C/P">
                                        <input type="hidden" id="precio1281" value="79.9">
                                        <input type="hidden" id="id1281" value="1281">
                                        <input type="hidden" id="stock1281" value="0">
                                        <button type="button" id="agregar1281" style="background-color: #1F487E; color: white; width: 120px; height: 50px; border-radius: 16px;">AGREGAR.</button>
                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    $('#agregar1281').click(function() {
                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": false,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "800",
                            "timeOut": "800",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        toastr["success"]("Articulo Agregado.", "Refermat");
                        var producto = document.getElementById('producto1281').value;
                        var precio = document.getElementById('precio1281').value;
                        var cantidad = document.getElementById('cantidad1281').value;
                        var id = document.getElementById('id1281').value;
                        var stock = document.getElementById('stock1281').value;

                        var ruta = "prod=" + producto + "&pre=" + precio + "&cant=" + cantidad + "&cod=" + id + "&stk=" + stock;

                        $.ajax({
                            url: 'header.php',
                            type: 'POST',
                            data: ruta,
                            dataType: 'json',
                            success: function(data) {
                                if (data.success == true) {
                                    $(".detalle-producto").load('detalle.php');
                                } else {
                                    alertify.error(data.msj);
                                }
                            },
                            error: function(jqXHR, textStatus, error) {
                                alertify.error(error);
                            }
                        })
                    });
                </script>

                <!--modal-->


                <div class="modal fade quick-modal in" id="quick-modal1281" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">X</span>
                                </button>
                                <div class="col-md-5">



                                    <div id="carousel1281" class="carousel slide" data-ride="carousel">

                                        <ol class="carousel-indicators">
                                            <li data-target="#carousel1281" class="slide0" data-slide-to="0"></li>
                                            <li data-target="#carousel1281" class="slide1 active" data-slide-to="1"></li>
                                        </ol>

                                        <div class="carousel-inner" role="listbox">
                                            <div class="item active left" data-thumb="0">
                                                <img src="sistema/img/productos/1586792533_F1-350600008.jpg" alt="" style="width: 380px; height: 380px; cursor:pointer" data-toggle="modal" data-target="#myModal_img1281" data-myvalue="sistema/img/productos/1586792533_F1-350600008.jpg" class="open-Dialog">
                                            </div>
                                            <div class="item next left" data-thumb="1"> <img src="sistema/img/productos/1589912355_F2-350600008.jpg" alt="" style="width: 380px; height: 380px; cursor:pointer" data-toggle="modal" data-target="#myModal_img1281" data-myvalue2="sistema/img/productos/1589912355_F2-350600008.jpg" class="open-Dialog3"> </div>
                                        </div>
                                    </div>

                                    <a class="left carousel-control" href="#carousel1281" role="button" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#carousel1281" role="button" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>

                                <div class="col-md-7 detail-right">
                                    <div class="detail-top">
                                        <h1>CERR. JP C/S MODELO 1 C/P MODELO 1 C/P</h1>
                                        <div class="rating">
                                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="rate">

                                            <h2>Precio: S/. 79.9 </h2>

                                            <label class="offer-label">-0 %</label>

                                            <span><i class="fa fa-check-circle"></i> En stock</span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <div class="sub-menu">
                                            <a href="">Descripción</a>
                                            <p>Cerradura de Sobreponer de engrape blindada. Ideal para puertas corredizas o batientes</p>
                                        </div>
                                    </div>
                                    <div class="detail feature">
                                        <div class="sub-menu">
                                            <div class="detail-btm">

                                                <form action="">
                                                    <div class="detail-row quantity-box">
                                                        <p class="text-uppercase">Cantidad</p>
                                                        <div class="clearfix"></div>
                                                        <div id="field1" class="input--filled">
                                                            <input type="number" name="cantidad" id="cant1281" min="1" max="1000" step="1" value="1" class="field" onchange="validastock2(1281)">
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <input type="hidden" id="producto1281" value="CERR. JP C/S MODELO 1 C/P MODELO 1 C/P">

                                                        <input type="hidden" id="precio1281" value="79.9">
                                                        <input type="hidden" id="stk1281" value="0">
                                                        <input type="hidden" id="id1281" value="1281">
                                                        <button type="button" id="add21281" style="background-color: #1F487E; color: white; width: 120px; height: 50px; border-radius: 16px;" data-dismiss="modal">
                                                            AGREGAR
                                                        </button>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </form>

                                                <div class="detail-row">
                                                    <p><span>Codigo:</span> 9350600008</p>
                                                    <p><span>- Codigo Proveedor:</span> 12640004</p>
                                                </div>

                                                <div class="detail-row">
                                                    <p><span>CategorÍ&shy;a:</span> CERRADURAS DE SOBREPONER</p>
                                                </div>

                                                <div class="detail-row">
                                                    <p><span>Marca:</span> CISA</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <script type="text/javascript">
                    $('#add21281').click(function() {
                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": false,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "800",
                            "timeOut": "800",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        toastr["success"]("Articulo Agregado.", "Refermat");
                        var producto2 = document.getElementById('producto1281').value;
                        var precio2 = document.getElementById('precio1281').value;
                        var cantidad2 = document.getElementById('cant1281').value;
                        var id2 = document.getElementById('id1281').value;
                        var stock2 = document.getElementById('stock1281').value;

                        var ruta = "prod=" + producto2 + "&pre=" + precio2 + "&cant=" + cantidad2 + "&cod=" + id2 + "&stk=" + stock2;

                        $.ajax({
                            url: 'header.php',
                            type: 'POST',
                            data: ruta,
                            dataType: 'json',
                            success: function(data) {
                                if (data.success == true) {
                                    $(".detalle-producto").load('detalle.php');
                                } else {
                                    alertify.error(data.msj);
                                }
                            },
                            error: function(jqXHR, textStatus, error) {
                                alertify.error(error);
                            }
                        })
                        this.close();
                    });
                </script>

                <!--modal_img-->

                <div id="myModal_img1281" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <h4 class="modal-title">&nbsp;</h4>
                            </div>
                            <div class="modal-body">
                                <img src="sistema/img/productos/1589912355_F2-350600008.jpg" class="img-responsive" name="imgID" id="imgID" style="width: 100%">
                            </div>
                        </div>
                    </div>
                </div>

                <div id="myModal_vid1281" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <h4 class="modal-title">&nbsp;</h4>
                            </div>
                            <div class="modal-body">
                                <iframe width="100%" height="380" name="vidID" id="vidID" allowfullscreen="">
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 text-left">

                    <div class="product">
                        <div class="product-img">
                            <a href="" data-toggle="modal" data-target="#quick-modal422">
                                <img src="sistema/img/productos/1586792533_F1-350600008.jpg" style="width: 220px; height: 220px" alt="" class="img-home">
                            </a>
                         
                        </div>
                        <div class="product-body">
                            <div style="height: 40px;">
                                <p><a href="#">CERR. JP C/S MODELO 1 C/P MODELO 1 C/P</a></p>
                            </div>

                            <h4 style="font-size: 16px;">Precio: S/. 79.9</h4>

                            <div class="product-body">
                                <form action="">
                                    <div class="detail-row quantity-box">
                                        <div id="field1" class="input--filled" style="padding-left: 20px;">
                                            <input type="number" name="cantidad" id="cantidad422" min="1" max="1000" step="1" value="1" onchange="validastock(422)">
                                            <div class="clearfix"></div>
                                        </div>
                                        <input type="hidden" id="producto422" value="CERR. JP C/S MODELO 1 C/P MODELO 1 C/P">
                                        <input type="hidden" id="precio422" value="79.9">
                                        <input type="hidden" id="id422" value="422">
                                        <input type="hidden" id="stock422" value="3">
                                        <button type="button" id="agregar422" style="background-color: #1F487E; color: white; width: 120px; height: 50px; border-radius: 16px;">AGREGAR.</button>
                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    $('#agregar422').click(function() {
                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": false,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "800",
                            "timeOut": "800",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        toastr["success"]("Articulo Agregado.", "Refermat");
                        var producto = document.getElementById('producto422').value;
                        var precio = document.getElementById('precio422').value;
                        var cantidad = document.getElementById('cantidad422').value;
                        var id = document.getElementById('id422').value;
                        var stock = document.getElementById('stock422').value;

                        var ruta = "prod=" + producto + "&pre=" + precio + "&cant=" + cantidad + "&cod=" + id + "&stk=" + stock;

                        $.ajax({
                            url: 'header.php',
                            type: 'POST',
                            data: ruta,
                            dataType: 'json',
                            success: function(data) {
                                if (data.success == true) {
                                    $(".detalle-producto").load('detalle.php');
                                } else {
                                    alertify.error(data.msj);
                                }
                            },
                            error: function(jqXHR, textStatus, error) {
                                alertify.error(error);
                            }
                        })
                    });
                </script>

                <!--modal-->


                <div class="modal fade quick-modal in" id="quick-modal422" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">X</span>
                                </button>
                                <div class="col-md-5">



                                    <div id="carousel422" class="carousel slide" data-ride="carousel">

                                        <ol class="carousel-indicators">
                                            <li data-target="#carousel422" class="slide0" data-slide-to="0"></li>
                                            <li data-target="#carousel422" class="slide1 active" data-slide-to="1"></li>
                                        </ol>

                                        <div class="carousel-inner" role="listbox">
                                            <div class="item active left" data-thumb="0">
                                                <img src="sistema/img/productos/1586792533_F1-350600008.jpg" alt="" style="width: 380px; height: 380px; cursor:pointer" data-toggle="modal" data-target="#myModal_img422" data-myvalue="sistema/img/productos/1586792533_F1-350600008.jpg" class="open-Dialog">
                                            </div>
                                            <div class="item next left" data-thumb="1"> <img src="sistema/img/productos/1589912355_F2-350600008.jpg" alt="" style="width: 380px; height: 380px; cursor:pointer" data-toggle="modal" data-target="#myModal_img422" data-myvalue2="sistema/img/productos/1589912355_F2-350600008.jpg" class="open-Dialog3"> </div>
                                        </div>
                                    </div>

                                    <a class="left carousel-control" href="#carousel422" role="button" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#carousel422" role="button" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>

                                <div class="col-md-7 detail-right">
                                    <div class="detail-top">
                                        <h1>CERR. JP C/S MODELO 1 C/P MODELO 1 C/P</h1>
                                        <div class="rating">
                                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="rate">

                                            <h2>Precio: S/. 79.9 </h2>

                                            <label class="offer-label">-0 %</label>

                                            <span><i class="fa fa-check-circle"></i> En stock</span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <div class="sub-menu">
                                            <a href="">Descripción</a>
                                            <p>Cerradura de Sobreponer de engrape blindada. Ideal para puertas corredizas o batientes</p>
                                        </div>
                                    </div>
                                    <div class="detail feature">
                                        <div class="sub-menu">
                                            <div class="detail-btm">

                                                <form action="">
                                                    <div class="detail-row quantity-box">
                                                        <p class="text-uppercase">Cantidad</p>
                                                        <div class="clearfix"></div>
                                                        <div id="field1" class="input--filled">
                                                            <input type="number" name="cantidad" id="cant422" min="1" max="1000" step="1" value="1" class="field" onchange="validastock2(422)">
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <input type="hidden" id="producto422" value="CERR. JP C/S MODELO 1 C/P MODELO 1 C/P">

                                                        <input type="hidden" id="precio422" value="79.9">
                                                        <input type="hidden" id="stk422" value="3">
                                                        <input type="hidden" id="id422" value="422">
                                                        <button type="button" id="add2422" style="background-color: #1F487E; color: white; width: 120px; height: 50px; border-radius: 16px;" data-dismiss="modal">
                                                            AGREGAR
                                                        </button>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </form>

                                                <div class="detail-row">
                                                    <p><span>Codigo:</span> 350600008</p>
                                                    <p><span>- Codigo Proveedor:</span> 12640004</p>
                                                </div>

                                                <div class="detail-row">
                                                    <p><span>CategorÍ&shy;a:</span> CERRADURAS DE SOBREPONER</p>
                                                </div>

                                                <div class="detail-row">
                                                    <p><span>Marca:</span> CISA</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <script type="text/javascript">
                    $('#add2422').click(function() {
                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": false,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "800",
                            "timeOut": "800",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        toastr["success"]("Articulo Agregado.", "Refermat");
                        var producto2 = document.getElementById('producto422').value;
                        var precio2 = document.getElementById('precio422').value;
                        var cantidad2 = document.getElementById('cant422').value;
                        var id2 = document.getElementById('id422').value;
                        var stock2 = document.getElementById('stock422').value;

                        var ruta = "prod=" + producto2 + "&pre=" + precio2 + "&cant=" + cantidad2 + "&cod=" + id2 + "&stk=" + stock2;

                        $.ajax({
                            url: 'header.php',
                            type: 'POST',
                            data: ruta,
                            dataType: 'json',
                            success: function(data) {
                                if (data.success == true) {
                                    $(".detalle-producto").load('detalle.php');
                                } else {
                                    alertify.error(data.msj);
                                }
                            },
                            error: function(jqXHR, textStatus, error) {
                                alertify.error(error);
                            }
                        })
                        this.close();
                    });
                </script>

                <!--modal_img-->

                <div id="myModal_img422" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <h4 class="modal-title">&nbsp;</h4>
                            </div>
                            <div class="modal-body">
                                <img src="sistema/img/productos/1589912355_F2-350600008.jpg" class="img-responsive" name="imgID" id="imgID" style="width: 100%">
                            </div>
                        </div>
                    </div>
                </div>

                <div id="myModal_vid422" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <h4 class="modal-title">&nbsp;</h4>
                            </div>
                            <div class="modal-body">
                                <iframe width="100%" height="380" name="vidID" id="vidID" allowfullscreen="">
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 text-left">

                    <div class="product">
                        <div class="product-img">
                            <a href="" data-toggle="modal" data-target="#quick-modal392">
                                <img src="sistema/img/productos/1586824873_340200050.jpg" style="width: 220px; height: 220px" alt="" class="img-home">
                            </a>
                          
                        </div>
                        <div class="product-body">
                            <div style="height: 40px;">
                                <p><a href="#">MAZO DE HULE 16 OZ</a></p>
                            </div>

                            <h4 style="font-size: 16px;">Precio: S/. 9.9</h4>

                            <div class="product-body">
                                <form action="">
                                    <div class="detail-row quantity-box">
                                        <div id="field1" class="input--filled" style="padding-left: 20px;">
                                            <input type="number" name="cantidad" id="cantidad392" min="1" max="1000" step="1" value="1" onchange="validastock(392)">
                                            <div class="clearfix"></div>
                                        </div>
                                        <input type="hidden" id="producto392" value="MAZO DE HULE 16 OZ">
                                        <input type="hidden" id="precio392" value="9.9">
                                        <input type="hidden" id="id392" value="392">
                                        <input type="hidden" id="stock392" value="35">
                                        <button type="button" id="agregar392" style="background-color: #1F487E; color: white; width: 120px; height: 50px; border-radius: 16px;">AGREGAR.</button>
                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    $('#agregar392').click(function() {
                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": false,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "800",
                            "timeOut": "800",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        toastr["success"]("Articulo Agregado.", "Refermat");
                        var producto = document.getElementById('producto392').value;
                        var precio = document.getElementById('precio392').value;
                        var cantidad = document.getElementById('cantidad392').value;
                        var id = document.getElementById('id392').value;
                        var stock = document.getElementById('stock392').value;

                        var ruta = "prod=" + producto + "&pre=" + precio + "&cant=" + cantidad + "&cod=" + id + "&stk=" + stock;

                        $.ajax({
                            url: 'header.php',
                            type: 'POST',
                            data: ruta,
                            dataType: 'json',
                            success: function(data) {
                                if (data.success == true) {
                                    $(".detalle-producto").load('detalle.php');
                                } else {
                                    alertify.error(data.msj);
                                }
                            },
                            error: function(jqXHR, textStatus, error) {
                                alertify.error(error);
                            }
                        })
                    });
                </script>

                <!--modal-->


                <div class="modal fade quick-modal in" id="quick-modal392" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">X</span>
                                </button>
                                <div class="col-md-5">



                                    <div id="carousel392" class="carousel slide" data-ride="carousel">

                                        <ol class="carousel-indicators">
                                            <li data-target="#carousel392" class="slide0" data-slide-to="0"></li>
                                        </ol>

                                        <div class="carousel-inner" role="listbox">
                                            <div class="item active" data-thumb="0">
                                                <img src="sistema/img/productos/1586824873_340200050.jpg" alt="" style="width: 380px; height: 380px; cursor:pointer" data-toggle="modal" data-target="#myModal_img392" data-myvalue="sistema/img/productos/1586824873_340200050.jpg" class="open-Dialog">
                                            </div>
                                        </div>
                                    </div>

                                    <a class="left carousel-control" href="#carousel392" role="button" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#carousel392" role="button" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>

                                <div class="col-md-7 detail-right">
                                    <div class="detail-top">
                                        <h1>MAZO DE HULE 16 OZ</h1>
                                        <div class="rating">
                                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="rate">

                                            <h2>Precio: S/. 9.9 </h2>

                                            <label class="offer-label">-0 %</label>

                                            <span><i class="fa fa-check-circle"></i> En stock</span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <div class="sub-menu">
                                            <a href="">Descripción</a>
                                            <p>Cabeza de neopreno, Proporciona fuertes impactos sin da?ar las superficies</p>
                                        </div>
                                    </div>
                                    <div class="detail feature">
                                        <div class="sub-menu">
                                            <div class="detail-btm">

                                                <form action="">
                                                    <div class="detail-row quantity-box">
                                                        <p class="text-uppercase">Cantidad</p>
                                                        <div class="clearfix"></div>
                                                        <div id="field1" class="input--filled">
                                                            <input type="number" name="cantidad" id="cant392" min="1" max="1000" step="1" value="1" class="field" onchange="validastock2(392)">
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <input type="hidden" id="producto392" value="MAZO DE HULE 16 OZ">

                                                        <input type="hidden" id="precio392" value="9.9">
                                                        <input type="hidden" id="stk392" value="35">
                                                        <input type="hidden" id="id392" value="392">
                                                        <button type="button" id="add2392" style="background-color: #1F487E; color: white; width: 120px; height: 50px; border-radius: 16px;" data-dismiss="modal">
                                                            AGREGAR
                                                        </button>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </form>

                                                <div class="detail-row">
                                                    <p><span>Codigo:</span> 340200050</p>
                                                    <p><span>- Codigo Proveedor:</span> 101012</p>
                                                </div>

                                                <div class="detail-row">
                                                    <p><span>CategorÍ&shy;a:</span> HERRAMIENTAS MANUALES</p>
                                                </div>

                                                <div class="detail-row">
                                                    <p><span>Marca:</span> AKSI</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <script type="text/javascript">
                    $('#add2392').click(function() {
                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": false,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "800",
                            "timeOut": "800",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        toastr["success"]("Articulo Agregado.", "Refermat");
                        var producto2 = document.getElementById('producto392').value;
                        var precio2 = document.getElementById('precio392').value;
                        var cantidad2 = document.getElementById('cant392').value;
                        var id2 = document.getElementById('id392').value;
                        var stock2 = document.getElementById('stock392').value;

                        var ruta = "prod=" + producto2 + "&pre=" + precio2 + "&cant=" + cantidad2 + "&cod=" + id2 + "&stk=" + stock2;

                        $.ajax({
                            url: 'header.php',
                            type: 'POST',
                            data: ruta,
                            dataType: 'json',
                            success: function(data) {
                                if (data.success == true) {
                                    $(".detalle-producto").load('detalle.php');
                                } else {
                                    alertify.error(data.msj);
                                }
                            },
                            error: function(jqXHR, textStatus, error) {
                                alertify.error(error);
                            }
                        })
                        this.close();
                    });
                </script>

                <!--modal_img-->

                <div id="myModal_img392" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <h4 class="modal-title">&nbsp;</h4>
                            </div>
                            <div class="modal-body">
                                <img src="sistema/NULL" class="img-responsive" name="imgID" id="imgID" style="width: 100%">
                            </div>
                        </div>
                    </div>
                </div>

                <div id="myModal_vid392" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <h4 class="modal-title">&nbsp;</h4>
                            </div>
                            <div class="modal-body">
                                <iframe width="100%" height="380" name="vidID" id="vidID" allowfullscreen="">
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 text-left">

                    <div class="product">
                        <div class="product-img">
                            <a href="" data-toggle="modal" data-target="#quick-modal322">
                                <img src="sistema/img/productos/1586786483_F2-220400022.jpg" style="width: 220px; height: 220px" alt="" class="img-home">
                            </a>
                           
                        </div>
                        <div class="product-body">
                            <div style="height: 40px;">
                                <p><a href="#">LAVAMANOS LUNA 8</a></p>
                            </div>

                            <h4 style="font-size: 16px;">Precio: S/. 386.9</h4>

                            <div class="product-body">
                                <form action="">
                                    <div class="detail-row quantity-box">
                                        <div id="field1" class="input--filled" style="padding-left: 20px;">
                                            <input type="number" name="cantidad" id="cantidad322" min="1" max="1000" step="1" value="1" onchange="validastock(322)">
                                            <div class="clearfix"></div>
                                        </div>
                                        <input type="hidden" id="producto322" value="LAVAMANOS LUNA 8">
                                        <input type="hidden" id="precio322" value="386.9">
                                        <input type="hidden" id="id322" value="322">
                                        <input type="hidden" id="stock322" value="5">
                                        <button type="button" id="agregar322" style="background-color: #1F487E; color: white; width: 120px; height: 50px; border-radius: 16px;">AGREGAR.</button>
                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    $('#agregar322').click(function() {
                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": false,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "800",
                            "timeOut": "800",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        toastr["success"]("Articulo Agregado.", "Refermat");
                        var producto = document.getElementById('producto322').value;
                        var precio = document.getElementById('precio322').value;
                        var cantidad = document.getElementById('cantidad322').value;
                        var id = document.getElementById('id322').value;
                        var stock = document.getElementById('stock322').value;

                        var ruta = "prod=" + producto + "&pre=" + precio + "&cant=" + cantidad + "&cod=" + id + "&stk=" + stock;

                        $.ajax({
                            url: 'header.php',
                            type: 'POST',
                            data: ruta,
                            dataType: 'json',
                            success: function(data) {
                                if (data.success == true) {
                                    $(".detalle-producto").load('detalle.php');
                                } else {
                                    alertify.error(data.msj);
                                }
                            },
                            error: function(jqXHR, textStatus, error) {
                                alertify.error(error);
                            }
                        })
                    });
                </script>

                <!--modal-->


                <div class="modal fade quick-modal in" id="quick-modal322" tabindex="-1" role="dialog">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-body">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">X</span>
                                </button>
                                <div class="col-md-5">



                                    <div id="carousel322" class="carousel slide" data-ride="carousel">

                                        <ol class="carousel-indicators">
                                            <li data-target="#carousel322" class="slide0" data-slide-to="0"></li>
                                            <li data-target="#carousel322" class="slide1 active" data-slide-to="1"></li>
                                        </ol>

                                        <div class="carousel-inner" role="listbox">
                                            <div class="item active left" data-thumb="0">
                                                <img src="sistema/img/productos/1586786483_F2-220400022.jpg" alt="" style="width: 380px; height: 380px; cursor:pointer" data-toggle="modal" data-target="#myModal_img322" data-myvalue="sistema/img/productos/1586786483_F2-220400022.jpg" class="open-Dialog">
                                            </div>
                                            <div class="item next left" data-thumb="1"> <img src="sistema/img/productos/1589918882_Lavamanos Luna 8 pulgadas.jpg" alt="" style="width: 380px; height: 380px; cursor:pointer" data-toggle="modal" data-target="#myModal_img322" data-myvalue2="sistema/img/productos/1589918882_Lavamanos Luna 8 pulgadas.jpg" class="open-Dialog3"> </div>
                                        </div>
                                    </div>

                                    <a class="left carousel-control" href="#carousel322" role="button" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                                        <span class="sr-only">Previous</span>
                                    </a>
                                    <a class="right carousel-control" href="#carousel322" role="button" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                                        <span class="sr-only">Next</span>
                                    </a>
                                </div>

                                <div class="col-md-7 detail-right">
                                    <div class="detail-top">
                                        <h1>LAVAMANOS LUNA 8</h1>
                                        <div class="rating">
                                            <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="rate">

                                            <h2>Precio: S/. 386.9 </h2>

                                            <label class="offer-label">-0 %</label>

                                            <span><i class="fa fa-check-circle"></i> En stock</span>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="detail">
                                        <div class="sub-menu">
                                            <a href="">Descripción</a>
                                            <p>Adaptable a instalaciones domésticas y comerciales en lugares donde el agua es considerada potable. Acabado: Cromo, Material: Aleación de Cobre, Cartucho: 1/4 vuelta, Mandos: Manillas 8". CARTUCHO (CER.DER.GPOS) BOL.</p>
                                        </div>
                                    </div>
                                    <div class="detail feature">
                                        <div class="sub-menu">
                                            <div class="detail-btm">

                                                <form action="">
                                                    <div class="detail-row quantity-box">
                                                        <p class="text-uppercase">Cantidad</p>
                                                        <div class="clearfix"></div>
                                                        <div id="field1" class="input--filled">
                                                            <input type="number" name="cantidad" id="cant322" min="1" max="1000" step="1" value="1" class="field" onchange="validastock2(322)">
                                                            <div class="clearfix"></div>
                                                        </div>
                                                        <input type="hidden" id="producto322" value="LAVAMANOS LUNA 8">

                                                        <input type="hidden" id="precio322" value="386.9">
                                                        <input type="hidden" id="stk322" value="5">
                                                        <input type="hidden" id="id322" value="322">
                                                        <button type="button" id="add2322" style="background-color: #1F487E; color: white; width: 120px; height: 50px; border-radius: 16px;" data-dismiss="modal">
                                                            AGREGAR
                                                        </button>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </form>

                                                <div class="detail-row">
                                                    <p><span>Codigo:</span> 220400022</p>
                                                    <p><span>- Codigo Proveedor:</span> 30GLV007</p>
                                                </div>

                                                <div class="detail-row">
                                                    <p><span>CategorÍ&shy;a:</span> GRIFERIA LAVAMANOS</p>
                                                </div>

                                                <div class="detail-row">
                                                    <p><span>Marca:</span> FUNDICION PACIFICO</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <script type="text/javascript">
                    $('#add2322').click(function() {
                        toastr.options = {
                            "closeButton": false,
                            "debug": false,
                            "newestOnTop": false,
                            "progressBar": false,
                            "positionClass": "toast-top-right",
                            "preventDuplicates": false,
                            "onclick": null,
                            "showDuration": "300",
                            "hideDuration": "800",
                            "timeOut": "800",
                            "extendedTimeOut": "1000",
                            "showEasing": "swing",
                            "hideEasing": "linear",
                            "showMethod": "fadeIn",
                            "hideMethod": "fadeOut"
                        }
                        toastr["success"]("Articulo Agregado.", "Refermat");
                        var producto2 = document.getElementById('producto322').value;
                        var precio2 = document.getElementById('precio322').value;
                        var cantidad2 = document.getElementById('cant322').value;
                        var id2 = document.getElementById('id322').value;
                        var stock2 = document.getElementById('stock322').value;

                        var ruta = "prod=" + producto2 + "&pre=" + precio2 + "&cant=" + cantidad2 + "&cod=" + id2 + "&stk=" + stock2;

                        $.ajax({
                            url: 'header.php',
                            type: 'POST',
                            data: ruta,
                            dataType: 'json',
                            success: function(data) {
                                if (data.success == true) {
                                    $(".detalle-producto").load('detalle.php');
                                } else {
                                    alertify.error(data.msj);
                                }
                            },
                            error: function(jqXHR, textStatus, error) {
                                alertify.error(error);
                            }
                        })
                        this.close();
                    });
                </script>

                <!--modal_img-->

                <div id="myModal_img322" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <h4 class="modal-title">&nbsp;</h4>
                            </div>
                            <div class="modal-body">
                                <img src="sistema/img/productos/1589918882_Lavamanos Luna 8 pulgadas.jpg" class="img-responsive" name="imgID" id="imgID" style="width: 100%">
                            </div>
                        </div>
                    </div>
                </div>

                <div id="myModal_vid322" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <h4 class="modal-title">&nbsp;</h4>
                            </div>
                            <div class="modal-body">
                                <iframe width="100%" height="380" name="vidID" id="vidID" allowfullscreen="">
                                </iframe>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>
        <!--fin de productos-->


        <div class="clearfix"></div>

    </div>


    <!--footer-->
    <div class="container-fluid footer-sec" id="contacto">

        <div class="container">
            <div class="col-sm-6 col-md-3 footer-about">
                <a href="#"><img src="img/index/refermat_2.png" alt=""></a>
                <p>Obtenga los mejores precios visitandonos en nuestra web</p>
            </div>

            <div class="col-md-3 col-sm-6 contact-info use foot-a"></div>

            <div class="col-md-3 col-sm-6 contact-info use foot-a"></div>

            <div class="col-md-3 col-sm-6 contact-info contact-span">
                <h3>Información de contacto</h3>
                <div class="contact">
                    <i class="flaticon-placeholder-1"></i>
                    <p>Av. Maquinarias 1891, Cercado de Lima.</p>
                </div>

                <div class="clearfix"></div>

                <div class="contact">
                    <i class="flaticon-headphones"></i>
                    <h2 class="phone-no"><b>981 278 969</b></h2>
                    <i class="flaticon-headphones"></i>
                    <p class="phone-no">01 541 8979</p>
                </div>

                <div class="clearfix"></div>

                <div class="contact">
                    <i class="flaticon-message"></i>
                    <p>infoperu@refermat.com</p>
                </div>

                <div class="clearfix"></div>

                <div class="follow-us">
                    <h2>Redes Sociales</h2>
                    <div class="follow">
                        <a href="https://www.facebook.com/RefermatPeru/" target="_blank"><i class="fa fa-facebook-f" aria-hidden="true"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="https://www.instagram.com/refermat.peru/" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                        <a href="https://www.youtube.com/channel/UCL1ELDEmobsXqojPNEvG97A" target="_blank"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <!--newsletter-->
        <div class="container news-letter">
            <div class="letter-news">
                <div class="col-md-4 col-sm-6 letter">
                    <i class="flaticon-newsletter"></i>
                    <p>Suscri­bete a nuestros</p>
                    <h2>boletines</h2>
                </div>
            </div>
        </div>

        <!--Copyright-->
        <div class="container copy-right">
            <div class="right-copy">
                <a href="#top" id="toper"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
                <div class="col-md-12 col-sm-12 copy-text">
                    <p>© 2019 <a href="#">Refermat</a>. Todos los derechos reservados.</p>
                </div>
            </div>
        </div>
    </div>

    <!--js-->

    <!--custom-->
    <script src="js/custom.js"></script>
    <!--count-down-->
    <script src="js/countdown.js"></script>
    <!-- JS Global-slider -->
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/theme.js"></script>
    <!--TESTIMONIAL-->
    <script>
        setTimeout(function() {
            $("#testimonial-slider").owlCarousel({
                items: 1,
                itemsDesktop: [1000, 1],
                itemsDesktopSmall: [979, 1],
                itemsTablet: [768, 1],
                pagination: true,
                navigation: false,
                navigationText: ["", ""],
                slideSpeed: 1000,
                singleItem: true,
                autoPlay: true
            });
        }, 300);
    </script>
    <!--client-slider-->
    <script src="js/jquery.flexisel.js"></script>
    <!--Revolution-->
    <script language=JavaScript>
        $(document).on("click", ".open-Dialog", function() {
            var myValue = $(this).data('myvalue');
            $(".modal-body #imgID").val(myValue);
            $(".modal-body #imgID").attr('src', myValue);

        });
        $(document).on("click", ".open-Dialog2", function() {
            var myValue = $(this).data('myvalue2');
            $(".modal-body #imgID").val(myValue);
            $(".modal-body #imgID").attr('src', myValue);

        });
        $(document).on("click", ".open-Dialog3", function() {
            var myValue = $(this).data('myvalue3');
            $(".modal-body #imgID").val(myValue);
            $(".modal-body #imgID").attr('src', myValue);

        });

        $(document).on("click", ".img-home", function() {
            var myValue1 = $('.open-Dialog').data('myvalue');
            var myValue2 = $('.open-Dialog2').data('myvalue2');
            var myValue3 = $('.open-Dialog3').data('myvalue3');
            var myValue4 = $('.open-Vid').data('myvalue4');



        });
        $(document).on("click", ".open-Vid", function() {
            var myValue = $(this).data('myvalue4');
            $(".modal-body #vidID").val(myValue);
            $(".modal-body #vidID").attr('src', myValue);

        });
        $('.close').on('click', function() {

            var video = $(".modal-body #vidID").attr("src");
            $(".modal-body #vidID").attr("src", "");
            $(".modal-body #vidID").attr("src", video);

        });
        window.onclick = function(event) {
            var target = event.target;
            if (target.classList.contains('modal')) {
                target.style.display = "none";
                stopVideo(target);

            }
        }

        function stopVideo(modal) {
            var currentIframe = modal.querySelector('.modal-body > iframe');
            currentIframe.src = currentIframe.src;
        }
    </script>

    <script type="text/javascript" src="js/ajax.js"></script>

    <script>
        $(document).ready(function($) {
            var Body = $('body');
            Body.addClass('preloader-site');
        });
        $(window).load(function() {
            $('.preloader-wrapper').fadeOut();
            $('body').removeClass('preloader-site');
        });
    </script>

</body>

</html>