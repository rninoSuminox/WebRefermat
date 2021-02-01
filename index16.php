<?php
session_start();
require_once("sistema/config_pw/db.php");
require_once("sistema/config_pw/conexion.php");
if (!$_GET) {
    header("Location: index.php?pagina=1");
}
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

    <div class="preloader-wrapper">
        <div class="preloader">
            <img src="img/index/preloader.gif" alt="">
        </div>
    </div>


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
                            <?php
                            $sql_familia = mysqli_query($con, "SELECT f.cod_familia, f.name FROM familia f INNER JOIN familia_sub fs ON (f.cod_familia=fs.cod_familia) INNER JOIN categories c ON (fs.cod_sub_familia=c.cod_sub_familia) WHERE f.status='1' GROUP BY f.cod_familia, f.name");
                            while ($row_fam = mysqli_fetch_array($sql_familia)) {
                                $cod_familia = $row_fam["cod_familia"];
                                // $sql_sub_familia = mysqli_query($con, "SELECT fs.cod_sub_familia, fs.name FROM familia f INNER JOIN familia_sub fs ON (f.cod_familia=fs.cod_familia) INNER JOIN categories c ON (fs.cod_sub_familia=c.cod_sub_familia) WHERE fs.status='1'  AND fs.cod_familia=$cod_familia GROUP BY fs.cod_sub_familia, fs.name");                                
                                $sql_sub_familia = mysqli_query($con, "SELECT distinct fs.cod_sub_familia, fs.name FROM familia_sub fs INNER JOIN categories c ON (fs.cod_sub_familia=c.cod_sub_familia) WHERE fs.status='1'  AND fs.cod_familia=$cod_familia ");
                            ?>
                            
                                <li>
                                    <a href="index.php?pagina=1&fam=<?php echo $row_fam["name"]; ?>">
                                        </i><?php echo $row_fam["name"]; ?>
                                    </a>
                                    <div class="categories-mega-menu">
                                        <div class="categories-main-menu">
                                            <?php
                                            while ($row_sub_fam = mysqli_fetch_array($sql_sub_familia)) {
                                                $cod_sub_familia = $row_sub_fam["cod_sub_familia"];
                                                echo '<script> console.log(' . $cod_sub_familia . ')</script>';
                                                //$sql_categ = mysqli_query($con, "SELECT c.id, c.name FROM familia f INNER JOIN familia_sub fs ON (f.cod_familia=fs.cod_familia) INNER JOIN categories c ON (fs.cod_sub_familia=c.cod_sub_familia) WHERE c.status='1'  AND c.cod_sub_familia=$cod_sub_familia GROUP BY c.id, c.name");
                                                $sql_categ = mysqli_query($con, "SELECT c.id, c.name FROM categories c WHERE c.status='1'  AND c.cod_sub_familia=$cod_sub_familia ");                                                
                                            ?>
                                                <span>
                                                    <a href="index.php?pagina=1&sub_fam=<?php echo $row_sub_fam["name"]; ?>" class="title"><?php echo $row_sub_fam["name"]; ?></a>
                                                    <?php while ($row_categ = mysqli_fetch_array($sql_categ)) { ?>
                                                        <a href="index.php?pagina=1&categ=<?php echo $row_categ["name"]; ?>"><?php echo $row_categ["name"]; ?></a>
                                                    <?php } ?>
                                                </span>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </li>
                </ul>
            </div>

            <div class="col-md-6 col-xs-6 search">
                <form action="productos.php?pagina=1" method="post">
                    <input type="text" name="search" placeholder="Busqueda" />
                    <div class="round search-round">
                        <button type='submit' class="btn btn-primary" value="Buscar"><span class="fa fa-search" /></button>
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
                <div class="item active">
                    <img class = "full" src="img/index/1.jpg" alt="...">
                </div>
                <div class="item">
                    <img class = "full" src="img/index/2.jpg" alt="...">
                </div>
                <div class="item">
                    <img class = "full" src="img/index/3.jpg" alt="...">
                </div>
                <div class="item">
                    <img class = "full" src="img/index/4.jpg" alt="...">
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

    <div style="margin-top: 20px"></div>
    <!--Latest-product-->
    <div class="container latest-product padd-80">
        <div id="titulo" class="col-md-12 sec-head text-center">
            <h3 style="font-size: 26px">Los mejores productos al mejor precio!</h3>
            <span></span>
        </div>



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
        /*  $(document).keydown(function (event) {
        if (event.keyCode == 123) { // Prevent F12
            return false;
        } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) { // Prevent Ctrl+Shift+I        
            return false;
        }
    });

    $(document).on("contextmenu", function (e) {        
        e.preventDefault();
    });*/
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
            var myValue2=  $('.open-Dialog2').data('myvalue2');
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


        function validastock(id){
            Cantidad=document.getElementById("cantidad"+id).value;
            Stock=document.getElementById("stock"+id).value;
            if (parseInt(Cantidad)>parseInt(Stock)) {                
                document.getElementById("cantidad"+id).value=Stock;
            
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
                                toastr["error"]("Cantidad Supera Stock Permitido.", "Refermat");
            }
        }

        function validastock2(id){
            Cantidad=document.getElementById("cant"+id).value;
            Stock=document.getElementById("stk"+id).value;
            if (parseInt(Cantidad)>parseInt(Stock)) {                
                document.getElementById("cant"+id).value=Stock;
            
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
                                toastr["error"]("Cantidad Supera Stock Permitido.", "Refermat");
            }
        }
    </script>

</body>

</html>
